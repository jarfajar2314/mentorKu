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

    public function getAllVerifiedPengajar()
    {
        return $this->db->table('tbl_pengajar')
            ->join('tbl_user', 'tbl_pengajar.id=tbl_user.id')
            ->where('status_verifikasi', '1')
            ->get()
            ->getResultArray();
    }
    
    public function getKotaPengajar()
    {
        return $this->db->table('tbl_pengajar')
            ->selectMin('kota')
            ->groupBy('kota')
            ->get()
            ->getResultArray();
    }

    public function getPengajarByKota($kota)
    {
        return $this->db->table('tbl_pengajar')
            ->join('tbl_user', 'tbl_pengajar.id=tbl_user.id')
            ->where('status_verifikasi', '1')
            ->where('kota', $kota)
            ->get()
            ->getResultArray();
    }

    public function getPengajarByTingkat($tingkat)
    {
        return $this->db->table('tbl_pengajar')
            ->join('tbl_user', 'tbl_pengajar.id=tbl_user.id')
            ->where('status_verifikasi', '1')
            ->where('tingkatan', $tingkat)
            ->get()
            ->getResultArray();
    }

    public function getPengajarBySubjek($subjek)
    {
        return $this->db->table('tbl_pengajar')
            ->join('tbl_user', 'tbl_pengajar.id=tbl_user.id')
            ->where('status_verifikasi', '1')
            ->where('keahlian', $subjek)
            ->get()
            ->getResultArray();
    }

    public function getPengajarByTarif($low, $high)
    {
        if($low == null && $high != null){
            return $this->db->table('tbl_pengajar')
                ->join('tbl_user', 'tbl_pengajar.id=tbl_user.id')
                ->where('status_verifikasi', '1')
                ->where('tarif <=', $high)
                ->orderBy('tarif', 'ASC')
                ->get()
                ->getResultArray();
        }
        else if($low != null && $high == null){
            return $this->db->table('tbl_pengajar')
                ->join('tbl_user', 'tbl_pengajar.id=tbl_user.id')
                ->where('status_verifikasi', '1')
                ->where('tarif >=', $low)
                ->orderBy('tarif', 'ASC')
                ->get()
                ->getResultArray();
            }
        else{
            return $this->db->table('tbl_pengajar')
                ->join('tbl_user', 'tbl_pengajar.id=tbl_user.id')
                ->where('status_verifikasi', '1')
                ->where('tarif >=', $low)
                ->where('tarif <=', $high)
                ->orderBy('tarif', 'ASC')
                ->get()
                ->getResultArray();
        }
    }

    public function getPengajarByWaktu($low, $high)
    {
        if($low == null && $high != null){
            return $this->db->table('tbl_pengajar')
                ->join('tbl_user', 'tbl_pengajar.id=tbl_user.id')
                ->where('status_verifikasi', '1')
                ->where('waktu_respon <=', $high)
                ->orderBy('waktu_respon', 'ASC')
                ->get()
                ->getResultArray();
        }
        else if($low != null && $high == null){
            return $this->db->table('tbl_pengajar')
                ->join('tbl_user', 'tbl_pengajar.id=tbl_user.id')
                ->where('status_verifikasi', '1')
                ->where('waktu_respon >=', $low)
                ->orderBy('waktu_respon', 'ASC')
                ->get()
                ->getResultArray();
            }
        else{
            return $this->db->table('tbl_pengajar')
                ->join('tbl_user', 'tbl_pengajar.id=tbl_user.id')
                ->where('status_verifikasi', '1')
                ->where('waktu_respon >=', $low)
                ->where('waktu_respon <=', $high)
                ->orderBy('waktu_respon', 'ASC')
                ->get()
                ->getResultArray();
        }
    }

    public function updateData($id, $data)
    {
        return $this->db->table('tbl_pengajar')->where('id', $id)->update($data);
    }

}