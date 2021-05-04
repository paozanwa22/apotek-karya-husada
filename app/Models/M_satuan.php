<?php namespace App\Models;

use CodeIgniter\Model;

class Msatuan extends Model
{
    protected $table = 'tb_satuan_obat';

    public function ambilData($id_s = false)
    {
        if($id_s === false)
        {
            return $this->db->table($this->table)
            ->orderBy('id_s',"DESC")
            -get()->getRowArray();
        }
        return $this->getWhere(['id_s' => $id_s]);
    }
}