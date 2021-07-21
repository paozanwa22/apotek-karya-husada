<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pembelian extends Model
{
    protected $table = "tb_pembelian";

    public function ambilData($id)
    {
        return $this->db->table($this->table)
            ->join('tb_supplier', 'tb_supplier.kd_sup = tb_pembelian.kd_sup')
            ->where(['id_invoice' => $id])->get()->getResultArray();
    }
    public function autonumber()
    {
        $kode = $this->db->table($this->table)
            ->select('right(no_transaksi,4) as no_transaksi', false)
            ->orderBy('no_transaksi', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode == null) {
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
    public function ambilDataInvoice($aksi)
    {
        return $this->db->table('invoice')
            ->join('tb_pengguna', 'tb_pengguna.id_pengguna = invoice.id_pengguna')
            ->where(['aksi' => $aksi])
            ->get()->getResultArray();
    }
    public function cariid($id)
    {
        return $this->db->table($this->table)
            ->join('tb_supplier', 'tb_supplier.kd_sup = tb_pembelian.kd_sup')
            ->where(['id_invoice' => $id])->get()->getResultArray();
    }
    public function caridatatanggalpembelian($awal)
    {
        $cari = $this->db->table($this->table)
            ->join('tb_supplier', 'tb_supplier.kd_sup = tb_pembelian.kd_sup')
            // ->join('invoice', 'invoice.id_invoice = tb_penjualan.id_invoice')
            ->where(['tgl_pembelian >=' => $awal['awal']])
            ->where(['tgl_pembelian <=' => $awal['akhir']])
            ->get()->getResultArray();
        // dd($cari);
        return $cari;
    }
    public function hapus($id)
    {
        return $this->db->table($this->table)
            ->delete(['id_invoice' => $id]);
    }
}
