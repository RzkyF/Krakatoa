<?= $this->extend('layout/default') ?>

<?= $this->section('css') ?>
  <!-- Data table Css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/bundles/sweetalert2/sweetalert2.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3>Data Order <a href="<?= site_url('/order/new') ?>" class="btn btn-primary">Tambah Order</a></h3> 
                    <hr>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('home'); ?>"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data Order</li>
                      </ol>
                    </nav>
                  </div>
                 <div class="card-body"> 

                    <div class="table-responsive">                        
                        <div class="flash-data" data-flashdata="<?= session()->get('success'); ?>"> <?php session()->remove('success'); ?></div>

                        <?php if (session()->get('error')) :?>
                        <div class="row">
                          <div class="col-md">
                          <div class="alert alert-warning alert-dismissible show fade">
                                        <div class="alert-body">
                                          <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                          </button>
                                          <?= session()->get('error'); ?>
                                          <?php session()->remove('error'); ?>
                                        </div>
                                </div>
                          <?php endif; ?>
                          
                <div class="flash-data" data-flashdata="<?= session()->get('error'); ?>"> <?php session()->remove('error'); ?></div>
                <div class="sudah_bayar" data-flashdata="<?= session()->get('bayar')?>"> <?php session()->remove('bayar'); ?></div>
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>ID ORDER</th>
                            <th>Nomer Meja</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Kasir</th>
                            <th class="text-center">Detail Pesanan</th>
                            <th>Status Order</th>
                            <th class="text-center">Order Menu</th>
                            <th>Transaksi</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $id_user = userLogin()->id_user;
                          $dataOrder = $order->getDataWhere($id_user);
                          $id_level = userLogin()->id_level;
                          if ($id_level != 2) {
                            $dataOrder = $order->getAllData();
                          } else {
                            $dataOrder = $order->getDataWhere($id_user);
                          }
                          foreach ($dataOrder as $key =>$i ) :
                            $id_order = $i->id_ord;
                            $pelanggan = $i->nama_pelanggan;
                            $tanggal = $i->tanggal;
                            $username =$i->username;
                            $meja = $i->no_meja;
                  
                            $stts_or = $i->status_order;
                          ?>
                            <tr>
                              <td><?= $key + 1 ?></td>
                              <td><?= $id_order ?></td>
                              <td><?= $meja ?></td>
                              <td><?= $pelanggan ?></td>
                              <td><?= $tanggal ?></td>
                              <td><div class="badge badge-secondary"><?= $username ?></div></td>

                              <td>
                                    <table class="table table-striped table-hover" id="save-stage">
                                      <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Menu</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                          <?php 
                                          $total = 0;
                                          $detail = $det->getDataById($id_order);          
                                             foreach ($detail as $key => $d) :
                                              $id_menu = $d->id_menu;
                                              $nama_menu = $d->nama_menu;
                                              $qty = $d->qty;
                                              $harga = $d->harga;

                                              $total += $harga * $qty;
                                       
                                            ?>
                                             <tr>
                                               <td><?= $key +1; ?></td>
                                                <td><?= $nama_menu; ?></td>
                                                <td class="text-center"><?= $qty; ?></td>
                                                <td><?= $harga; ?></td>
                                                <td>
                                                <?php if ($stts_or != 'Sudah_Bayar') { ?>
                                                <form action="<?= site_url('detaildel/'.$id_order.'/'.$id_menu) ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>            
                                                    <button class="btn btn-rounded btn-danger btn-delete">
                                                      <i class="fas fa-times"></i></button>
                                                    </form>  
                                                    <?php } else {?>
                                                      
                                                    <div class="text-success"><i class="far fa-check-circle"></i></div>
                                                <?php } ?>
                                                </td>
                                            </tr>
                                          <?php endforeach; ?>
                                      </tbody>
                                    </table>
                              </td>
                              <td>
                                    <?php if ($stts_or != 'Belum_Bayar') {?>
                                      <div class="badge badge-success">Sudah Dibayar</div>
                                    <?php } else {?>
                                      <div class="badge badge-warning">Belum Dibayar</div>
                                    <?php }?>
                              </td>
                              <td>
                              <?php if ($stts_or != 'Belum_Bayar') {?>
                                <div class="btn btn-success"><i class="far fa-check-circle"></i></div>        
                                    <?php } else {?>
                                      <button type="button" class="btn btn-icon btn-primary" id="btn-pesan" data-id="<?= $id_order ?>" data-toggle="modal" data-target="#ModalPesan"><i class="fas fa-plus"></i></button>
                                    <?php }?>
                                
                              </td>
                              <td class="text-center">
                                  <?php 
                                  
                                  $status_bayar = $det->getDataByIdBayar($id_order);
                                    
                                  
                                  foreach ($status_bayar as $key => $value) :
                                    $status = $value->record;
                                  ?>
                                      <?php if ($status != 0) {?>
                                        <?php if ($stts_or !='Sudah_Bayar') { ?>
                                          <button class="btn btn-success" id="btn-bayar" data-id="<?= $id_order ?>"  data-total="<?= $total?>" data-toggle="modal" data-target="#ModalTransaksi">Bayar</button>
                                        <?php } else {?>
                                          <a href="<?= site_url('order/struk/'.$id_order) ?>" target="_blank" class="btn btn-info"><i class="fa fa-print"></i>Cetak</a>
                                        <?php } ?>
                                      <?php } else {?>
                                          <div class="btn btn-warning">Belum Pesan</div>
                                        <?php }?>
                                  <?php endforeach; ?>
                              </td>
                                <td>
                                  <a href="<?= site_url('order/delete/'.$id_order) ?>" class="btn btn-icon btn-danger btn-delete" id="btn-delete"><i class="fas fa-trash"></i></a>

                              </td>
                            </tr>
                          <?php  endforeach; ?>


                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>  
        </section>

        <!-- modal tambah pesanan -->
        <div class="modal fade" id="ModalPesan" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true" style="display: none;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Tambah Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?= base_url('/order/pesan') ?>" method="POST">
               
                  <div class="form-group">
                    <div class="input-group">
                      <input id="id_order" type="hidden" class="form-control" name="id_order">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Menu</label>
                    <div class="input-group">
                      <select name="id_menu" id="" class="form-control">
                          <?php foreach ($menu as $key => $value) : ?>
                          <option value="<?= $value->id_menu; ?>"><?= $value->nama_menu; ?></option>
                          <?php endforeach;?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <div class="input-group">
                      <input type="number" class="form-control" min="0" name="qty">
                    </div>
                  </div>  
                  <button type="submit" class="btn btn-primary btn-block m-t-15 waves-effect">Tambah</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- end modal -->

        <!-- modal bayar -->
        <div class="modal fade" id="ModalTransaksi" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true" style="display: none;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Bayar Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?= base_url('/order/bayar') ?>" method="POST">
                <input type="hidden" name="id_user" value="<?= userLogin()->id_user ?>">
                      <input id="id_order"  type="hidden" class="form-control" name="id_order">
                  <div class="form-group">
                    <label>Total Harga</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                             <div class="input-group-text">
                          Rp
                         </div>
                        </div>
                      <input id="total" type="number" class="form-control uang" name="total" disabled>
                      <input type="hidden" name="total" id="total">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Bayar</label>
                    <div class="input-group">
                         <div class="input-group-prepend">
                             <div class="input-group-text">
                          Rp
                         </div>
                        </div>
                      <input type="number" class="form-control uang" min="10000" name="total_bayar" id="total_bayar" required="required">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block m-t-15 waves-effect">Bayar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- end modal -->

<?= $this->endSection(); ?>

<?= $this->section('footer') ?>
<!-- JS Libraies -->
  <script src="<?= base_url(); ?>/template/assets/bundles/datatables/datatables.min.js"></script>
  <script src="<?= base_url(); ?>/template/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>/template/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?= base_url(); ?>/template/assets/bundles/jquery-ui/getId.js"></script>


   <!-- Page Specific JS File -->
   <script src="<?= base_url(); ?>/template/assets/js/page/datatables.js"></script>

   <script src="<?= base_url(); ?>/template/assets/bundles/sweetalert2/sweetalert2.all.js"></script>
   <script src="<?= base_url(); ?>/template/assets/js/myscript.js"></script>

  
   


  <?= $this->endSection(); ?>