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
}