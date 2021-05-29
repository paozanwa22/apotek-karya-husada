<?php

namespace App\Models;

use CodeIgniter\Model;

class M_penjualan extends Model
{
    protected $table = "tb_penjualan";

    public function autonumber()
    {
        $kode = $this->db->table($this->table)
            ->select('right(id_pen,4) as id_pen', false)
            ->orderBy('id_pen', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode['id_pen'] == null) {
            $no = 1;
        } else {
            $no = intval($kode['id_pen']) + 1;
        }
        $s = date('dmY');
        $batas = str_pad($no, 4, "0", STR_PAD_LEFT);
        $id_pen = $s . $batas;

        return $id_pen;
    }
}
