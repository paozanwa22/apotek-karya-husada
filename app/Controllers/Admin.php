<?php

namespace App\Controllers;

use CodeIgniter\controller;

use App\Models\M_obat;
use App\Models\M_suplier;
use App\Models\M_satuan;
use App\Models\M_kategori;
use App\Models\M_pengguna;
use App\Models\M_profile;
use App\Models\M_penjualan;
use App\Models\M_invoice;

class Admin extends BaseController
{
	//Protected
	protected $M_obat;
	protected $M_suplier;
	protected $M_satuan;
	protected $M_kategori;
	protected $M_pengguna;
	protected $M_profile;
	protected $M_penjualan;
	protected $M_invoice;

	public function __construct()
	{
		$this->M_obat = new M_obat();
		$this->M_suplier = new M_suplier();
		$this->M_satuan = new M_satuan();
		$this->M_kategori = new M_kategori();
		$this->M_pengguna = new M_pengguna();
		$this->M_profile = new M_profile();
		$this->M_penjualan = new M_penjualan();
		$this->M_invoice = new M_invoice();
	}


	public function index()
	{
		$data = [
			'title'				=> "Beranda",
			'uri'				=> \Config\Services::request(),
			'count_obat'		=> $this->M_obat->count(),
			'count_supplier'	=> $this->M_suplier->count()
		];
		return view('admin/v_beranda', $data);
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
			'autonumber' => $this->M_obat->autonumber(),
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
			'validation'	=> \Config\Services::validation(),
			'dsuplier'		=> $this->M_suplier->ambilData(),
			'dsatuan'		=> $this->M_satuan->ambilData(),
			'dkategori'		=> $this->M_kategori->ambilData()
		];
		return view('admin/master/v_tobat', $data);
	}
	public function uobat($kd_obat)
	{
		$data = [
			'title'		=> 'Ubah Data Obat',
			'uri'			=> \Config\Services::request(),
			'validation'	=> \Config\Services::validation(),
			'dobat'			=> $this->M_obat->ambilData($kd_obat)->getRow(),
			'dsuplier'		=> $this->M_suplier->ambilData(),
			'dsatuan'		=> $this->M_satuan->ambilData(),
			'dkategori'		=> $this->M_kategori->ambilData()
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
		], $kd_obat);

		session()->setFlashdata('sukses', 'Data Berhasil Diubah');
		return redirect()->to('/admin/dobat');
	}
	public function sobat()
	{
		if (!$this->validate([
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
		])) {
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
		session()->setFlashdata('sukses', 'Data Berhasil disimpan');
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
		if (!$this->validate([
			'nama' => [
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Nama tidak boleh kosong'
				]
			],
			'no_hp' => [
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
		])) {
			return redirect()->to('/admin/tsupplier')->withInput();
		}

		$this->M_suplier->simpan([
			'kd_sup'	=> $this->request->getVar('kd_sup'),
			'nama'		=> $this->request->getVar('nama'),
			'no_hp'	=> $this->request->getVar('no_hp'),
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
			'no_hp'	=> $this->request->getVar('no_hp'),
			'alamat'	=> $this->request->getVar('alamat')
		], $kd_sup);
		session()->setFlashdata('sukses', 'Data berhasil diubah');
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
		if (!$this->validate([
			'satuan'	=> [
				'rules'		=> 'required|is_unique[tb_satuan_obat.satuan]',
				'errors'	=> [
					'required'	=> 'Satuan tidak bolah kosong',
					'is_unique'	=> 'Satuan yang anda isi sudah ada'
				]
			]
		])) {
			return redirect()->to('/admin/dsatuan')->withInput();
		}

		$this->M_satuan->simpan([
			'satuan'		=> $this->request->getVar('satuan')
		]);
		session()->setFlashdata('sukses', 'Data berhasil disimpan');
		return redirect()->to('/admin/dsatuan');
	}
	public function uaksisatuan()
	{
		$cek = $this->M_satuan->ambilData($this->request->getVar('id_s'))->getRow();
		if ($cek->satuan == $this->request->getVar('satuan')) {
			$rules = 'required';
		} else {
			$rules = 'required|is_unique[tb_satuan_obat.satuan]';
		}
		if (!$this->validate([
			'satuan'	=> [
				'rules'		=> $rules,
				'errors'	=> [
					'required'	=> 'Satuan tidak bolah kosong',
					'is_unique'	=> 'Satuan yang anda perbarui sudah ada'
				]
			]
		])) {
			return redirect()->to('/admin/dsatuan/' . $this->request->getVar('id_s'))->withInput();
		}
		$id_s = $this->request->getVar('id_s');
		$this->M_satuan->ubah([
			'satuan'	=> $this->request->getVar('satuan')
		], $id_s);
		session()->setFlashdata('sukses', 'Data berhasil diperbarui');
		return redirect()->to('/admin/dsatuan');
	}
	public function hsatuan($id_s)
	{
		$this->M_satuan->hapus($id_s);
		session()->setFlashdata('sukses', 'Data berhasil dihapus');
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
	public function dkategori($id_k = '')
	{
		$data = [
			'title'			=> 'Data Kategori Obat',
			'uri'			=> \Config\Services::request(),
			'validation'	=> \Config\Services::validation(),
			'data'			=> $this->M_kategori->ambilData(),
			'cariid_k'		=> $this->M_kategori->ambilData($id_k)->getRow()
		];
		return view('admin/master/v_dkategori', $data);
	}
	public function taksikategori()
	{
		if (!$this->validate([
			'kategori'		=> [
				'rules'		=> 'required|is_unique[tb_kategori_obat.kategori]',
				'errors'	=> [
					'required'	=> 'Kategori tidak boleh kosong',
					'is_unique'	=> 'Kategori sudah ada'
				]
			]
		])) {
			return redirect()->to('/admin/dkategori')->withInput();
		}
		$this->M_kategori->simpan([
			'kategori'		=> $this->request->getVar('kategori')
		]);
		session()->setFlashdata('sukses', 'Data berhasil disimpan');
		return redirect()->to('/admin/dkategori');
	}
	public function uaksikategori()
	{
		$cek = $this->M_kategori->ambilData($this->request->getVar('id_k'))->getRow();
		if ($cek->kategori == $this->request->getVar('kategori')) {
			$rules = 'required';
		} else {
			$rules = 'required|is_unique[tb_kategori_obat.kategori]';
		}
		if (!$this->validate([
			'kategori'	=> [
				'rules'		=> $rules,
				'errors'	=> [
					'required'	=> 'kategori tidak bolah kosong',
					'is_unique'	=> 'kategori yang anda perbarui sudah ada'
				]
			]
		])) {
			return redirect()->to('/admin/dkategori/' . $this->request->getVar('id_k'))->withInput();
		}
		$id_s = $this->request->getVar('id_k');
		$this->M_kategori->ubah([
			'kategori'	=> $this->request->getVar('kategori')
		], $id_s);
		session()->setFlashdata('sukses', 'Data berhasil diperbarui');
		return redirect()->to('/admin/dkategori');
	}
	public function hkategori($id_k)
	{
		$this->M_kategori->hapus($id_k);
		session()->setFlashdata('sukses', 'Data berhasil dihapus');
		return redirect()->to('/admin/dkategori');
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
			'uri'			=> \Config\Services::request(),
			'data'			=> $this->M_obat->ambilData(),
			'cart'			=> \Config\Services::cart(),
			'autonumber'	=> $this->M_penjualan->autonumber()
		];
		return view('admin/transaksi/v_tpenjualan', $data);
	}
	public function tpenjualanaksi()
	{
		$cart = \Config\Services::cart();
		foreach ($cart->contents() as $data) {

			$ambilData = $this->M_obat->ambilData($data['id'])->getRowArray();

			if ($ambilData['stok'] < $data['qty']) {
				session()->setFlashdata('gagal', 'Stok ' . $data['name'] . ' Hanya Tersisa Tinggal ' . $ambilData['stok']);
				return redirect()->to('/admin/tpenjualan');
			}
			$kurangi = $ambilData['stok'] - $data['qty'];
			// dd($kurangi);

			$this->M_obat->ubah([
				'stok'	=> $kurangi
			], $data['id']);
		}

		$this->M_invoice->addInvoice([
			'id_pengguna'	=> session()->get('id_pengguna'),
			'tgl_beli'		=> date('Y-m-d')
		]);

		$id_invoice = $this->M_invoice->insertID();

		foreach ($cart->contents() as $value) {
			// dd($value);
			$this->M_penjualan->simpan([
				'no_transaksi'	=> $this->request->getVar('no_trs'),
				'kd_obat'		=> $value['id'],
				'id_invoice'	=> $id_invoice,
				'tgl_jual'		=> date('Y-m-d'),
				'jumlah'		=> $value['qty'],
				'total'			=> $value['subtotal']
			]);
		}

		$cart->destroy();
		return redirect()->to('/admin/tpenjualan');
	}
	public function pilihObat($id)
	{
		$data = [
			'title'		=> 'Penjualan',
			'dobat'		=> $this->M_obat->ambilData($id)->getRow(),
			'uri'		=> \Config\Services::request(),
			'data'		=> $this->M_obat->ambilData(),
			'cart'			=> \Config\Services::cart(),
			'autonumber'	=> $this->M_penjualan->autonumber()
		];
		return view('/admin/transaksi/v_tpenjualan', $data);
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
			'uri'			=> \Config\Services::request(),
			'data'			=> $this->M_pengguna->ambilData()
		];
		return view('admin/v_dpengguna', $data);
	}
	public function tpengguna()
	{
		$data = [
			'title'			=> 'Pengguna',
			'uri'			=> \Config\Services::request(),
			'validation'	=> \Config\Services::validation()
		];
		return view('admin/v_tpengguna', $data);
	}
	public function taksipengguna()
	{
		if (!$this->validate([
			'nama'		=> [
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Nama tidak boleh kosong'
				]
			],
			'email'		=> [
				'rules'		=> 'required|is_unique[tb_pengguna.email]',
				'errors'	=> [
					'required'	=> 'Email tidak boleh kosong',
					'is_unique'	=> 'Email sudah terdaftar, gunakan email lain.'
				]
			],
			'password'		=> [
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Password tidak boleh kosong'
				]
			],
			'level'			=> [
				'rules'		=> 'required',
				'errors'	=> [
					'required'	=> 'Silahkan pilih level'
				]
			],
		])) {
			return redirect()->to('/admin/tpengguna')->withInput();
		}
		$this->M_pengguna->simpan([
			'nama'		=> $this->request->getVar('nama'),
			'email'		=> $this->request->getVar('email'),
			'jk'		=> "-",
			'password'	=> password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
			'no_hp'	=> "-",
			'alamat'	=> "-",
			'level'		=> $this->request->getVar('level'),
			'poto'		=> "default.png",
			'tgl_buat'	=> date('Y-m-d'),
		]);
		session()->setFlashdata('sukses', 'Data berhasil disimpan');
		return redirect()->to('/admin/tpengguna');
	}
	public function hpengguna($id)
	{
		$gambar = $this->M_pengguna->ambilData($id)->getRow();
		if ($gambar->poto != "default.png") {
			//Hapus data beserta file gambar
			unlink('gambar/' . $gambar->poto);
		}
		$this->M_pengguna->hapus($id);
		session()->setFlashdata('sukses', 'Data berhasil dihapus');
		return redirect()->to('/admin/dpengguna');
	}
	public function upengguna($id)
	{
		$data = [
			'title'			=> 'Pengguna',
			'uri'			=> \Config\Services::request(),
			'validation'	=> \Config\Services::validation(),
			'udata'			=> $this->M_pengguna->ambilData($id)->getRow()
		];
		return view('admin/v_upengguna', $data);
	}
	public function uaksipengguna()
	{
		$id = $this->request->getVar('id');
		// Pengecekan
		$cek_email = $this->M_pengguna->ambilData($id)->getRowArray();

		if ($cek_email['email'] == $this->request->getVar('email')) {
			$rules = 'required';
		} else {
			$rules = 'is_unique[tb_pengguna.email]';
		}
		// dd($cek_email);
		if (!$this->validate([
			'email'		=> [
				'rules'		=> $rules,
				'errors'	=> [
					'is_unique'	=> 'Email sudah terdaftar, gunakan email lain.',
					'required'	=> 'Email harus diisi.'
				]
			]
		])) {
			return redirect()->to('/admin/upengguna/' . $this->request->getVar('id'))->withinput();
		}

		$this->M_pengguna->ubah([
			'nama'		=> $this->request->getVar('nama'),
			'email'		=> $this->request->getVar('email'),
			'level'		=> $this->request->getVar('level'),
		], $id);
		session()->setFlashdata('sukses', 'Data berhasil diubah');
		return redirect()->to('/admin/dpengguna');
	}
	//=========================== END PENGGUNA ======================
	//=========================== PROFILE ======================
	public function profile()
	{
		$id_pengguna = session()->get('id_pengguna');
		$data = [
			'title'			=> 'Profile Pengguna',
			'uri'			=> \Config\Services::request(),
			'validation' => \Config\Services::validation(),
			'data'      	=> $this->M_pengguna->ambilData($id_pengguna)->getRow()
		];
		return view('admin/v_profile', $data);
	}
	public function updateProfilePengguna()
	{
		if (!$this->validate([
			'poto' => [
				'rules' => 'max_size[poto,1024]|is_image[poto]|mime_in[poto,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar, max 1MB',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in'   => 'Yang anda pilih bukan gambar',
				]
			]
		])) {
			return redirect()->to('/admin/profile')->withInput();
		}

		$id_pengguna = $this->request->getVar('id');
		$cariId = $this->M_pengguna->ambilData($id_pengguna)->getRow();

		$inputGambar = $this->request->getFile('poto');

		if ($inputGambar->getError() == 4) {
			$gambarLama = $this->request->getVar('gambarLama');
			$nmGambar = $gambarLama;
		} else {
			$nmGambar = $inputGambar->getRandomName();
			$inputGambar->move('gambar', $nmGambar);
			if ($cariId->poto != "default.png") {
				unlink('gambar/' . $this->request->getVar('gambarLama'));
			}
		}
		$this->M_pengguna->ubah([
			'nama'		=> $this->request->getVar('nama'),
			'alamat'	=> $this->request->getVar('alamat'),
			'jk'		=> $this->request->getVar('jk'),
			'no_hp'		=> $this->request->getVar('no_hp'),
			'poto'		=> $nmGambar,
		], $id_pengguna);

		session()->setFlashdata('sukses', 'Data berhasil disimpan');
		return redirect()->to('/admin/profile');
	}
	public function profile_aptk($id = '1')
	{
		$data = [
			'title'			=> 'Profile Apotek',
			'uri'			=> \Config\Services::request(),
			'dapt'			=> $this->M_profile->cari($id)->getRowArray()
		];
		return view('admin/v_profileapotek', $data);
	}
	public function uprofileapotek()
	{
		$id = $this->request->getVar('id');
		$this->M_profile->ubah([
			'nm_apotek'		=> $this->request->getVar('nm_apotek'),
			'pimpinan'		=> $this->request->getVar('pimpinan'),
			'alamat'		=> $this->request->getVar('alamat')
		], $id);

		session()->setFlashdata('sukses', 'Data berhasil diubah');
		return redirect()->to('/admin/profile_aptk');
	}
	//=========================== END PROFILE ======================
	//=========================== GANTI PASSWORD ======================
	public function gantiPass()
	{
		$data = [
			'title'         => 'Ganti Password',
			'uri'			=> \Config\Services::request(),
			'validation'    => \Config\Services::validation()
		];
		return view('login/v_ganti_pass', $data);
	}
	public function gantiPassAksi()
	{
		$id_pengguna = session()->get('id_pengguna');
		if (!$this->validate([
			'pass_lama'	=> [
				'rules'		=> 'required',
				'errors'	=> [
					'required'		=> 'Password lama tidak bolah kosong'
				]
			],
			'password'	=> [
				'rules'		=> 'required',
				'errors'	=> [
					'required'		=> 'Password baru tidak bolah kosong'
				]
			],
			'konfir_password'	=> [
				'rules'		=> 'required',
				'errors'	=> [
					'required'		=> 'Password tidak boleh kosong',
					'matches'		=> 'Konfirmasi Password tidak sama'
				]
			],
		])) {
			return redirect()->to('/admin/gantiPass')->withInput();
		}

		$cek = $this->M_pengguna->ambilData($id_pengguna)->getRowArray();
		// dd($cek);
		$passLama = $this->request->getVar('pass_lama');

		if (password_verify($passLama, $cek['password'])) {
			if (!$this->validate([
				'konfir_password'	=> [
					'rules'		=> 'matches[password]',
					'errors'	=> [
						'matches'		=> 'Konfirmasi Password tidak sama'
					]
				],
			])) {
				return redirect()->to('/admin/gantiPass')->withInput();
			}

			$this->M_pengguna->ubah([
				'password'		=> password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
			], $id_pengguna);

			session()->setFlashdata('sukses', 'Password Berhasil Diubah');
			return redirect()->to('/admin/gantiPass');
		} else {
			session()->setFlashdata('gagal', 'Password Lama Tidak Sesuia');
			if (!$this->validate([
				'konfir_password'	=> [
					'rules'		=> 'matches[password]',
					'errors'	=> [
						'matches'		=> 'Konfirmasi Password tidak sama'
					]
				],
			])) {
				return redirect()->to('/admin/gantiPass')->withInput();
			}

			return redirect()->to('/admin/gantiPass')->withInput();
		}
	}
	//=========================== END GAMNTI PASSWORD ======================
	//=========================== CRUD Cart ======================
	public function cek()
	{
		$cart = \Config\Services::cart();
		$respon = $cart->contents();
		$data = json_encode($respon);
		echo '<pre>';
		print_r($data);
		echo '</pre';
	}
	public function add()
	{
		$cart = \Config\Services::cart();
		$cart->insert(array(
			'id'      => $this->request->getVar('kd_obat'),
			'qty'     => $this->request->getVar('qty'),
			'price'   => $this->request->getVar('harga_jual'),
			'name'    => $this->request->getVar('nama'),
			// 'options' => array('Size' => 'L', 'Color' => 'Red')
		));
		return redirect()->to('/admin/tpenjualan');
	}
	public function clear()
	{
		$cart = \Config\Services::cart();
		$cart->destroy();
	}
	public function deletecart($rowid)
	{
		$cart = \Config\Services::cart();
		$cart->remove($rowid);
		return redirect()->to('/admin/tpenjualan');
	}
	public function updatecart()
	{
		$cart = \Config\Services::cart();
		$i = 1;
		foreach ($cart->contents() as $d) {
			$cart->update(array(
				'rowid'   => $d['rowid'],
				'qty'     => $this->request->getVar('qty' . $i++),
			));
		}
		return redirect()->to('/admin/tpenjualan');
	}
	//=========================== End CRUD Cart ======================
}
