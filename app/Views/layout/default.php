<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title ?></title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/app.min.css">
  <?= $this->renderSection('css') ?>
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?= base_url(); ?>/template/assets/img/favicon.png' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <!-- <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li> -->
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" style="object-fit:cover;width:40px;height:40px;" src="<?= base_url(); ?>/template/assets/img/profile/<?= userLogin()->gambar ?>"
                class="user-img-radious-style rounded-circle author-box"><span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Account Role : <?= userLogin()->nama_level ?></div>
              <div class="dropdown-divider"></div>
              <a href="<?= site_url('auth/logout') ?>" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
          <li><p class="my-2"><b><?= userLogin()->nama ?></b></p></li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"> <img alt="image" src="<?= base_url(); ?>/template/assets/img/brand-logo.png" class="header-logo" /> <span
                class="logo-name">KRAKATOA</span>
            </a>
          </div>
        <?= $this->include('layout/menu'); ?>
        </aside>
      </div>
      
      <!-- Main Content -->
      <div class="main-content">
        <!-- <section class="section">
          <div class="section-body"> -->
              
            <?= $this->renderSection('content') ?>

          <!-- </div>
        </section> -->

        

              
              
              
            </div>
            </div> 
          </div>
      </div> 

      <footer class="main-footer">
        <div class="footer-left">
          <a href="http://gitub.com/RzkyF">Rizki Fadillah &copy; Copyright 2021</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="<?= base_url(); ?>/template/assets/js/app.min.js"></script>
  <!-- Template JS File -->
  <script src="<?= base_url(); ?>/template/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?= base_url(); ?>/template/assets/js/custom.js"></script>

  <!-- script for avoid Preventing Double form Submission -->
  <script>
     function checkForm(form){
       form.submit.disabled = true;
       return true;
     }
   </script>

  <?= $this->renderSection('footer'); ?>
</body>
</html>