<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PengajarModel;
use App\Models\PelajarModel;
use App\Models\PembelajaranModel;

class AdminController extends BaseController
{
    public function index()
    {
        echo 'Hello World! - Admin';
    }

    public function __construct()
    {
        helper('form');
        $this->UserModel = new UserModel();
        $this->PengajarModel = new PengajarModel();
        $this->PelajarModel = new PelajarModel();
        $this->PembelajaranModel = new PembelajaranModel();
    }

    public function login()
    {
        $session = session();
        $data = [
            'title' => 'Login Admin',
            'content' => 'Admin/v-login',
            'page' => 'login',
        ];
        return view('layout/v-wrapper', $data);
    }

    public function dashboard()
    {
        $session = session();
        if($session->has('id_admin'))
        {
            $resS = $this->PelajarModel->getAllPelajarData();
            $resT = $this->PengajarModel->getAllPengajarData();
            $resP = $this->PembelajaranModel->getAllPembelajaran();
            // print_r($resS);

            $i = 0;
            foreach ($resP as $row) {
                $id_pelajar = $row['id_pelajar'];
                $resP[$i]['nama_pelajar'] = $this->PelajarModel->getPelajar($id_pelajar)[0]['nama_lengkap'];
                $i++;
            }

            $data = [
                'title' => 'Dashboard Admin',
                'content' => 'Admin/v-dashboard',
                'page' => 'dashboard',
                'session' => $session,
                'DataPelajar' => $resS,
                'DataPengajar' => $resT,
                'DataPembelajaran' => $resP,
            ];
            return view('layout/v-wrapper', $data);
        }
        else{
            return redirect()->to(base_url('admin/login'));
        }
    }

    public function validasiPembayaran()
    {
        $id = $_GET['id'];
        $data = [
            'status' => $_GET['status'],
        ];
        $res = $this->PembelajaranModel->updateData($id, $data);
        if($res){
            return redirect()->to(base_url('admin/dashboard'));
        }
        else{
            return redirect()->to(base_url('admin/dashboard'));
        }
    }

    public function viewFile($type, $filename)
    {
        $url = base_url($type . "/" . $filename);
        $html = '<iframe src="'.$url.'" style="border:none; width: 100%; height: 100%"></iframe>';
        return $html;
    }
}

?>