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
            if($_GET['search'] == ''){
                return redirect()->to('/explore');
            }
            else{
                $res = $this->PengajarModel->getPengajarBySubjek($_GET['search']);
            }
        }
        else if(isset($_GET['fkota'])){
            $res = $this->PengajarModel->getPengajarByKota($_GET['fkota']);
        }
        else if(isset($_GET['trendah'])){
            $low = $_GET['trendah'];
            $high = $_GET['ttinggi'];
            if($low == '') $low = null;
            if($high == '') $high = null;
            if($low == null && $high == null) $res = $this->PengajarModel->getAllVerifiedPengajar();
            else $res = $this->PengajarModel->getPengajarByTarif($low, $high);
        }
        else if(isset($_GET['wrendah'])){
            $low = $_GET['wrendah'];
            $high = $_GET['wtinggi'];
            if($low == '') $low = null;
            if($high == '') $high = null;
            if($low == null && $high == null) $res = $this->PengajarModel->getAllVerifiedPengajar();
            else $res = $this->PengajarModel->getPengajarByWaktu($low, $high);
        }
        else if(isset($_GET['ftingkat'])){
            $res = $this->PengajarModel->getPengajarByTingkat($_GET['ftingkat']);
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
