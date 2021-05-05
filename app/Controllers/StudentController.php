<?php

namespace App\Controllers;

class StudentController extends BaseController
{
    public function index()
    {
        echo 'Hello World! - Student';
    }

    public function login()
    {
        $data = [
            
        ];
        return view('layout/v-wrapper', $data);
    }
}