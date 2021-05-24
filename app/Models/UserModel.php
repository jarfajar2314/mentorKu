<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    
    public function insertTo($data)
    {
        return $this->db->table('tbl_user')->insert($data);
    }

    public function getId($email){
        return $this->db->table('tbl_user')
            ->getWhere(['email' => $email])
            ->getResultArray();
    }

    public function authLogin($email, $password)
    {
        return $this->db->table('tbl_user')
            ->where('email', $email)
            ->where('password', $password)
            ->get()
            ->getResultArray();
    }
        
    public function getUserById($id)
    {
        return $this->db->table('tbl_user')
            ->where('id', $id)
            ->get()
            ->getResultArray();
    }

    public function getAllUser()
    {
        return $this->db->table('tbl_user')
            ->get()
            ->getResultArray();
    }

    public function updateData($id, $data)
    {
        return $this->db->table('tbl_user')->where('id', $id)->update($data);
    }

}