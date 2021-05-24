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

    public function getAllPelajar()
    {
        return $this->db->table('tbl_pelajar')
            ->get()
            ->getResultArray();
    }

    public function getAllPelajarData()
    {
        return $this->db->table('tbl_pelajar')
            ->join('tbl_user', 'tbl_pelajar.id=tbl_user.id')
            ->get()
            ->getResultArray();
    }


    public function updateData($id, $data)
    {
        return $this->db->table('tbl_pelajar')->where('id', $id)->update($data);
    }

}