<?php

namespace App\Models;

use CodeIgniter\Model;

class PelajarModel extends Model
{
    public function insertTo($data)
    {
        return $this->db->table('tbl_pelajar')->insert($data);
    }

    public function getPelajar($id)
    {
        return $this->db->table('tbl_pelajar')
            ->where('id', $id)
            ->get()
            ->getResultArray();
    }

}