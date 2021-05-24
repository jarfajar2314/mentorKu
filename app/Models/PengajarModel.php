<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajarModel extends Model
{
    public function insertTo($data)
    {
        return $this->db->table('tbl_pengajar')->insert($data);
    }

    public function getPengajar($id)
    {
        return $this->db->table('tbl_pengajar')
            ->where('id', $id)
            ->get()
            ->getResultArray();
    }

    public function getAllPengajar()
    {
        return $this->db->table('tbl_pengajar')
            ->get()
            ->getResultArray();
    }

    public function getAllPengajarData()
    {
        return $this->db->table('tbl_pengajar')
            ->join('tbl_user', 'tbl_pengajar.id=tbl_user.id')
            ->get()
            ->getResultArray();
    }

    public function updateData($id, $data)
    {
        return $this->db->table('tbl_pengajar')->where('id', $id)->update($data);
    }

}