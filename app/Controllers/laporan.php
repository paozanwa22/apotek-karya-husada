<?php

namespace App\Controllers;

use CodeIgniter\controller;
use App\Models\M_obat;
use App\Models\M_penjualan;
use App\Models\M_pembelian;

class Laporan extends BaseController
{
    protected $M_obat;
    protected $M_penjualan;
    protected $M_pembelian;
    public function __construct()
    {
        $this->M_obat = new M_obat();
        $this->M_penjualan = new M_penjualan();
        $this->M_pembelian = new M_pembelian();
    }
    public function laporan()
    {
        $data = [
            'title'     => 'Laporan',
            'uri'       => \Config\Services::request()
        ];
        return view('/admin/laporan/v_dlaporan', $data);
    }
    public function lap_penjualan()
    {
        $data = [
            'title'     => 'Laporan Penjualan',
            'uri'       => \Config\Services::request(),
        ];
        return view('/admin/laporan/v_lap_penjualan', $data);
    }
    public function lap_pembelian()
    {
        $data = [
            'title'     => 'Laporan Pembelian',
            'uri'       => \Config\Services::request()
        ];
        return view('/admin/laporan/v_lap_pembelian', $data);
    }
    public function lap_stok_obat()
    {
        $data = [
            'title'     => 'Laporan Stok Obat',
            'uri'       => \Config\Services::request(),
            'lapObat'   => $this->M_obat->ambilData()
        ];
        return view('/admin/laporan/v_lap_stok_obat', $data);
    }
    public function cetak_obat()
    {
        $data = [
            'title'     => "Cetak data obat",
            'lapObat'   => $this->M_obat->ambilData()
        ];
        return view('/admin/laporan/v_cetak_obat', $data);
    }
    public function caridata()
    {
        $awal = [
            'awal'      => $this->request->getVar('tanggal_mulai'),
            'akhir'     => $this->request->getVar('tanggal_akhir')
        ];


        $data = [
            'title'     => "Laporan Penjualan",
            'lapObat'   => $this->M_obat->ambilData(),
            'caridata'  => $this->M_penjualan->caridatatanggal($awal),
            'uri'       => \Config\Services::request(),
            'tanggal'   => $awal
        ];
        return view('/admin/laporan/v_tampil_lap_penjualan', $data);
    }
    public function caridatapembelian()
    {
        $awal = [
            'awal'      => $this->request->getVar('tanggal_mulai'),
            'akhir'     => $this->request->getVar('tanggal_akhir')
        ];
        $data = [
            'title'     => "Laporan Pembelian",
            'lapObat'   => $this->M_obat->ambilData(),
            'caridata'  => $this->M_pembelian->caridatatanggalpembelian($awal),
            'uri'       => \Config\Services::request(),
            'tanggal'   => $awal
        ];
        return view('/admin/laporan/v_tampil_lap_pembelian', $data);
    }
}
