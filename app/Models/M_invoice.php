<?php

namespace App\Models;

use CodeIgniter\Model;

class M_invoice extends Model
{
    protected $table = "invoice";

    public function addInvoice($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function hapus($id)
    {
        return $this->db->table(($this->table))->delete(['id_invoice' => $id]);
    }
}
