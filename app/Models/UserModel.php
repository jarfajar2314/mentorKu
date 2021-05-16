<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password', 'status_verifikasi'];
    
    public function insertTo($data)
    {
        return $this->db->table('tbl_user')->insert($data);
    }

    public function getId($email){
        return $this->db->table('tbl_user')->getWhere(['email' => $email])->getResultArray();
    }

    public function authLogin($email, $password)
    {
        return $this->db->table('tbl_user')
            ->where('email', $email)
            ->where('password', $password)
            ->get()
            ->getResultArray();
    }

    public function getUser()
    {
        return $this->db->table('user')
            ->get()
            ->getResultArray();
    }

    public function login($username, $password)
    {
        return $this->db->table('user')
            ->where('username', $username)
            ->where('password', $password)
            ->get()
            ->getResultArray();
    }

    public function cek_user($id)
    {
        return $this->db->table('user')
            ->join('pasien', 'pasien.id_user=user.id_user')
            ->where('pasien.id_user', $id)
            ->get()
            ->getRow();
    }

    public function user_add2()
    {
        return $this->db->table('user')
            ->orderBy('id_user', 'DESC')
            ->limit(1)
            ->get()
            ->getRow();
    }

    public function getUpdate_User($keyword)
    {
        return $this->where(['id_user' => $keyword])
            ->first();
    }
}