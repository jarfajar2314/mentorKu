<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PengajarModel;
use App\Models\PelajarModel;
use App\Models\PembelajaranModel;
use App\Models\UlasanModel;

class TeacherController extends BaseController
{
    public function index()
    {
        echo 'Hello World! - Teacher';
    }

    public function __construct()
    {
        helper('form');
        $this->UserModel = new UserModel();
        $this->PengajarModel = new PengajarModel();
        $this->PelajarModel = new PelajarModel();
        $this->PembelajaranModel = new PembelajaranModel();
        $this->UlasanModel = new UlasanModel();
    }

    public function login()
    {
        $session = session();
        $data = [
            'title' => 'Login Pengajar',
            'content' => 'Teacher/v-login',
            'page' => 'login',
        ];
        return view('layout/v-wrapper', $data);
    }
    
    public function register($msg = "")
    {
        $session = session();
        $data = [
            'title' => 'Register Pengajar',
            'content' => 'Teacher/v-register',
            'page' => 'register',
            'msg' => $msg,
        ];
        return view('layout/v-wrapper', $data);
    }

    public function dashboard()
    {
        // check if session is active
        $session = session();
        if($session->has('id_user')){
            $data = [
                'title' => 'Dashboard',
                'content' => 'Teacher/v-dashboard',
                'page' => 'dashboard',
            ];
            // if active, retrieve data
            $pengajarData = $this->PengajarModel->getPengajar($session->get('id_user'))[0];
            $pembelajaranData = $this->PembelajaranModel->getPembelajaranByPengajar($session->get('id_user'));
            $i = 0; $n = 0;
            for($i = 0; $i < count($pembelajaranData); $i++){
                $pembelajaranData[$i]['nama_pelajar'] = $this->PelajarModel->getPelajar($pembelajaranData[$i]['id_pelajar'])[0]['nama_lengkap'];
                if($pembelajaranData[$i]['status'] != '0'){
                    $n++;
                }
            }
            $data['data'] = $pengajarData;
            $data['riwayat_pembelajaran'] = $pembelajaranData;
            $data['pembelajaran_count'] = $n;
            return view('layout/v-wrapper', $data);
        }
        else{
            // if not, return to home
            return redirect()->to('/pengajar/login');
        }
    }
    
    public function detail()
    {
        if(isset($_GET['id']) && $_GET['id'] != ''){
            $res = $this->PengajarModel->getPengajar($_GET['id'])[0];
            $resU = $this->UlasanModel->getUlasanByPengajar($_GET['id']);
            $data = [
                'title' => 'Detail Pengajar',
                'content' => 'Teacher/v-detail',
                'page' => 'detail',
                'data' => $res,
                'ulasan' => $resU,
            ];
            return view('layout/v-wrapper', $data);
        }
        else{
            // if not, return to home
            return redirect()->to('/explore');
        }
    }

    public function edit()
    {
        // check if session is active
        $session = session();
        if($session->has('id_user')){
            $data = [
                'title' => 'Ubah Profil Pengajar',
                'content' => 'Teacher/v-edit',
                'page' => 'edit',
            ];
            // if active, retrieve data
            $pengajarData = $this->PengajarModel->getPengajar($session->get('id_user'))[0];
            $pengajarData['password'] = $this->UserModel->getUserById($session->get('id_user'))[0]['password'];
            $data['data'] = $pengajarData;
            return view('layout/v-wrapper', $data);
        }
        if($session->has('id_admin')){
            $data = [
                'title' => 'Ubah Profil Pengajar',
                'content' => 'Teacher/v-edit',
                'page' => 'edit',
            ];
            // if active, retrieve data
            $pengajarData = $this->PengajarModel->getPengajar($_GET['id'])[0];
            $pengajarData['password'] = $this->UserModel->getUserById($_GET['id'])[0]['password'];
            $data['data'] = $pengajarData;
            return view('layout/v-wrapper', $data);
        }
        else{
            // if not, return to home
            return redirect()->to('/');
        }
    }

    public function save()
    {
        $session = session();
        $data = [
            'id' => NULL,
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'status_verifikasi' => 0,
        ];

        // Check for duplicate email
        $duplicateEmail = false;
        $checkEmail = $this->UserModel->getId($data['email']);
        if(count($checkEmail) > 0)
        {
            $checkId = $this->PengajarModel->getPengajar($checkEmail[0]['id']);
            if(count($checkId) > 0)
                $duplicateEmail = true; 
        }

        if($duplicateEmail == false){
            $res = $this->UserModel->insertTo($data);
        }
        // If email already exist, return to register
        else{
            $session->setFlashdata('msg', 'duplicate');
            return redirect()->to(base_url('pengajar/register'));
        }

        if($res){
            $res = $this->UserModel->getId($data['email']);
            $id = $res[0]['id'];
            // var_dump($id);
            $data2 = [
                'id' => $id,
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'kota' => $this->request->getPost('kota'),
                'keahlian' => $this->request->getPost('keahlian'),
                'tingkatan' => $this->request->getPost('tingkatan'),
            ];
            // $PengajarModel = new PengajarModel();
            $res2 = $this->PengajarModel->insertTo($data2);
             if($res2){
                $session->setFlashData('msg', 'success');
            }
            else{
                $session->setFlashData('msg', 'fail');
            }
        }
        else{
            $session->setFlashData('msg', 'fail');
        }
        return redirect()->to(base_url('pengajar/register'));
    }

    public function update()
    {
        $dataP = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'kontak' => $this->request->getPost('kontak'),
            'kota' => $this->request->getPost('kota'),
            'tarif' => $this->request->getPost('tarif'),
            // 'jadwal' => implode(" ", $this->request->getPost('pickDay')),
            'keahlian' => $this->request->getPost('keahlian'),
            'tingkatan' => $this->request->getPost('tingkatan'),
            'waktu_respon' => $this->request->getPost('waktu_respon'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_rekening' => $this->request->getPost('jenis_rekening'),
            'no_rekening' => $this->request->getPost('no_rekening'),
            'tentang' => htmlspecialchars($_POST['tentang']),
        ];

        $temp = $this->request->getPost('pickDay');
        if($temp) $dataP['jadwal'] = implode(" ", $this->request->getPost('pickDay'));
        else $dataP['jadwal'] = NULL;

        $dataU = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];

        $session = session();
        $oldName = $this->PengajarModel->getPengajar($session->get('id_user'))[0]['nama_lengkap'];
        $oldEmail = $this->UserModel->getUserById($session->get('id_user'))[0]['email'];
        $resP = $this->PengajarModel->updateData($session->get('id_user'), $dataP);
        $resU = $this->UserModel->updateData($session->get('id_user'), $dataU);

        if($resP && $resU)
        {
            if($oldName !=  $dataP['nama_lengkap']){
                $session->set('nama', explode(' ',trim($dataP['nama_lengkap']))[0]);
            }
            if($oldEmail != $dataU['email']){
                $session->set('email', $row['email']);
            }

            $session->setFlashdata('msg', 'success');
            return redirect()->to(base_url('pengajar/edit'));
        }
        else
        {
            $session->setFlashdata('msg', 'failed');
            return redirect()->to(base_url('pengajar/edit'));
        }
    }

    public function updatePP()
    {
        $session = session();

        $imgFile = $this->request->getFile('profile_pic');
        $ext_img = $imgFile->getClientExtension();
        
        $data['profil_pic'] = $session->get('id_user') . "_" . $session->get('user') . "." . $ext_img;

        
        $res = $this->PengajarModel->updateData($session->get('id_user'), $data);
        
        if($res)
        {
            if(file_exists(ROOTPATH . 'public/ProfileImage/' . $data['profil_pic']))
            {
                unlink(ROOTPATH . 'public/ProfileImage/' . $data['profil_pic']);
            }
            $imgFile->move(ROOTPATH . 'public/ProfileImage', $data['profil_pic']);
            $session->setFlashdata('msg', 'successPP');
            return redirect()->to(base_url('pengajar/edit'));
        }
        else
        {
            $session->setFlashdata('msg', 'failedPP');
            return redirect()->to(base_url('pengajar/edit'));
        }
    }

    public function uploadModul()
    {
        $session = session();

        $mFile = $this->request->getFile('modul');
        $ext_file = $mFile->getClientExtension();
        
        $data['modul'] = $session->get('id_user') . "_" . $session->get('user') . "." . $ext_file;

        
        $res = $this->PengajarModel->updateData($session->get('id_user'), $data);
        
        if($res)
        {
            if(file_exists(ROOTPATH . 'public/ModulPengajar/' . $data['modul']))
            {
                unlink(ROOTPATH . 'public/ModulPengajar/' . $data['modul']);
            }
            $mFile->move(ROOTPATH . 'public/ModulPengajar', $data['modul']);
            $session->setFlashdata('msg', 'successModul');
            return redirect()->to(base_url('pengajar/dashboard'));
        }
        else
        {
            $session->setFlashdata('msg', 'failedModul');
            return redirect()->to(base_url('pengajar/dashboard'));
        }
    }

    public function uploadIjazah()
    {
        $session = session();

        $mFile = $this->request->getFile('ijazah');
        $ext_file = $mFile->getClientExtension();
        
        $data['ijazah'] = $session->get('id_user') . "_" . $session->get('user') . "." . $ext_file;

        
        $res = $this->PengajarModel->updateData($session->get('id_user'), $data);
        
        if($res)
        {
            if(file_exists(ROOTPATH . 'public/IjazahPengajar/' . $data['ijazah']))
            {
                unlink(ROOTPATH . 'public/IjazahPengajar/' . $data['ijazah']);
            }
            $mFile->move(ROOTPATH . 'public/IjazahPengajar', $data['ijazah']);
            $session->setFlashdata('msg', 'successIjazah');
            return redirect()->to(base_url('pengajar/edit'));
        }
        else
        {
            $session->setFlashdata('msg', 'failedIjazah');
            return redirect()->to(base_url('pengajar/edit'));
        }
    }

    public function updatePertemuan()
    {
        $sesi =  $this->request->getPost('sesi');
        $timestamp = strtotime($this->request->getPost('waktu_mulai')) + 60*60*$sesi;
        $waktu_selesai = date('H:i', $timestamp);
        $data = [
            'waktu_mulai' => $this->request->getPost('waktu_mulai'),
            'waktu_selesai' => $waktu_selesai,
            'status' => '3',
        ];
        print_r($data);
        $res = $this->PembelajaranModel->updateData($this->request->getPost('id'), $data);
        if($res){
            return redirect()->to(base_url('pengajar/dashboard'));
        }
    }
    
}