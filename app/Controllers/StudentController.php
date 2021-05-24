<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PengajarModel;
use App\Models\PelajarModel;
use App\Models\PembelajaranModel;

class StudentController extends BaseController
{
    public function index()
    {
        echo 'Hello World! - Student';
    }

    public function __construct()
    {
        helper('form');
        $this->UserModel = new UserModel();
        $this->PengajarModel = new PengajarModel();
        $this->PelajarModel = new PelajarModel();
        $this->PembelajaranModel = new PembelajaranModel();
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
        $session = session();
        $data = [
            'title' => 'Login Pelajar',
            'content' => 'Student/v-login',
            'page' => 'login',
        ];
        return view('layout/v-wrapper', $data);
    }

    public function register()
    {
        $session = session();
        $data = [
            'title' => 'Register Pelajar',
            'content' => 'Student/v-register',
            'page' => 'register',
        ];
        return view('layout/v-wrapper', $data);
    }

    public function dashboard()
    {
        $session = session();
        if($session->has('id_user')){
            $data = [
                'title' => 'Dashboard',
                'content' => 'Student/v-dashboard',
                'page' => 'dashboard',
                'session' => $session,
            ];
            // if active, retrieve data
            $pelajarData = $this->PelajarModel->getPelajar($session->get('id_user'))[0];
            $pembelajaranData = $this->PembelajaranModel->getPembelajaranByPelajar($session->get('id_user'));
            $i = 0; $n = 0;
            for($i = 0; $i < count($pembelajaranData); $i++){
                $nama_pengajar = $this->PengajarModel->getPengajar($pembelajaranData[$i]['id_pengajar'])[0]['nama_lengkap'];
                $pembelajaranData[$i]['nama_pengajar'] = $nama_pengajar;
                if($pembelajaranData[$i]['status'] == '2' || $pembelajaranData[$i]['status'] == '4'){
                    $n++;
                }
            }
            $data['data'] = $pelajarData;
            $data['pembelajaran'] = $pembelajaranData;
            $data['riwayat_count'] = $n;
            return view('layout/v-wrapper', $data);
        }
        else{
            return redirect()->to(base_url('pelajar/login'));
        }
    }
    
    public function edit()
    {
        $session = session();
        if($session->has('id_user')){
            $data = [
                'title' => 'Ubah Profil Pelajar',
                'content' => 'Student/v-edit',
                'page' => 'edit',
            ];
            $pelajarData = $this->PelajarModel->getPelajar($session->get('id_user'))[0];
            $pelajarData['password'] = $this->UserModel->getUserById($session->get('id_user'))[0]['password'];
            $data['data'] = $pelajarData;
            return view('layout/v-wrapper', $data);
        }
        else{
            return redirect()->to(base_url('pelajar/login'));
        }
    }

    public function save()
    {
        $session = session();
        $data = [
            'id' => NULL,
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'status_verifikasi' => 1,
        ];

        // Check for duplicate email
        $duplicateEmail = false;
        $checkEmail = $this->UserModel->getId($data['email']);
        if(count($checkEmail) > 0)
        {
            $checkId = $this->PelajarModel->getPelajar($checkEmail[0]['id']);
            if(count($checkId) > 0)
                $duplicateEmail = true; 
        }

        if($duplicateEmail == false){
            $res = $this->UserModel->insertTo($data);
        }
        // If email already exist, return to register
        else{
            $session->setFlashdata('msg', 'duplicate');
            return redirect()->to(base_url('pelajar/register'));
        }

        if($res){
            $res = $this->UserModel->getId($data['email']);
            $id = $res[0]['id'];
            // var_dump($id);
            $data2 = [
                'id' => $id,
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            ];

            $res2 = $this->PelajarModel->insertTo($data2);
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
        return redirect()->to(base_url('pelajar/register'));
    }

    public function update()
    {
        $dataP = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'kota' => $this->request->getPost('kota'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
        ];

        $dataU = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];
        
        $session = session();
        $oldName = $this->PelajarModel->getPelajar($session->get('id_user'))[0]['nama_lengkap'];
        $oldEmail = $this->UserModel->getUserById($session->get('id_user'))[0]['email'];
        $resP = $this->PelajarModel->updateData($session->get('id_user'), $dataP);
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
            return redirect()->to(base_url('pelajar/edit'));
        }
        else
        {
            $session->setFlashdata('msg', 'failed');
            return redirect()->to(base_url('pelajar/edit'));
        }
    }

    public function updatePP()
    {
        $session = session();

        $imgFile = $this->request->getFile('profile_pic');
        $ext_img = $imgFile->getClientExtension();
        
        $data['profil_pic'] = $session->get('id_user') . "_" . $session->get('user') . "." . $ext_img;

        
        $res = $this->PelajarModel->updateData($session->get('id_user'), $data);
        
        if($res)
        {
            if(file_exists(ROOTPATH . 'public/ProfileImage/' . $data['profil_pic']))
            {
                unlink(ROOTPATH . 'public/ProfileImage/' . $data['profil_pic']);
            }
            $imgFile->move(ROOTPATH . 'public/ProfileImage', $data['profil_pic']);
            $session->setFlashdata('msg', 'successPP');
            return redirect()->to(base_url('pelajar/edit'));
        }
        else
        {
            $session->setFlashdata('msg', 'failedPP');
            return redirect()->to(base_url('pelajar/edit'));
        }
    }
}