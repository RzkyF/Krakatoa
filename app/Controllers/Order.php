<?php

namespace App\Controllers;

// use CodeIgniter\RESTful\ResourcePresenter;
use App\Models\OrderModel;
use App\Models\MenuModel;
use App\Models\DetailOrderM;
use App\Models\TransaksiModel;

class Order extends BaseController
{
     public function __construct(){
         $this->order = new OrderModel();
         $this->menu = new MenuModel();
         $this->detail = new DetailOrderM();
         $this->transaksi = new TransaksiModel();
     }

    public function index()
    {
        $data = [
            'title' => 'Data Order',
            'order' => $this->order,
            'menu' => $this->menu->where('status_masakan','tersedia')->findAll(),
            'det' => $this->detail
        ];
        return view('order/index', $data);
    }

    public function cetakStruk($id)
    {
        $detail = $this->detail->getTagihanById($id);
        // $total = $this->detail->getTotalById($id);

         $total = $this->transaksi->getDataKembali($id);

       
 
        foreach ($total as $key => $value) {
           $tagihan = $value->total_bayar;
           $kembali = $value->kembalian;
        }

        foreach ($detail as $key => $value) {
            $no_meja = $value->no_meja;
            $tanggal = $value->tanggal;
            $kasir = $value->username;
         }
        
        $data = [
            'title' => 'Cetak Struk',
            'detail' => $detail,
            'total' => $tagihan,
            'meja' => $no_meja,
            'kasir' => $kasir,
            'tanggal' => $tanggal,
            'order' => $id,
            'no_meja' => $no_meja,
            'kembalian' => $kembali
        ];
 
        return view('transaksi/cetak-struk',$data);
    }

    public function new()
    {
        session();
        $data = [
            'title' => 'Tambah Data',
            'order' => $this->order->getAllData(),
            'validation' => \Config\Services::validation()
        ];
        return view('order/create', $data);
    }


    public function create()
    {
        if (!$this->validate([
            'nama_pelanggan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field nama pelanggan harus diisi!'
                ]
            ]
        ])) {
          return redirect()->to(site_url('/order/new'))->withInput();
        }

        $nama_pelanggan = $this->request->getVar('nama_pelanggan');
        $meja = $this->request->getVar('no_meja');
        $keterangan = $this->request->getVar('keterangan');
        $user = $this->request->getVar('id_user');

        $data = [
            'nama_pelanggan' => $nama_pelanggan,
            'id_user' => $user,
            'no_meja' => $meja,
            'keterangan' => $keterangan,
            'status_order' => 'Belum_Bayar'
        ];

        $insert = $this->order->insert($data);

        if ($insert) {
            return redirect()->to(site_url('/order'))->with('success', 'Order Berhasil ditambah!');
        } else {
            return redirect()->to(site_url('/order'))->with('error', 'Data Gagal ditambah!');
        }
    }

    public function detail()
    {   
        $id_order = $this->request->getVar('id_order');
        $id_menu = $this->request->getVar('id_menu');
        $qty = $this->request->getVar('qty');
        $data = [
            'id_order' => $id_order,
            'id_menu' => $id_menu,
            'qty' => $qty
            
        ];

        $detail = $this->detail->getDataDetail($id_order,$id_menu);
        
                if ($detail) {
                    $id_menu_lama = $detail[0]->id_menu;
                    $id_detail = $detail[0]->id_detail_order;

                    if ($id_menu_lama == $id_menu) {
                        $jumlah = $detail[0]->qty + $qty;
                        $data = [
                            'qty' => $jumlah
                        ];
                        $val = ['id_detail_order'=>$id_detail,'id_order'=>$id_order,'id_menu'=>$id_menu];
                
                            $insert = $this->detail->update($val,$data);
                            return redirect()->to(site_url('/order'))->with('success', 'Pesanan Berhasil ditambah!');
                        } 
                }
        
       
        
        $insert = $this->detail->insert($data);

        if ($insert) {
            return redirect()->to(site_url('/order'))->with('success', 'Pesanan Berhasil ditambah!');
        } else {
            return redirect()->to(site_url('/order'))->with('danger', 'Data gagal ditambah!');
        }
    }

    public function bayar(){
        $total_bayar = $this->request->getVar('total_bayar');
        $total_harga = $this->request->getVar('total');

        $kembalian = $total_bayar-$total_harga;
        $id_order = $this->request->getVar('id_order');

        if ($total_harga > $total_bayar) {
            return redirect()->to(site_url('/order'))->with('error', 'Maaf Uang pembayaran kurang! Id Order = '.$id_order);
        }

        $data = [
            'id_user' => $this->request->getVar('id_user'),
            'id_order' => $id_order,
            'total_bayar' => $total_bayar,
            'kembalian' => $kembalian
        ];

        $kembali = number_format($kembalian,2,',','.');
        $insert = $this->transaksi->insert($data);

        if ($insert) {

            $status = [
                'id_order' => $id_order,
                'status_order' => 'Sudah_Bayar'
            ];
            $this->order->save($status);
         
            return redirect()->to(site_url('order/'))->with('bayar', $kembalian);
        }
    }

    public function delete($id = null)
    {
        $this->order->delete($id);
        $this->detail->where('id_order',$id)->delete();
        return redirect()->to(site_url('/order'))->with('success','Data Berhasil diHapus!');
       
    }

    public function deletedetail($id_order = null,$id_menu = null)
    {
        $this->detail->where(['id_order'=>$id_order,'id_menu'=>$id_menu])->delete();
        return redirect()->to(site_url('/order'));
    }
}
