<?php namespace App\Controllers;

use CodeIgniter\controller;
use App\Models\M_profile;

class Login extends BaseController
{
    public function index()
    {
        $tapil = new M_profile();
        $data = [
            'title'     => 'Login',
            'nmaptk'     => $tapil->tampil()
        ];
        return view('login/v_login', $data);
    }
    public function gantiPass()
    {
        $data = [
            'title'     => 'Ganti Password',
            'uri'			=> \Config\Services::request()
        ];
        return view('login/v_ganti_pass', $data);
    }
}