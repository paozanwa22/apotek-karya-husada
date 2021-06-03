<?php

namespace App\Models;

use CodeIgniter\Model;

class M_penjualan extends Model
{
    protected $table = "tb_penjualan";

    public function ambilData($id)
    {
        return $this->db->table($this->table)
            ->join('tb_obat', 'tb_obat.kd_obat = tb_penjualan.kd_obat')
            ->getWhere(['id_invoice' => $id])->getResultArray();
    }
    public function ambilDataInvoice($aksi)
    {
        return $this->db->table('invoice')
            ->join('tb_pengguna', 'tb_pengguna.id_pengguna = invoice.id_pengguna')
            ->where(['aksi' => $aksi])
            ->get()->getResultArray();
    }
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
    public function cari($id)
    {
        return $this->db->table("tb_penjualan")
            ->join('tb_obat', 'tb_obat.kd_obat = tb_penjualan.kd_obat')
            ->getWhere(['id_invoice' => $id]);
    }
    public function ambilInvoice($id_invoice)
    {
        return $this->db->table("invoice")
            ->join('tb_pengguna', 'tb_pengguna.id_pengguna = invoice.id_pengguna')
            ->getWhere(['id_invoice' => $id_invoice])->getRow();
    }
}
