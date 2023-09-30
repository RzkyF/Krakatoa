<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['id_user','id_order','total_bayar','kembalian'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
    public function getAllData()
    {
        $builder = $this->db->table('v_transaksi');
        $builder->select('*');
        $builder->orderBy('id_transaksi','DESC');

        $query = $builder->get()->getResult();

        return $query;
    }

    public function getDataWhere($id_user){
        $builder = $this->db->table('v_transaksi');
        $builder->select('*');
        $builder->where('id_user', $id_user);
        $builder->orderBy('id_transaksi','DESC');

        $query = $builder->get()->getResult();

        return $query;
    }

    

    public function getDataKembali($id){
        $builder = $this->db->table('transaksi');
        $builder->select('*');
        $builder->where('id_order', $id);

        $query = $builder->get()->getResult();

        return $query;
    }

    public function laporanPeriode($awal,$akhir){
        $query = $this->db->table('v_transaksi')->where('created_at >=',$awal)->where('created_at <=',$akhir)->get()->getResult();

        return $query;
    }
}
