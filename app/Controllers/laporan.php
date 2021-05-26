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
}