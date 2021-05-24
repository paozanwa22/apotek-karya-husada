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
            $data_ses = [
                'id_pengguna'   => $cek['id_pengguna'],
                'nama'          => $cek['nama'],
                'level'         => $cek['level'],
                'poto'          => $cek['poto'],
                'log_in'        => TRUE
            ];
            if(password_verify($password, $cek['password'])){
                session()->set($data_ses);
                return redirect()->to('/admin');
            }else{
                session()->setFlashdata('gagal','Password anda tidak valid. Mohon periksa kembali');
                return redirect()->to('/login')->withInput();
            }
        }else{
            session()->setFlashdata('gagal','Email yang anda masukkan tidak valid. Mohon periksa kembali');
            return redirect()->to('/login')->withInput();
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    public function resetPass($id)
    {
        $model  = new M_login();

        $cari = $model->cariData($id);
        $id_pengguna = $cari->id_pengguna;
        $model->reset([
            'password'		=> password_hash('apotek123', PASSWORD_DEFAULT)
        ],$id_pengguna);

        session()->setFlashdata('sukses','Password berhasil direset');
        return redirect()->to('/admin/dpengguna');
    }
}