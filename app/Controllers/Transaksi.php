<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
class Transaksi extends BaseController
{
    public function __construct(){
        $this->trans = new TransaksiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data transaksi',
            'transaksi' => $this->trans,
            'id_user' => userLogin()->id_user,
            'id_level' =>  userLogin()->id_level
        ];
        return view('transaksi/index', $data);
    }

    public function LaporanTransaksiPeriode(){

        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');

       $data = [    
        'laporan' => $this->trans->laporanPeriode($awal,$akhir),
        'awal' => $awal,
        'akhir' => $akhir
       ];
            
        return view('transaksi/laporanTransaksi',$data); 
    }
}
