<?php namespace App\Models;

use CodeIgniter\Model;

class M_satuan extends Model
{
    protected $table = 'tb_satuan_obat';

    public function ambilData($id_s = false)
    {
        if($id_s === false)
        {
            return $this->db->table($this->table)
            ->orderBy('id_s',"DESC")
            ->get()->getResultArray();
        }
        return $this->getWhere(['id_s' => $id_s]);
    }
    public function simpan($data)
    {
        $simpan = $this->db->table($this->table);
        return $simpan->insert($data);
    }
    public function ubah($data, $id_s)
    {
        $ubah = $this->db->table($this->table);
        $ubah->where(['id_s' => $id_s]);
        return $ubah->update($data);
    }
    public function hapus($id_s)
    {
        $hapus = $this->db->table($this->table);
        return $hapus->delete(['id_s' => $id_s]);
    }
}