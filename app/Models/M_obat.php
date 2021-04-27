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
        return getWhere(['id_ob' => $id_ob]);
    }
}