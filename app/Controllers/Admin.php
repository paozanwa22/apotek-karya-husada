<?php namespace App\Controllers;
use CodeIgniter\controller;

use App\Models\M_obat;

class Admin extends BaseController
{
	//Protected
	protected $M_obat;

	public function __construct()
	{
		$this->M_obat = new M_obat();
	}


	public function index()
	{
		$data = [
			'title'		=> "Dashboard",
			'uri'			=> \Config\Services::request()
		];
		return view('admin/v_dashboard',$data);
	}

	public function blankpage()
	{
		$data = [
			'title'		=> "Blank Page",
			'uri'		=> \Config\Services::request()
		];
		return view('admin/v_blankpage', $data);
	}
//=========================== OBAT ======================
	public function dobat()
	{
		$number = $this->M_obat->autonumber();
		$data = [
			'title'		=> 'Data Obat',
			'autonumber'=> $number,
			'uri'		=> \Config\Services::request(),
			'data'		=> $this->M_obat->ambilData()
		];
		return view('admin/master/v_dobat', $data);
	}
	public function tobat()
	{
		$data = [
			'title'			=> 'Tambah Data Obat',
			'uri'			=> \Config\Services::request(),
			'autonumber'	=> $this->M_obat->autonumber(),
			'validation'	=> \Config\Services::validation()
		];
		return view('admin/master/v_tobat', $data);
	}
	public function uobat($kd_obat)
	{
		$data = [
			'title'		=> 'Ubah Data Obat',
			'uri'			=> \Config\Services::request(),
			'validation'	=> \Config\Services::validation(),
			'dobat'			=> $this->M_obat->ambilData($kd_obat)->getRow()
		];
		return view('admin/master/v_uobat', $data);
	}
	public function uaksiobat()
	{
		$kd_obat = $this->request->getVar('kd_obat');
		$this->M_obat->ubah([
			'nm_obat'			=> $this->request->getVar('nm_obat'),
			'id_sup'			=> $this->request->getVar('id_sup'),
			'id_k'				=> $this->request->getVar('id_k'),
			'harga_beli'		=> $this->request->getVar('harga_beli'),
			'harga_jual'		=> $this->request->getVar('harga_jual'),
			'stok'				=> $this->request->getVar('stok'),
			'tgl_kadaluarsa'	=> $this->request->getVar('tgl_kadaluarsa')
		],$kd_obat);

		session()->setFlashdata('sukses','Data Berhasil Diubah');
		return redirect()->to('/admin/dobat');
	}
	public function sobat()
	{
		if(!$this->validate([
			'nm_obat'		=> [
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> 'Nama obat tidak boleh kosong!'
				]
				],
			'id_sup'		=> [
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> 'Suplier tidak boleh kosong!'
				]
				],
			'id_k'		=> [
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> 'Kategori tidak boleh kosong!'
				]
				],
			'harga_beli'	=> [
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Harga beli tidak boleh kosong!'
				]
				],
			'harga_jual'	=> [
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Harga jual tidak boleh kosong!'
				]
				],
			'stok'	=> [
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Stok tidak boleh kosong!'
				]
				],
			'tgl_kadaluarsa'	=> [
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Tanggal kadaluarsa tidak boleh kosong!'
				]
				]
		])){
			return redirect()->to('/admin/tobat')->withinput();
		}
		$this->M_obat->simpan([
			'kd_obat'			=> $this->request->getVar('kd_obat'),
			'nm_obat'			=> $this->request->getVar('nm_obat'),
			'id_sup'			=> $this->request->getVar('id_sup'),
			'id_k'				=> $this->request->getVar('id_k'),
			'harga_beli'		=> $this->request->getVar('harga_beli'),
			'harga_jual'		=> $this->request->getVar('harga_jual'),
			'stok'				=> $this->request->getVar('stok'),
			'tgl_kadaluarsa'	=> $this->request->getVar('tgl_kadaluarsa'),
		]);
		session()->setFlashdata('sukses','Data Berhasil disimpan');
		return redirect()->to('/admin/tobat');
	}
	public function hobat($kd_ob)
	{
		$this->M_obat->hapus($kd_ob);
		session()->setFlashdata('sukses', 'Data Berhasil Dihapus');
		return redirect()->to('/admin/dobat');
	}
//=========================== END OBAT ======================
//=========================== SUPPLIER ======================
public function dsupplier()
{
	$data = [
		'title'			=> 'Data Supplier',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/master/v_dsupplier', $data);
}
public function tsupplier()
{
	$data = [
		'title'			=> 'Tambah Data Supplier',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/master/v_tsupplier', $data);
}
public function usupplier()
{
	$data = [
		'title'			=> 'Ubah Data Supplier',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/master/v_usupplier', $data);
}
//=========================== END SUPPLIER ======================
//=========================== SATUAN ======================
public function dsatuan()
{
	$data = [
		'title'			=> 'Data Satuan',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/master/v_dsatuan', $data);
}
public function tsatuan()
{
	$data = [
		'title'			=> 'Tambah Data Satua',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/master/v_tsatuan', $data);
}
public function usatuan()
{
	$data = [
		'title'			=> 'Ubah Data Satua',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/master/v_usatuan', $data);
}
//=========================== END SATUAN ======================
//=========================== KATEGORI ======================
public function dkategori()
{
	$data = [
		'title'			=> 'Data Kategori Obat',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/master/v_dkategori', $data);
}
public function tkategori()
{
	$data = [
		'title'			=> 'Tambah Data Kategori Obat',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/master/v_tkategori', $data);
}
public function ukategori()
{
	$data = [
		'title'			=> 'Ubah Data Kategori Obat',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/master/v_ukategori', $data);
}
//=========================== END KATEGORI ======================
//=========================== PENJUALAN ======================
public function dpenjualan()
{
	$data = [
		'title'			=> 'Data Penjualan Barang',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/transaksi/v_dpenjualan', $data);
}
public function tpenjualan()
{
	$data = [
		'title'			=> 'Penjualan',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/transaksi/v_tpenjualan', $data);
}
//=========================== END PENJUALAN ======================
//=========================== PEMBELIAN ======================
public function dpembelian()
{
	$data = [
		'title'			=> 'Data Pembelian Barang',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/transaksi/v_dpembelian', $data);
}
public function tpembelian()
{
	$data = [
		'title'			=> 'Pembelian',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/transaksi/v_tpembelian', $data);
}
//=========================== END PEMBELIAN ======================
//=========================== PENGGUNA ======================
public function dpengguna()
{
	$data = [
		'title'			=> 'Data Pengguna',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/v_dpengguna', $data);
}
public function tpengguna()
{
	$data = [
		'title'			=> 'Pengguna',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/v_tpengguna', $data);
}
public function upengguna()
{
	$data = [
		'title'			=> 'Pengguna',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/v_upengguna', $data);
}
//=========================== END PENGGUNA ======================
//=========================== PROFILE ======================
public function profile()
{
	$data = [
		'title'			=> 'Profile Pengguna',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/v_profile', $data);
}
public function profile_aptk()
{
	$data = [
		'title'			=> 'Profile Apotek',
		'uri'			=> \Config\Services::request()
	];
	return view('admin/v_pengaturan', $data);
}
//=========================== END PROFILE ======================
}