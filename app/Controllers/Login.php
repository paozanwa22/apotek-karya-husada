<?php namespace App\Controllers;

use CodeIgniter\controller;
use App\Models\M_profile;
use App\Models\M_login;

class Login extends BaseController
{
    public function index()
    {
        $tapil = new M_profile();
        $data = [
            'title'     => 'Login',
            'nmaptk'     => $tapil->tampil(),
            'validation'    =>\Config\Services::validation()
        ];
        return view('login/v_login', $data);
    }
    public function gantiPass()
    {
        $data = [
            'title'         => 'Ganti Password',
            'uri'			=> \Config\Services::request(),
            'validation'    =>\Config\Services::validation()
        ];
        return view('login/v_ganti_pass', $data);
    }
    public function cekLogin()
    {
        $model = new M_login();

        if(!$this->validate([
            'email' => [
                'rules'     => 'required|valid_email',
                'errors'    => [
                    'required'      => 'Email harus diisi',
                    'valid_email'   => 'Masukkan email dengan benar'
                ]
                ],
                'password'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => 'Password harus diisi'
                    ]
                ]
        ])){
            return redirect()->to('/Login')->withInput();
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $cek = $model->cekData($email);

        // Pengecekan
        if($cek != null){
            return redirect()->to('/admin');
        }else{
            return redirect()->to('/login')->withInput();
        }


    }
}