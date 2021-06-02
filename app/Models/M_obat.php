<?php

namespace App\Models;

use CodeIgniter\Model;

class M_obat extends Model
{
    protected $table = 'tb_obat';

    public function ambilData($kd_obat = false)
    {
        if ($kd_obat === false) {
            return $this->db->table($this->table)
                ->join('tb_supplier', 'tb_supplier.kd_sup = tb_obat.kd_sup')
                ->join('tb_satuan_obat', 'tb_satuan_obat.id_s = tb_obat.id_s')
                ->join('tb_kategori_obat', 'tb_kategori_obat.id_k = tb_obat.id_k')
                ->orderBy('kd_obat', 'DESC')
                ->get()->getResultArray();
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
    public function autonumber()
    {
        $kode = $this->db->table($this->table)
            ->select('right(kd_obat,4) as kd_obat', false)
            ->orderBy('kd_obat', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode['kd_obat'] == null) {
            $no = 1;
        } else {
            $no = intval($kode['kd_obat']) + 1;
        }
        $s = "KDOB";
        $batas = str_pad($no, 4, "0", STR_PAD_LEFT);
        $kd_obat = $s . $batas;

        return $kd_obat;
    }
    public function count()
    {
        return $this->db->table($this->table)->countAll();
    }
    public function cariid($id)
    {
        return $this->db->table($this->table)
            ->join('tb_satuan_obat', 'tb_satuan_obat.id_s = tb_obat.id_s')
            ->join('tb_kategori_obat', 'tb_kategori_obat.id_k = tb_obat.id_k')
            ->where(['kd_sup' => $id])->get()->getResultArray();
    }
}
