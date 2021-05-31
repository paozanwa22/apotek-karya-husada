<?php

namespace App\Controllers;

use CodeIgniter\controller;
use App\Models\M_penjualan;

class Cetak extends BaseController
{
    protected $M_penjualan;
    public function __construct()
    {
        $this->M_penjualan = new M_penjualan();
    }
    public function cetak_penjualan($id)
    {
        $data   = [
            'dcetak'    => $this->M_penjualan->cari($id)->getResult(),
            'dinvoice'  => $this->M_penjualan->ambilInvoice($id)
        ];
        // dd($data);
        return view('/admin/laporan/v_cetak_penjualan', $data);
    }
}
