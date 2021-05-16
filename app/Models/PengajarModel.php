<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajarModel extends Model
{
    // protected $table = 'tbl_user';
    // protected $primaryKey = 'id';
    // protected $allowedFields = ['email', 'password', 'status_verifikasi'];
    
    public function insertTo($data)
    {
        return $this->db->table('tbl_pengajar')->insert($data);
    }

    public function getNama($id){
        return $this->db->table('tbl_pengajar')->getWhere(['id' => $id])->getResultArray();
    }

}