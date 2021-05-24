<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    
    public function insertTo($data)
    {
        return $this->db->table('tbl_admin')->insert($data);
    }

    public function getId($email){
        return $this->db->table('tbl_admin')
            ->getWhere(['email' => $email])
            ->getResultArray();
    }

    public function authLogin($email, $password)
    {
        return $this->db->table('tbl_admin')
            ->where('email', $email)
            ->where('password', $password)
            ->get()
            ->getResultArray();
    }
        
    public function getAdminById($id)
    {
        return $this->db->table('tbl_admin')
            ->where('id', $id)
            ->get()
            ->getResultArray();
    }

}