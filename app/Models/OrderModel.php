<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'tb_order';
    protected $primaryKey       = 'id_order';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['nama_pelanggan','id_user','status_order','no_meja'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    public function getAllData(){
        $builder = $this->db->table('v_order');
        $builder->select('*');
        $builder->orderBy('id_ord','DESC');

        $query = $builder->get()->getResult();

        return $query;
    }

    public function getDataWhere($id_user){
        $builder = $this->db->table('v_order');
        $builder->select('*');
        $builder->orderBy('id_usr','DESC');
        $builder->where('id_usr', $id_user);
        

        $query = $builder->get()->getResult();

        return $query;
    }

}
