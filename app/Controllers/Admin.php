<?php namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		$data = [
			'title'		=> "Blank Page"
		];
		return view('admin/v_blankpage',$data);
	}
}