<?php namespace App\Controllers;
use CodeIgniter\controller;

use App\Models\M_obat;
use App\Models\M_suplier;
use App\Models\M_satuan;

class Admin extends BaseController
{
	//Protected
	protected $M_obat;
	protected $M_suplier;
	protected $M_satuan;

	public function __construct()
	{
		$this->M_obat = new M_obat();
		$this->M_suplier = new M_suplier();
		$this->M_satuan = new M_satuan();
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
		$data = [
			'title'		=> 'Data Obat',
			'autonumber'=> $this->M_obat->autonumber(),
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
			'kd_sup'			=> $this->request->getVar('kd_sup'),
			'id_s'				=> $this->request->getVar('id_s'),
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
			'kd_sup'		=> [
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> 'Suplier tidak boleh kosong!'
				]
				],
			'id_s'		=> [
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> 'Satuan tidak boleh kosong!'
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
			'kd_sup'			=> $this->request->getVar('kd_sup'),
			'id_s'				=> $this->request->getVar('id_s'),
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
		'uri'			=> \Config\Services::request(),
		'data'			=> $this->M_suplier->ambilData()
	];
	return view('admin/master/v_dsupplier', $data);
}
public function tsupplier()
{
	$data = [
		'title'			=> 'Tambah Data Supplier',
		'uri'			=> \Config\Services::request(),
		'autonumber'	=> $this->M_suplier->autonumber(),
		'validation'	=> \Config\Services::validation()
	];
	return view('admin/master/v_tsupplier', $data);
}
public function ssuplier()
{
	if(!$this->validate([
		'nama' => [
			'rules'		=> 'required',
			'errors'	=> [
				'required'	=> 'Nama tidak boleh kosong'
			]
			],
		'no_tlp' => [
			'rules'		=> 'required',
			'errors'	=> [
				'required'	=> 'Nomor tidak boleh kosong'
			]
			],
		'alamat' => [
			'rules'		=> 'required',
			'errors'	=> [
				'required'		=> 'Alamat tidak boleh kosong'
			]
		]
	])){
		return redirect()->to('/admin/tsupplier')->withInput();
	}

	$this->M_suplier->simpan([
		'kd_sup'	=> $this->request->getVar('kd_sup'),
		'nama'		=> $this->request->getVar('nama'),
		'no_tlp'	=> $this->request->getVar('no_tlp'),
		'alamat'	=> $this->request->getVar('alamat')
	]);
	session()->setFlashdata('sukses', 'Data berhasil disimpan');
	return redirect()->to('/admin/tsupplier');
}
public function hsupplier($kd_sup)
{
	$this->M_suplier->hapus($kd_sup);
	session()->setFlashdata('sukses', 'Data berhasil dihapus');
	return redirect()->to('/admin/dsupplier');
}
public function usupplier($kd_sup)
{
	$data = [
		'title'			=> 'Ubah Data Supplier',
		'uri'			=> \Config\Services::request(),
		'data'			=> $this->M_suplier->ambilData($kd_sup)->getRow()
	];
	return view('admin/master/v_usupplier', $data);
}
public function uaksisuplier()
{
	$kd_sup = $this->request->getVar('kd_sup');
	$this->M_suplier->ubah([
		'nama'		=> $this->request->getVar('nama'),
		'no_tlp'	=> $this->request->getVar('no_tlp'),
		'alamat'	=> $this->request->getVar('alamat')
	], $kd_sup);
	session()->setFlashdata('sukses','Data berhasil diubah');
	return redirect()->to('/admin/dsupplier');
}
//=========================== END SUPPLIER ======================
//=========================== SATUAN ======================
public function dsatuan($id_s = '')
{
	$data = [
		'title'			=> 'Data Satuan',
		'uri'			=> \Config\Services::request(),
		'data'			=> $this->M_satuan->ambilData(),
		'validation'	=> \Config\Services::validation(),
		'udata'			=> $this->M_satuan->ambilData($id_s)->getRow()
	];
	return view('admin/master/v_dsatuan', $data);
}
// public function tsatuan()
// {
// 	$data = [
// 		'title'			=> 'Tambah Data Satua',
// 		'uri'			=> \Config\Services::request(),
// 	];
// 	return view('admin/master/v_tsatuan', $data);
// }
public function taksisatuan()
{
	if(!$this->validate([
		'satuan'	=> [
			'rules'		=> 'required|is_unique[tb_satuan_obat.satuan]',
			'errors'	=>[
				'required'	=> 'Satuan tidak bolah kosong',
				'is_unique'	=> 'Satuan yang anda isi sudah ada'
			]
		]
	])){
		return redirect()->to('/admin/dsatuan')->withInput();
	}
	
	$this->M_satuan->simpan([
		'satuan'		=> $this->request->getVar('satuan')
	]);
	session()->setFlashdata('sukses','Data berhasil disimpan');
	return redirect()->to('/admin/dsatuan');
}
public function uaksisatuan()
{
	$cek = $this->M_satuan->ambilData($this->request->getVar('id_s'))->getRow();
	if($cek->satuan == $this->request->getVar('satuan'))
	{
		$rules = 'required';
	}else{
		$rules = 'required|is_unique[tb_satuan_obat.satuan]';
	}
	if(!$this->validate([
		'satuan'	=> [
			'rules'		=> $rules,
			'errors'	=>[
				'required'	=> 'Satuan tidak bolah kosong',
				'is_unique'	=> 'Satuan yang anda perbarui sudah ada'
			]
		]
	])){
		return redirect()->to('/admin/dsatuan/'. $this->request->getVar('id_s'))->withInput();
	}
	$id_s = $this->request->getVar('id_s');
	$this->M_satuan->ubah([
		'satuan'	=> $this->request->getVar('satuan')
	], $id_s);
	session()->setFlashdata('sukses','Data berhasil diperbarui');
	return redirect()->to('/admin/dsatuan');
}
public function hsatuan($id_s)
{
	$this->M_satuan->hapus($id_s);
	session()->setFlashdata('sukses','Data berhasil dihapus');
	return redirect()->to('/admin/dsatuan');

}
// public function usatuan($id_s)
// {
// 	$data = [
// 		'title'			=> 'Ubah Data Satua',
// 		'uri'			=> \Config\Services::request(),
// 		'data'			=> $this->M_suplier->ambilData($id_s)->getRow()
// 	];
// 	return view('admin/master/v_usatuan', $data);
// }
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