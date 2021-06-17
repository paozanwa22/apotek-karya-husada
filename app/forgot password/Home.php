<?php

namespace App\Controllers;

use App\Models\User;

class Home extends BaseController
{
	public function __construct()
	{
		$this->User = new User();
	}

	public function index()
	{
		if (!empty($this->request->getVar('user')) && !empty($this->request->getVar('pass'))) {

			$request = $this->request->getVar();

			$user = $request['user'];
			$pass = $request['pass'];

			$condition = "username='" . $user . "' and password='" . $pass . "' and active='Yes'";

			$r = $this->User->where($condition)->find()[0];

			if (!empty($r)) {
				$data = [
					'as_login' => TRUE,
					'as_id' => $r['users_id'],
					'as_user' => $r['username'],
					'as_pass' => $r['password'],
					'as_level' => $r['users_level_id'],
					'as_store_id' => $r['store_id'],
				];

				$this->session->set($data);

				return redirect()->to(base_url('home'));
			} else {
				echo '
				<script>
					window.alert("Login Failed !");
					window.location=("' . base_url('home') . '")
				</script>';
				exit();
			}
		}

		if ($this->session->has('as_login')) {
			$data['TITLE'] = 'Dashboard | ';
			$data['CONTENT_TITLE'] = 'Dashboard';
			$data['CONTENT'] = 'home';

			$users_level_id = session()->get('as_level');

			if ($users_level_id != 1) {
				$store_id = session()->get('as_store_id');
				$transaction = select2("transaction", "COUNT(*) as jml, SUM(total) as grand_total", "WHERE store_id='$store_id'");
				$product = select2("product", "COUNT(*) as jml", "WHERE store_id='$store_id'");
				$customer = select2("customer", "COUNT(*) as jml", "WHERE store_id='$store_id'");
				$supplier = select2("supplier", "COUNT(*) as jml", "WHERE store_id='$store_id'");
				$user = select2("users", "COUNT(*) as jml", "WHERE active='Yes' AND users_level_id='2' AND store_id='$store_id'");

				$body = '
				<div class="row">
					<div class="col-sm-3">
						<div class="card bg-teal-400 text-center">
							<div class="card-header">
								Total Income
							</div>
							<div class="card-body">
								<h5 class="card-title">Rp. ' . currency($transaction['grand_total']) . '</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card bg-blue-400 text-center">
							<div class="card-header">
								Product
							</div>
							<div class="card-body">
								<h5 class="card-title">' . $product['jml'] . '</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card bg-pink-400 text-center">
							<div class="card-header">
								Total Transaction
							</div>
							<div class="card-body">
								<h5 class="card-title">' . $transaction['jml'] . '</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card bg-purple-400 text-center">
							<div class="card-header">
								Total Customer
							</div>
							<div class="card-body">
								<h5 class="card-title">' . $customer['jml'] . '</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<div class="card bg-grey-400 text-center">
							<div class="card-header">
								Total Supplier
							</div>
							<div class="card-body">
								<h5 class="card-title">' . $supplier['jml'] . '</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card bg-orange-400 text-center">
							<div class="card-header">
								Total Casier
							</div>
							<div class="card-body">
								<h5 class="card-title">' . $user['jml'] . '</h5>
							</div>
						</div>
					</div>
				</div>';
			} else {
				$body = '
				<div class="row">
					<div class="col-lg-12">
						<center>
							<h2 style="font-size: 25px; font-weight: bold; background-color: #c7c3c3; padding: 12px; width: 300px; border-radius: 25px;">
								<marquee>WELCOME</marquee>
							</h2>
							<br>
							<img src="' . base_url() . '/img/logo.png" class="img-responsive" alt="Logo" width="200px" height="180px">
						</center>
					</div>
				</div>';
			}

			$data['PBODY'] = $body;
			echo view('pages', $data);
		} else {
			$this->login();
		}

		/* $r = select2("user","*","WHERE username='admin' AND flag_aktif='1'");

		print_r($r); */
	}

	public function login()
	{
		$data = array();
		$data['TITLE'] = '';
		$data['ASSETS'] = array(
			//'font_awesome',
			//'bootstrap',
			'form_validation',
			//'captcha',
			//'g-recaptcha',
		);

		echo view('login', $data);
	}

	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url());
	}

	public function new_password()
	{

		if (!empty($this->request->getVar('email'))) {

			$request = $this->request->getVar();

			$email = $request['email'];
			$pass	= time();

			$condition = "username='" . $email . "' and active='Yes'";

			$r = $this->User->where($condition)->find()[0];

			if (!empty($r)) {

				$email_smtp = \Config\Services::email();

				$email_smtp->setFrom("pos.skripsi@gmail.com", "Reset Password");
				$email_smtp->setTo($r['username']);

				$email_smtp->setSubject("Reset Password");
				$email_smtp->setMessage("Password Anda berhasil direset. Password Anda saat ini adalah : $pass");


				$email_smtp->send();

				$data	= [
					'password' => $pass
				];

				$this->db->table('users')->update($data, ['username' => $email]);

				echo '
				<script>
					window.alert("Password Berhasil Direset !");
					window.location=("' . base_url('home/new_password') . '")
				</script>';
				exit();
			} else {
				echo '
				<script>
					window.alert("Maaf E-Mail yang Anda masukan tidak ada !");
					window.location=("' . base_url('home/new_password') . '")
				</script>';
				exit();
			}
		}

		$data = array();
		$data['TITLE'] = '';
		$data['ASSETS'] = array(
			//'font_awesome',
			//'bootstrap',
			'form_validation',
			//'captcha',
			//'g-recaptcha',
		);

		echo view('lupa_password', $data);
	}

	public function daftar_toko()
	{

		if (!empty($this->request->getVar('email')) && !empty($this->request->getVar('name')) && !empty($this->request->getVar('phone')) && !empty($this->request->getVar('address')) && !empty($this->request->getVar('pass'))) {

			$request = $this->request->getVar();

			$email 		= $request['email'];
			$name 		= $request['name'];
			$phone 		= $request['phone'];
			$address 	= $request['address'];
			$pass 		= $request['pass'];


			$r = $this->db->table('store')->getWhere(['email' => $email])->getRow();

			if (!empty($r)) {

				echo '
				<script>
					window.alert("Maaf Email yang Anda masukan sudah terdaftar !");
					window.location=("' . base_url('home/daftar_toko') . '")
				</script>';
				exit();
			} else {

				$db = db_connect('default');

				$field	= [
					'email'		=> $email,
					'address'	=> $address,
					'phone'		=> $phone,
					'name'		=> $name,

				];

				$save = $this->db->table('store')->insert($field);

				$store_id	= $db->insertID();

				if ($save) {

					$field_users = [
						'name'				=> $name,
						'username'			=> $email,
						'password'			=> $pass,
						'store_id'			=> $store_id,
						'users_level_id'	=> '2',
						'active'			=> 'Yes',

					];
					$this->db->table('users')->insert($field_users);
					echo '
					<script>
						window.alert("Pendaftaran toko baru berhasil. silahkan login!");
						window.location=("' . base_url() . '")
					</script>';
					exit();
				} else {
					echo '
					<script>
						window.alert("Maaf Email yang Anda masukan sudah terdaftar !");
						window.location=("' . base_url('home/daftar_toko') . '")
					</script>';
					exit();
				}
			}
		}

		$data = array();
		$data['TITLE'] = '';
		$data['ASSETS'] = array(
			//'font_awesome',
			//'bootstrap',
			'form_validation',
			//'captcha',
			//'g-recaptcha',
		);

		echo view('daftar_toko', $data);
	}
}
