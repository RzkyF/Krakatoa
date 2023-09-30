<?= $this->extend('layout/default') ?>

<?= $this->section('css') ?>
  <!-- Data table Css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashData('success')) :?>
  
<?php endif; ?>
<section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3>Home Page!</h3> 
                    <hr>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('home'); ?>"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                      </ol>
                    </nav>
                  </div>

                    <div class="card-body"> 
                    <div class="row">
                    <?php if (userLogin()->id_level == 1) :?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="card card-statistic-1">
                            <div class="card-icon l-bg-green">
                              <i class="fas fa-hiking"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="padding-20">
                                <div class="text-right">
                                  <h3 class="font-light mb-0">
                                    <i class="ti-arrow-up text-success"></i><?= countUser() - 1; ?>
                                  </h3>
                                  <span class="text-muted">User</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php endif; ?>

                        <?php if (userLogin()->id_level != 1) :?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="card card-statistic-1">
                            <div class="card-icon l-bg-cyan">
                              <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="padding-20">
                                <div class="text-right">
                                  <h3 class="font-light mb-0">
                                    <i class="ti-arrow-up text-success"></i>
                                    <?php 
                                    $id = userLogin()->id_user;
                                    if (userLogin()->id_level == 3) {
                                     echo countTransaksiAll();
                                    }else {
                                      echo countTransaksiById($id)->jumlah;
                                    }?>
                                  </h3>
                                  <span class="text-muted"><?= ($id == 2) ? 'Jumlah Semua Transaksi' : 'Jumlah Transaksi'; ?></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                          <div class="card card-statistic-1">
                            <div class="card-icon l-bg-orange">
                              <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="padding-20">
                                <div class="text-right">
                                  <h3 class="font-light mb-0">
                                    <i class="ti-arrow-up text-success"></i>
                                    <?php 
                                     if (userLogin()->id_level == 3) {
                                      echo countPenghasilanAll();
                                     }else {
                                       echo countPenghasilanPerkasir($id);
                                     }
                                    ?>
                                  </h3>
                                  <span class="text-muted"><?= ($id == 2) ? 'Pemasukan Semua transaksi' : 'Pemasukan'; ?></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                 

                    </div>

                      
                    <?php endif; ?>

                </div>
              </div>
            </div>
            
          </div>  
        </section>

<?= $this->endSection(); ?>
