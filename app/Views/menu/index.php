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
            <h3>Data menu <a href="<?= site_url('/menu/new') ?>" class="btn btn-primary">Tambah Data</a></h3>
            <hr>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('home'); ?>"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data menu</li>
              </ol>
            </nav>
          </div>
          <div class="card-body">
            <div class="table-responsive">


              <div class="flash-data" data-flashdata="<?= session()->get('success'); ?>"> <?php session()->remove('success'); ?></div>
                        <div class="flash-data" data-flashdata="<?= session()->get('error'); ?>"> <?php session()->remove('error'); ?></div>
                      
              <table class="table table-striped table-bordered table-hover" id="save-stage" style="width:100%;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Menu</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Status Manu</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  foreach ($menu as $key => $value) : ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><img src="<?= base_url(); ?>/template/assets/img/menu/<?= $value->gambar ?>" style="object-fit:cover;" width="100px" height="100px"></td>
                      <td><?= $value->nama_menu ?></td>
                      <td><?= $value->jenis ?></td>
                      <td>Rp. <?= number_format($value->harga,2,',','.') ?></td>
                      <td>
                        <?php if( $value->status_masakan != 'tersedia' ) {?>
                            <div class="badge badge-danger">Tidak Tersedia</div>
                        <?php } else { ?>
                            <div class="badge badge-success">Tersedia</div>
                        <?php } ?>
                      </td>
                      <td class="text-center">
                        <a href="<?= site_url('menu/edit/' . $value->id_menu) ?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a> |
                        <a class="btn btn-delete btn-danger" href="<?= site_url('menu/delete/' . $value->id_menu) ?>"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
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
<script src="<?= base_url(); ?>/template/assets/bundles/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?= base_url(); ?>/template/assets/js/page/datatables.js"></script>
<script src="<?= base_url(); ?>/template/assets/bundles/sweetalert2/sweetalert2.all.js"></script>
   <script src="<?= base_url(); ?>/template/assets/js/myscript.js"></script>

<?= $this->endSection(); ?>