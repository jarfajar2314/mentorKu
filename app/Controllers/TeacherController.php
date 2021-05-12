<?php

namespace App\Controllers;

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

    public function register()
    {
        $data = [
            'title' => 'Register Pengajar',
            'content' => 'Teacher/v-register',
            'page' => 'register',
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
}