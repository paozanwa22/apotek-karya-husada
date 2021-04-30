<?php namespace App\Models;

use CodeIgniter\Model;

class M_obat extends Model
{
    protected $table = 'tb_obat';

    public function ambilData($id_ob = false)
    {
        if($id_ob === false){
            return $this->findAll();
        }
        return getWhere(['kd_obat' => $id_ob]);
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
}