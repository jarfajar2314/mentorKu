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
        // Get email and password
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Authentication
        $res = $this->user->authLogin($email, $password);

        if ($res) {
            // If authenticated
            foreach ($res as $row) {
                $session = \Config\Services::session();
                // Set session id and email
                $session->set('id_user', $row['id']);
                $session->set('email', $row['email']);
                
                // Set session user name
                // Check on pengajar table
                $resNama = $this->pengajar->getNama($row['id']);
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
                    $resNama = $this->pelajar->getNama($row['id']);
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
            if(strpos($_SERVER['HTTP_REFERER'], '?auth=fail')){
                return redirect()->to($_SERVER['HTTP_REFERER']);
            }
            else{
                $url = $_SERVER['HTTP_REFERER'] . "?auth=fail";
                return redirect()->to($url);
            }
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