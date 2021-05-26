<?php

namespace App\Models;

use CodeIgniter\Model;

class UlasanModel extends Model
{
    
    public function insertTo($data)
    {
        return $this->db->table('tbl_ulasan')->insert($data);
    }

}