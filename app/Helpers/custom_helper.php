<?php 

function userLogin(){
    $db = \Config\Database::connect();

    $builder = $db->table('user');
    $builder->select('*');
    $builder->join('level','level.id_level = user.id_level');
    $query = $builder->where('id_user',session('id_user'))->get()->getRow();

    return $query;
}

function countUser(){
    $db = \Config\Database::connect();

    $builder = $db->table('user');
   $query = $builder->countAll();

   return $query;

}

function countMenu(){
    $db = \Config\Database::connect();

    $builder = $db->table('tb_menu');
   $query = $builder->countAll();

   return $query;

}

function countTransaksiById($id){
    $db = \Config\Database::connect();
 
    $builder = $db->table('tb_order')->select('COUNT(*) AS jumlah')->where('id_user =',$id)->get()->getRow();
    $query = $builder;

   return $query;

}

function countTransaksiAll(){
    $db = \Config\Database::connect();

    $builder = $db->table('transaksi');
    $query = $builder->countAll();

   return $query;
}

 function countPenghasilanPerkasir($id) {
    $db = \Config\Database::connect();

    $builder = $db->table('transaksi');
    
    
    $query = $builder->select('SUM(total_bayar-kembalian) AS hasil')->where('id_user',$id)->get()->getResultArray();
    
    $total = $query[0];
    $uang = $total['hasil'];
    
    $hasil = "Rp " . number_format($uang,2,',','.');

    return $hasil;
  }

  function countPenghasilanAll() {
    $db = \Config\Database::connect();

    $builder = $db->table('transaksi');
    
    
    $query = $builder->select('SUM(total_bayar-kembalian) AS hasil')->get()->getResultArray();
    
    $total = $query[0];
    $uang = $total['hasil'];
    
    $hasil = "Rp " . number_format($uang,2,',','.');

    return $hasil;
  }


?>