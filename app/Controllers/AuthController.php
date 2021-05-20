<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PengajarModel;
use App\Models\PelajarModel;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->user = new UserModel();
        $this->pengajar = new PengajarModel();
        $this->pelajar = new PelajarModel();
    }

    public function login()
    {
        $session = \Config\Services::session();

        // Get email and password
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $this->request->getVar('user');

        
        // Authentication
        $res = $this->user->authLogin($email, $password);
        
        if($user == 'pengajar') $check = $this->pengajar->getPengajar($res[0]['id']);
        else if($user == 'pelajar')$check = $this->pelajar->getPelajar($res[0]['id']);

        if ($res && $check) {
            // If authenticated
            foreach ($res as $row) {
                // Set session id and email
                $session->set('id_user', $row['id']);
                $session->set('email', $row['email']);
                
                // Set session user name
                // Check on pengajar table
                $resNama = $this->pengajar->getPengajar($row['id']);
                if($resNama){
                    foreach ($resNama as $row2) {
                        echo($row2['nama_lengkap']);
                        $first_name = explode(' ',trim($row2['nama_lengkap']))[0];
                        $session->set('nama', $first_name);
                        $session->set('user', 'pengajar');
                    }
                }
                else{
                    // If not exist on pengajar, then check on pelajar
                    $resNama = $this->pelajar->getPelajar($row['id']);
                    foreach ($resNama as $row2) {
                        echo($row2['nama_lengkap']);
                        $first_name = explode(' ',trim($row2['nama_lengkap']))[0];
                        $session->set('nama', $first_name);
                        $session->set('user', 'pelajar');
                    }
                }
                return redirect()->to(base_url('/'));
            }
        } else {
            // If not, redirect back with auth=fail
            $session->setFlashData('auth', 'fail');
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }

    public function logout()
    {
        //Menghapus semua session (sesi)
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}