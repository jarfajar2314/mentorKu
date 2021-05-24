<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelajaranModel extends Model
{
    public function insertTo($data)
    {
        return $this->db->table('tbl_pembelajaran')->insert($data);
    }

    public function getPembelajaran($id)
    {
        return $this->db->table('tbl_pembelajaran')
            ->where('id', $id)
            ->get()
            ->getResultArray();
    }

    public function getAllPembelajaran()
    {
        return $this->db->table('tbl_pembelajaran')
            ->get()
            ->getResultArray();
    }

    public function getPembelajaranByPengajar($id)
    {
        return $this->db->table('tbl_pembelajaran')
            ->where('id_pengajar', $id)
            ->orderBy('tanggal DESC, waktu_mulai DESC')
            ->get()
            ->getResultArray();
    }

}