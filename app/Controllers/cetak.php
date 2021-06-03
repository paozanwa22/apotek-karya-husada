<?php

namespace App\Controllers;

use CodeIgniter\controller;
use App\Models\M_penjualan;
use App\Models\M_pembelian;

class Cetak extends BaseController
{
    protected $M_penjualan;
    public function __construct()
    {
        $this->M_penjualan = new M_penjualan();
        $this->M_pembelian = new M_pembelian();
    }
    public function struk_penjualan($id)
    {
        $data   = [
            'dcetak'    => $this->M_penjualan->cari($id)->getResult(),
            'dinvoice'  => $this->M_penjualan->ambilInvoice($id)
        ];
        // dd($data);
        return view('/admin/laporan/v_struk_penjualan', $data);
    }
    public function cetak_penjualan($id)
    {
        $data = [
            'title'         => 'Cetak Penjualan Barang',
            'idInvoice'     => $this->M_penjualan->ambilData($id)
        ];
        return View('/admin/laporan/v_cetak_penjualan', $data);
    }
    public function cetak_pembelian($id)
    {
        $data = [
            'title'         => 'Cetak Penjualan Barang',
            'idInvoice'     => $this->M_pembelian->ambilData($id)
        ];
        return View('/admin/laporan/v_cetak_pembelian', $data);
    }
}
