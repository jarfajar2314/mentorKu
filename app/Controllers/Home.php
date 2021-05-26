<?php namespace App\Controllers;

use App\Models\PengajarModel;

class Home extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->PengajarModel = new PengajarModel();
    }

	public function index()
	{
        $session = \Config\Services::session();
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

    public function explore()
    {
        // Kota
        $resK = $this->PengajarModel->getKotaPengajar();
        for($i = 0; $i < count($resK); $i++){
            $resK[$i] = $resK[$i]['kota'];
        }

        if(isset($_GET['search'])){
            
        }
        else if(isset($_GET['fkota'])){
            $res = $this->PengajarModel->getPengajarByKota($_GET['fkota']);
        }
        else{
            // All data pengajar
            $res = $this->PengajarModel->getAllVerifiedPengajar();
        }
        $data = [
            'title' => 'Explore',
            'content' => 'v-explore',
            'page' => 'Explore',
            'pengajar' => $res,
            'kota' => $resK,
        ];
        return view('layout/v-wrapper', $data);
    }

	//--------------------------------------------------------------------

}
