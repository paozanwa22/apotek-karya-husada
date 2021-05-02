<?php namespace App\Models;

use CodeIgniter\Model;

class M_obat extends Model
{
    protected $table = 'tb_obat';

    public function ambilData($kd_obat = false)
    {
        if($kd_obat === false){
            return $this->findAll();
        }
        return $this->getWhere(['kd_obat' => $kd_obat]);
    }
    public function simpan($data)
    {
        $simpan = $this->db->table($this->table);
        return $simpan->insert($data);
    }
    public function hapus($id)
    {
        $hapus = $this->db->table($this->table);
        return $hapus->delete(['kd_obat' => $id]);
    }
    public function ubah($data, $kd_obat)
    {
        $ubah = $this->db->table($this->table);
        $ubah->where('kd_obat', $kd_obat);
        return $ubah->update($data);
    }
}