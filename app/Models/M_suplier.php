<?php namespace App\Models;

use CodeIgniter\Model;

class M_suplier extends Model
{
    protected $table="tb_supplier";

    public function ambilData($kd_sup = false)      
    {
        if($kd_sup === false){
            return $this->db->table($this->table)
            ->orderBy('kd_sup','DESC')
            ->get()->getResultArray();
        }
        return $this->getWhere(['kd_sup' => $kd_sup]);
    }
    public function simpan($data)
    {
        $simpan = $this->db->table($this->table);
        return $simpan->insert($data);
    }
    public function ubah($data,$kd_sup)
    {
        $ubah = $this->db->table($this->table);
        $ubah->where('kd_sup', $kd_sup);
        return $ubah->update($data);
    }
    public function hapus($kd_sup)
    {
        $hapus = $this->db->table($this->table);
        return $hapus->delete(['kd_sup' => $kd_sup]);
    }
    public function autonumber()
    {
        $kode = $this->db->table($this->table)
        ->select('right(kd_sup,4) as kd_sup', false)
        ->orderBy('kd_sup','DESC')
        ->limit(1)->get()->getRowArray();

        if($kode['kd_sup'] == null){
            $no=1;
        }else{
            $no= intval($kode['kd_sup']) + 1;
        }
        $s = "SUP";
        $batas = str_pad($no, 4, "0", STR_PAD_LEFT);
        $kd_sup = $s.$batas;

        return $kd_sup;
    }
    public function count()
    {
        return $this->db->table($this->table)->countAll();
    }
}