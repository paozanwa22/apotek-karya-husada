<?php namespace App\Controllers;
use CodeIgniter\controller;

class Admin extends BaseController
{
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
			'uri'			=> \Config\Services::request()
		];
		return view('admin/v_blankpage', $data);
	}
//=========================== OBAT ======================
	public function dobat()
	{
		$data = [
			'title'		=> 'Data Obat',
			'uri'			=> \Config\Services::request()
		];
		return view('admin/master/v_dobat', $data);
	}
	public function tobat()
	{
		$data = [
			'title'		=> 'Tambah Data Obat',
			'uri'			=> \Config\Services::request()
		];
		return view('admin/master/v_tobat', $data);
	}
	public function uobat()
	{
		$data = [
			'title'		=> 'Ubah Data Obat',
			'uri'			=> \Config\Services::request()
		];
		return view('admin/master/v_uobat', $data);
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
//=========================== END PROFILE ======================
}