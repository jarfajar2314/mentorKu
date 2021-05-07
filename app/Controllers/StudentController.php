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
        return view('Student/v-wrapper', $data);
    }

    public function register()
    {
        $data = [
            
        ];
        return view('studentreg/v-wrapper', $data);
    }
}