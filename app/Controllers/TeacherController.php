<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PengajarModel;

class TeacherController extends BaseController
{
    public function index()
    {
        echo 'Hello World! - Teacher';
    }

    public function login()
    {
        $data = [
            'title' => 'Login Pengajar',
            'content' => 'Teacher/v-login',
            'page' => 'login',
        ];
        return view('layout/v-wrapper', $data);
    }

    public function register($msg = "")
    {
        $data = [
            'title' => 'Register Pengajar',
            'content' => 'Teacher/v-register',
            'page' => 'register',
            'msg' => $msg,
        ];
        return view('layout/v-wrapper', $data);
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'content' => 'Teacher/v-dashboard',
            'page' => 'dashboard',
        ];
        return view('layout/v-wrapper', $data);
    }
    
    public function detail()
    {
        $data = [
            'title' => 'Detail Pengajar',
            'content' => 'Teacher/v-detail',
            'page' => 'detail',
        ];
        return view('layout/v-wrapper', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Ubah Profil Pengajar',
            'content' => 'Teacher/v-edit',
            'page' => 'edit',
        ];
        return view('layout/v-wrapper', $data);
    }

    public function save()
    {
        $data = [
            'id' => NULL,
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'status_verifikasi' => 0,
        ];
        $UserModel = new UserModel();
        $res = $UserModel->insertTo($data);

        if($res){
            $res = $UserModel->getId($data['email']);
            $id = $res[0]['id'];
            // var_dump($id);
            $data2 = [
                'id' => $id,
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'kota' => $this->request->getPost('kota'),
                'keahlian' => $this->request->getPost('keahlian'),
                'tingkatan' => $this->request->getPost('tingkatan'),
            ];
            $PengajarModel = new PengajarModel();
            $res2 = $PengajarModel->insertTo($data2);
            if($res2){
                echo("Success");
                return redirect()->to(base_url('pengajar/register/success'));
            }
            else{
                echo("Failed");
                return redirect()->to(base_url('pengajar/register/fail'));
            }
        }
        else{
            return redirect()->to(base_url('pengajar/register/fail'));
        }
    }
    
}