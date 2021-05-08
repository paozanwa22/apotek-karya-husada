<?php namespace App\Models;

use CodeIgniter\Model;

class M_profile extends Model
{
    protected $table = 'tb_profil';

    public function cari($id)
    {
        $cari = $this->db->table($this->table);
        return $cari->getWhere(['id' => $id]);
    }
    public function ubah($data, $id)
    {
        $ubah = $this->db->table($this->table);
        $ubah->where(['id' => $id]);
        return $ubah->update($data);
    }
}