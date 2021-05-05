<?php namespace App\Models;

use CodeIgniter\Model;

class M_kategori extends Model
{
    protected $table='tb_kategori_obat';

    public function ambilData($id_k = false)
    {
        if($id_k === false)
        {
        return $this->db->table($this->table)
            ->orderBy('id_k','DESC')
            ->get()->getResultArray();
        }
        return $this->getWhere(['id_k' => $id_k]);
    }
    public function simpan($data)
    {
        $simpan = $this->db->table($this->table);
        return $simpan->insert($data);
    }
    public function ubah($data,$id_k)
    {
        $ubah = $this->db->table($this->table);
        $ubah->where(['id_k' => $id_k]);
        return $ubah->update($data);
    }
    public function hapus($id_k)
    {
        $hapus = $this->db->table($this->table);
        return $hapus->delete(['id_k' => $id_k]);
    }
}