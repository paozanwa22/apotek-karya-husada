<?php namespace App\Controllers;

use CodeIgniter\controller;

class Laporan extends BaseController
{
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
            'uri'       => \Config\Services::request()
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
            'uri'       => \Config\Services::request()
        ];
        return view('/admin/laporan/v_lap_stok_obat', $data);
    }
}