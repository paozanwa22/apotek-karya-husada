<?php namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		$data = [
			'title'		=> "Dashboard"
		];
		return view('admin/v_dashboard',$data);
	}

	public function blankpage()
	{
		$data = [
			'title'		=> "Blank Page"
		];
		return view('admin/v_blankpage', $data);
	}
//=========================== OBAT ======================
	public function dobat()
	{
		$data = [
			'title'		=> 'Data Obat'
		];
		return view('admin/master/v_dobat', $data);
	}
	public function tobat()
	{
		$data = [
			'title'		=> 'Tambah Data Obat'
		];
		return view('admin/master/v_tobat', $data);
	}
	public function uobat()
	{
		$data = [
			'title'		=> 'Ubah Data Obat'
		];
		return view('admin/master/v_uobat', $data);
	}
//=========================== END OBAT ======================
//=========================== SUPPLIER ======================
public function dsupplier()
{
	$data = [
		'title'			=> 'Data Supplier'
	];
	return view('admin/master/v_dsupplier', $data);
}
public function tsupplier()
{
	$data = [
		'title'			=> 'Tambah Data Supplier'
	];
	return view('admin/master/v_tsupplier', $data);
}
public function usupplier()
{
	$data = [
		'title'			=> 'Ubah Data Supplier'
	];
	return view('admin/master/v_usupplier', $data);
}
//=========================== END SUPPLIER ======================
//=========================== SATUAN ======================
public function dsatuan()
{
	$data = [
		'title'			=> 'Data Satuan'
	];
	return view('admin/master/v_dsatuan', $data);
}
public function tsatuan()
{
	$data = [
		'title'			=> 'Tambah Data Satua'
	];
	return view('admin/master/v_tsatuan', $data);
}
public function usatuan()
{
	$data = [
		'title'			=> 'Ubah Data Satua'
	];
	return view('admin/master/v_usatuan', $data);
}
//=========================== END SATUAN ======================
}