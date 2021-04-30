<?php namespace App\Controllers;

use CodeIgniter\controller;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title'     => 'Login'
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