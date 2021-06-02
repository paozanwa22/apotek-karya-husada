<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pembelian extends Model
{
    protected $table = "tb_pembelian";

    public function autonumber()
    {
        $kode = $this->db->table($this->table)
            ->select('right(no_transaksi,4) as no_transaksi', false)
            ->orderBy('no_transaksi', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode['no_transaksi'] == null) {
            $no = 1;
        } else {
            $no = intval($kode['no_transaksi']) + 1;
        }
        $s = date('dmY');
        $batas = str_pad($no, 4, "0", STR_PAD_LEFT);
        $no_transaksi = $s . $batas;

        return $no_transaksi;
    }
    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
