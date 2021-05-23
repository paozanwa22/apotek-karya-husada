<?php namespace App\models;

use CodeIgniter\Model;

class M_login extends Model
{
    protected $table = 'tb_pengguna';

    public function cekData($email)
    {
        return $this->db->table($this->table)
        ->where([
            'email' => $email
        ])->get()->getRow();
    }
}