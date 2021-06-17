<?php

namespace App\models;

use CodeIgniter\Model;

class M_login extends Model
{
    protected $table = 'tb_pengguna';

    public function cariData($id)
    {
        return $this->db->table($this->table)
            ->getWhere(['id_pengguna' => $id])->getRow();
    }
    public function reset($data, $id)
    {
        $reset = $this->db->table($this->table);
        $reset->where(['id_pengguna' => $id]);
        return $reset->update($data);
    }
    public function cekData($email)
    {
        return $this->db->table($this->table)
            ->where([
                'email' => $email
            ])->get()->getRowArray();
    }
    public function resetPassword($data, $id)
    {
        return $this->db->table($this->table())
            ->where(['id_pengguna' => $id])
            ->update($data);
    }
}
