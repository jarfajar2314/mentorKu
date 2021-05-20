<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PengajarModel;
use App\Models\PelajarModel;
use App\Models\PembelajaranModel;

class StudentController extends BaseController
{
    public function index()
    {
        echo 'Hello World! - Student';
    }

    public function __construct()
    {
        helper('form');
        $this->UserModel = new UserModel();
        $this->PengajarModel = new PengajarModel();
        $this->PelajarModel = new PelajarModel();
        $this->PembelajaranModel = new PembelajaranModel();
    }

    // Guide 101
    /*
    public function nama(){
        Title : Title halaman
        Content : File view nya
        Page : jenis halaman (optional)
        $data = [
            'title' => 'Login Pelajar',
            'content' => 'Student/v-login',
            'page' => 'login',
        ];
        return view('layout/v-wrapper', $data);
    } 
    */

    public function login()
    {
        $session = session();
        $data = [
            'title' => 'Login Pelajar',
            'content' => 'Student/v-login',
            'page' => 'login',
        ];
        return view('layout/v-wrapper', $data);
    }

    public function register()
    {
        $session = session();
        $data = [
            'title' => 'Register Pelajar',
            'content' => 'Student/v-register',
            'page' => 'register',
        ];
        return view('layout/v-wrapper', $data);
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'content' => 'Student/v-dashboard',
            'page' => 'dashboard',
        ];
        return view('layout/v-wrapper', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Ubah Profil Pelajar',
            'content' => 'Student/v-edit',
            'page' => 'edit',
        ];
        return view('layout/v-wrapper', $data);
    }

    public function save()
    {
        $session = session();
        $data = [
            'id' => NULL,
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'status_verifikasi' => 1,
        ];

        // Check for duplicate email
        $duplicateEmail = false;
        $checkEmail = $this->UserModel->getId($data['email']);
        if(count($checkEmail) > 0)
        {
            $checkId = $this->PelajarModel->getPelajar($checkEmail[0]['id']);
            if(count($checkId) > 0)
                $duplicateEmail = true; 
        }

        if($duplicateEmail == false){
            $res = $this->UserModel->insertTo($data);
        }
        // If email already exist, return to register
        else{
            $session->setFlashdata('msg', 'duplicate');
            return redirect()->to(base_url('pelajar/register'));
        }

        if($res){
            $res = $this->UserModel->getId($data['email']);
            $id = $res[0]['id'];
            // var_dump($id);
            $data2 = [
                'id' => $id,
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            ];

            $res2 = $this->PelajarModel->insertTo($data2);
            if($res2){
                $session->setFlashData('msg', 'success');
            }
            else{
                $session->setFlashData('msg', 'fail');
            }
        }
        else{
            $session->setFlashData('msg', 'fail');
        }
        return redirect()->to(base_url('pelajar/register'));
    }
}