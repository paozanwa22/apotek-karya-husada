<?php namespace App\Models;

use CodeIgniter\Model;

class M_suplier extends Model
{
    protected $table="tb_supplier";

    public function ambilData($id_sup = false)      
    {
        if($id_sup === false){
            return $this->db->table($this->table)
            ->orderBy('id_sup','DESC')
            ->get()->getResultArray();
        }
        return $this->getWhere(['id_sup' => $id_sup]);
    }
    public function autonumber()
    {
        $kode = $this->db->table($this->table)
        ->select('right(id_sup,4) as id_sup', false)
        ->orderBy('id_sup','DESC')
        ->limit(1)->get()->getRowArray();

        if($kode['id_sup'] == null){
            $no=1;
        }else{
            $no= intval($kode['id_sup']) + 1;
        }
        $s = "SUP";
        $batas = str_pad($no, 4, "0", STR_PAD_LEFT);
        $id_sup = $s.$batas;

        return $id_sup;
    }
}