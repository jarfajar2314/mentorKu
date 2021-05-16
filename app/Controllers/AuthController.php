<?php

namespace App\Controllers;

// use App\Models\RtModel_s;
use App\Models\UserModel;
use App\Models\PengajarModel;
// use App\Models\WargaModel_s;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->user = new UserModel();
        $this->pengajar = new PengajarModel();
        // $this->rt = new RtModel_s();
        // $this->warga = new WargaModel_s();
    }

    public function index()
    {
        // return view('guest/login');
    }


    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $res = $this->user->authLogin($email, $password);

        if ($res) {
            foreach ($res as $row) {
                $session = \Config\Services::session();

                $session->set('id_user', $row['id']);
                $session->set('email', $row['email']);
                
                $resNama = $this->pengajar->getNama($row['id']);
                foreach ($resNama as $row2) {
                    echo($row2['nama_lengkap']);
                    $session->set('nama', $row2['nama_lengkap']);
                    // $session->('')
                }

                return redirect()->to(base_url('/'));
            }
        } else {
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