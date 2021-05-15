<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
            'title' => 'Home',
            'content' => 'Home/v-home',
            'page' => 'Home',
        ];
        return view('layout/v-wrapper', $data);
	}

	public function invoice()
	{
		$data = [
            'title' => 'Invoice',
            'content' => 'v-invoice',
            'page' => 'invoice',
        ];
        return view('layout/v-wrapper', $data);
	}

	//--------------------------------------------------------------------

}
