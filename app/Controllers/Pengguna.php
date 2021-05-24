<?php namespace App\Controllers;

use CodeIgniter\controller;
use App\Models\M_pengguna;

class Pengguna extends BaseController
{
    protected $M_pengguna;

    public function __construct()
    {
        $this->M_pengguna = new M_pengguna;
    }
    public function profilepengguna()
    {
        $id_pengguna = session()->get('id_pengguna');

        $data = [
            'title'     => 'Profile Pengguna',
            'uri'		=> \Config\Services::request(),
            'validation'=> \Config\Services::validation(),
            'data'      => $this->M_pengguna->ambilData($id_pengguna)->getRow()
        ];
        return view('/admin/v_profile',$data);
    }
    public function updateProfile()
    {
        if(!$this->validate([
            'poto' => [
                'rules' => 'max_size[poto,2048]|is_image[poto]|mime_in[poto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, max 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in'   => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])){
            return redirect()->to('/pengguna/profilepengguna')->withInput();
        }
        
        $id_pengguna = session()->get('id_pengguna');
        $cariId = $this->M_pengguna->ambilData($id_pengguna)->getRow();
        
        // dd($gambarLama);
        $inputGambar = $this->request->getFile('poto');

        if($inputGambar->getError() == 4){
            $gambarLama = $this->request->getVar('gambarLama');
            $nmGambar = $gambarLama;
        }else{
            $nmGambar = $inputGambar->getRandomName();
            $inputGambar->move('gambar',$nmGambar);
            if($cariId->poto != "default.png")
            {
                unlink('gambar/'.$this->request->getVar('gambarLama'));
            }
        }

        $this->M_pengguna->ubah([
            'nama'      => $this->request->getVar('nama'),
            'email'     => $this->request->getVar('email'),
            'jk'        => $this->request->getVar('jk'),
            'no_hp'     => $this->request->getVar('no_hp'),
            'poto'      => $nmGambar,
            'alamat'    => $this->request->getVar('alamat')
        ], $id_pengguna);
        session()->setFlashdata('sukses','Data berhasil disimpan');
        return redirect()->to('/pengguna/profilepengguna');
    }
}