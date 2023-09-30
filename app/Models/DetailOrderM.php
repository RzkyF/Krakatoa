<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailOrderM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_detail_order';
    protected $primaryKey       = 'id_detail_order';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['id_order','id_menu','qty','keterangan'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
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
    
   public function getDataById($id_order) {

     $builder = $this->db->table('tb_detail_order');
        $builder->select('*');
        $builder->join('menu', 'menu.id_menu=tb_detail_order.id_menu');
        $builder->where('id_order', $id_order);
        $builder->orderBy('id_detail_order','DESC');

        $query = $builder->get()->getResultObject();

     return $query;
   }

   public function getDataDetail($id_order,$id_menu) {

      $builder = $this->db->table('tb_detail_order');
         $builder->select('*');
         $builder->where('id_order', $id_order);
         $builder->where('id_menu', $id_menu);

        $builder->orderBy('id_detail_order','DESC');

         $query = $builder->get()->getResultObject();
 
      return $query;
    }

   public function getDataByIdBayar($id_order) {

      $builder = $this->db->table('tb_detail_order');
         $builder->select('*,COUNT(*) AS record');
         $builder->join('menu', 'menu.id_menu=tb_detail_order.id_menu');
         $builder->where('id_order', $id_order);
        $builder->orderBy('id_order','DESC');

         $query = $builder->get()->getResultObject();
 
      return $query;
    }


  public function getTagihanById($id){
   $builder = $this->db->table('v_detail');
   $builder->select('*');
   $builder->join('user','v_detail.id_user=user.id_user');
   $builder->where('id_order',$id);
   $query = $builder->get()->getResult();

   return $query;
}

  public function getTotalById($id){
      $builder = $this->db->table('tb_detail_order');
      $builder->select('*,SUM(harga * qty) AS total_harga');
      $builder->join('menu','tb_detail_order.id_menu=menu.id_menu');
      $builder->where('id_order',$id);
      $query = $builder->get()->getResult();

      return $query;
  }
   
}
