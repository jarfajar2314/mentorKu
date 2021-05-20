<?php

namespace App\Controllers;

class StudentController extends BaseController
{
    public function index()
    {
        echo 'Hello World! - Student';
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
}