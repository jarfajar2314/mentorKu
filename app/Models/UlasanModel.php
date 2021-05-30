<?php

namespace App\Models;

use CodeIgniter\Model;

class UlasanModel extends Model
{
    
    public function insertTo($data)
    {
        return $this->db->table('tbl_ulasan')->insert($data);
    }

    public function getUlasanByPengajar($id)
    {
        return $this->db->table('tbl_ulasan')
            ->join('tbl_pelajar', 'tbl_pelajar.id=tbl_ulasan.id_pelajar')
            ->where('id_pengajar', $id)
            ->get()
            ->getResultArray();
    }

    public function getUlasanByPelajar($id)
    {
        return $this->db->table('tbl_ulasan')
            ->where('id_pelajar', $id)
            ->get()
            ->getResultArray();
    }

}