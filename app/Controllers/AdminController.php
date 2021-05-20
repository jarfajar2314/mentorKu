<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function index()
    {
        echo 'Hello World! - Admin';
    }

    public function login()
    {
        $data = [
            'title' => 'Login Admin',
            'content' => 'Admin/v-login',
            'page' => 'login',
        ];
        return view('layout/v-wrapper', $data);
    }
}

?>