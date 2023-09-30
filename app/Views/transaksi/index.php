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
                    <h3>Data Transaksi</h3> 
                    <hr>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('home'); ?>"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data User</li>
                      </ol>
                    </nav>
                  </div>
                 <div class="card-body"> 
                 <?php  if (userLogin()->id_level == 3) : ?>
                   <div class="row">
                     <div class="col-md-12">
                     <div class="card">
                        <div class="card-header">
                            <h4 class="m-2">Laporan Per Periode</h4>
                        </div>
                        <div class="card-body">
                          <form action="<?= base_url('/transaksi/LaporanTransaksiPeriode')?>" method="post" target="_blank">
                         <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="awal">Tanggal Awal</label>
                              <input type="date" class="form-control" name="awal" id="awal" required>
                          </div>
                           </div>
                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="akhir">Tanggal Akhir</label>
                              <input type="date" class="form-control"  name="akhir" id="akhir" required>
                            </div>
                           </div>
                               <button class="btn btn-success btn-block"><i class="print"></i>Cetak Laporan</button>
                         
                         </div>

                          </form>
                        </div>
                     </div>
                     </div>
                     
                  </div>
                  <?php endif; ?>
                  <div class="row">
                   <div class="col-md-12">
                    <div class="table-responsive m-1">                        
                        <div class="flash-data" data-flashdata="<?= session()->get('success'); ?>"> <?php session()->remove('success'); ?></div>
                        <div class="flash-data" data-flashdata="<?= session()->get('error'); ?>"> <?php session()->remove('error'); ?></div>
                      <table class="table table-striped table-hover m-2" id="tableExportF" style="width:100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Kasir</th>
                            <th>Tanggal</th>
                            <th class="text-center">No Meja</th>
                            <th class="text-center">Nama Pelanggan</th>
                            <th>Total Bayar</th>
                            <th>Kembalian</th>
                            <th class="text-center">Pemasukan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          
                          if ($id_level != 2) {
                            $transaksi = $transaksi->getAllData();
                          } else {
                            $transaksi = $transaksi->getDataWhere($id_user);
                          }
                          $sub_total = 0;
                          foreach ($transaksi as $key =>$value ) :
                          $total_bayar = $value->total_bayar;
                          $kembalian = $value->kembalian;
                          $sub_total += $total_bayar - $kembalian;
                          $sub = $sub_total;
                          ?>
                            <tr>
                              <td><?= $key + 1 ?></td>
                              <td><div class="badge badge-secondary"><?= $value->nama; ?></div></td>
                              <td><?= $value->tanggal; ?></td>
                              <td class="text-center"><div class="badge badge-info">No.<?= $value->no_meja ?></div></td>
                              <td class="text-center"><div class="badge badge-warning"><?= $value->nama_pelanggan ?></div></td>
                              <td>Rp. <?= number_format($total_bayar,2,',','.') ?></td>
                              <td>Rp. <?= number_format($kembalian,2,',','.')?></td>
                              <td class="text-center">Rp. <?= number_format($total_bayar - $kembalian,2,',','.') ?></td>
                            </tr>
                          <?php  endforeach; ?>
                        </tbody>
                            <tfoot>
                                <tr>
                                  <td class="text-center"><h5>Sub Total </h5></td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td class="text-center">: Rp. <?= number_format($sub_total,2,',','.') ?></td>
                                </tr>
                            </tfoot>
                      </table>
                    </div>
                  </div>
                  <!-- end col -->
                                 
                   </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </section>

<?= $this->endSection(); ?>

<?= $this->section('footer') ?>
<!-- JS Libraies -->
  <script src="<?= base_url(); ?>/template/assets/bundles/datatables/datatables.min.js"></script>
  <script src="<?= base_url(); ?>/template/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>/template/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
   <!-- Page Specific JS File -->
   <script src="<?= base_url(); ?>/template/assets/js/page/datatables.js"></script>

   <script src="<?= base_url(); ?>/template/assets/bundles/sweetalert2/sweetalert2.all.js"></script>
   <script src="<?= base_url(); ?>/template/assets/js/myscript.js"></script>
   


  <?= $this->endSection(); ?>