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
                    <h3>Data User <a href="<?= site_url('/user/new') ?>" class="btn btn-primary">Tambah Data</a></h3> 
                    <hr>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('home'); ?>"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data User</li>
                      </ol>
                    </nav>
                  </div>
                 <div class="card-body"> 
                    <div class="table-responsive">                        
                        <div class="flash-data" data-flashdata="<?= session()->get('success'); ?>"> <?php session()->remove('success'); ?></div>
                        <div class="flash-data" data-flashdata="<?= session()->get('error'); ?>"> <?php session()->remove('error'); ?></div>
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          
                          foreach ($user as $key =>$value ) :?>
                            <tr>
                              <td><?= $key + 1 ?></td>
                              <td><img src="<?= base_url(); ?>/template/assets/img/profile/<?= $value->gambar ?>" class="user-img-radious-style rounded-circle author-box" style="object-fit:cover;" width="80px" height="80px"></td>
                              <td><?= $value->nama ?></td>
                              <td><?= $value->username ?></td>
                              <td>
                                <?php $level = $value->nama_level;
                                if ($level == 'admin') :?>
                                  <div class="badge badge-danger">Admin</div>
                               <?php endif;?>
                               <?php if ($level == 'kasir') :?>
                                  <div class="badge badge-info">Kasir</div>
                               <?php endif;?>
                               <?php if ($level == 'manajer') :?>
                                  <div class="badge badge-secondary">Manajer</div>
                               <?php endif;?>
                            </td>
                              <td class="text-center">
                                  <a href="<?= site_url('user/edit/'.$value->id_user) ?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>  | 
                                  <a class="btn btn-delete btn-danger" href="<?= site_url('user/delete/' . $value->id_user) ?>"><i class="fas fa-trash"></i></a>
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