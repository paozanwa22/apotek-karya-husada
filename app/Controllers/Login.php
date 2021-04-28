<?php namespace App\Controllers;

use CodeIgniter\controller;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title'     => 'Login'
        ];
        return view('login/v_login', $data);
    }
}