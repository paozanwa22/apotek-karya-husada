<?php

namespace App\Controllers;

use CodeIgniter\controller;
use App\Models\M_profile;
use App\Models\M_login;
use CodeIgniter\Config\Config;
use CodeIgniter\Validation\Rules;

class Login extends BaseController
{
    public function index()
    {
        $tapil = new M_profile();
        $data = [
            'title'     => 'Login',
            'nmaptk'     => $tapil->tampil(),
            'validation'    => \Config\Services::validation()
        ];
        return view('login/v_login', $data);
    }
    public function cekLogin()
    {
        $model = new M_login();

        if (!$this->validate([
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
        ])) {
            return redirect()->to('/Login')->withInput();
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $cek = $model->cekData($email);

        // Pengecekan
        if ($cek != null) {
            $data_ses = [
                'id_pengguna'   => $cek['id_pengguna'],
                'nama'          => $cek['nama'],
                'level'         => $cek['level'],
                'poto'          => $cek['poto'],
                'log_in'        => TRUE
            ];
            if (password_verify($password, $cek['password'])) {
                session()->set($data_ses);
                return redirect()->to('/admin');
            } else {
                session()->setFlashdata('gagal', 'Password anda tidak valid. Mohon periksa kembali');
                return redirect()->to('/login')->withInput();
            }
        } else {
            session()->setFlashdata('gagal', 'Email yang anda masukkan tidak valid. Mohon periksa kembali');
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
            'password'        => password_hash('apotek123', PASSWORD_DEFAULT)
        ], $id_pengguna);

        session()->setFlashdata('sukses', 'Password berhasil direset');
        return redirect()->to('/admin/dpengguna');
    }
    public function lupa_password()
    {
        $tampil = new M_profile();
        $data = [
            'nmApotek'      => $tampil->tampil(),
            'validation'    => \Config\Services::validation()
        ];
        return view('/login/v_lupa_password', $data);
    }
    public function lupaPasswordaksi()
    {
        if (!$this->validate([
            'email'     => [
                'rules'     => 'required|valid_email|is_not_unique[tb_pengguna.email]',
                'errors'     => [
                    'required'      => 'Email tidak bolah kosong',
                    'valid_email'   => 'Email tidak Valid',
                    'is_not_unique' => 'Email tidak terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/login/lupa_password')->withInput();
        }
        $model  = new M_login();
        $email = $this->request->getVar('email');
        $password = time();

        $data = $model->cekData($email);
        // dd($data);
        if ($data) {
            $library = \Config\Services::email();

            $library->setFrom('apotekkaryahusada@haikalwahyudi.com', 'Apotek Karya Husada');
            $library->setTo($data['email']);
            $library->setSubject('Reset Password');
            $library->setMessage('Password anda berhasil di reset, anda bisa login menggunakan kan password ' . $password);
            $library->send();
        }
        $id_pengguna = $data['id_pengguna'];
        // dd($id_pengguna);
        $model->reset([
            'password'        => password_hash($password, PASSWORD_DEFAULT)
        ], $id_pengguna);

        session()->setFlashdata('pesan', 'Silahkan cek email untuk melihat password baru');
        return redirect()->to('/login/lupa_password');
    }
}
