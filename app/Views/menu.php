<body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="d-flex justify-content-center align-items-center">
    <a href="#" class="nav-link flex-column text-center">
        <div class="nav-profile-image">
            <img src="<?= base_url('images/' . htmlspecialchars($yogi->logo_website)) ?>" alt="Website Logo" class="img-fluid" style="width: 90%; height: 60px;" />
        </div>
    </a>
</li>




          <li class="nav-item pt-3">
            <a class="nav-link d-block" href="index.html">
              <img class="sidebar-brand-logo" src="<?= base_url('assets/images/logo.svg')?>" alt="" />
              <img class="sidebar-brand-logomini" src="<?= base_url('assets/images/logo-mini.svg')?>" alt="" />
              <div class="small font-weight-light pt-1">Responsive Dashboard</div>
            </a>
            <form class="d-flex align-items-center" action="#">
              <div class="input-group">
                <div class="input-group-prepend">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control border-0" placeholder="Search" />
              </div>
            </form>
          </li>
          <li class="pt-2 pb-1">
            <span class="nav-item-head">DASHBOARD</span>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="<?= base_url('home/dashboard') ?>">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="pt-2 pb-1">
            <span class="nav-item-head">Template Pages</span>
          </li>
          <?php
      if (session()->get('status') == 'admin' || session()->get('status') == 'guru'){
        ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/guru') ?>">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Guru</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/mapel') ?>">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Mapel</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/blok') ?>">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Blok</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/kelas') ?>">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Kelas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/jurusan') ?>">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Jurusan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/rombel') ?>">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Rombel</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/siswa') ?>">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Siswa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/tahun_ajaran') ?>">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Tahun Ajaran</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/semester') ?>">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Semester</span>
            </a>
          </li>

          <?php 
      } else {

      }
?>
          <li class="pt-2 pb-1">
            <span class="nav-item-head">Schedule</span>
          </li>

          <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Jadwal</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('home/lihat_jadwal') ?>">Lihat Jadwal</a>
            </li>
            <?php
      if (session()->get('status') == 'admin'){
        ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('home/buat_jadwal') ?>">Buat Jadwal</a>
            </li>
            <?php 
      } else {

      }
?>
        </ul>
    </div>
</li>

<?php
      if (session()->get('status') == 'admin' || session()->get('status') == 'guru'){
        ?>
<li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/penilaian') ?>">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Penilaian</span>
            </a>
          </li>

          <?php 
      } else {

      }
?>


          <li class="nav-item">
          <a class="nav-link" href="<?= base_url('home/raport') ?>">
              <i class="mdi mdi-file-document-box menu-icon"></i>
              <span class="menu-title">Raport</span>
            </a>
          </li>


<?php
      if (session()->get('status') == 'admin' ){
        ?>
          
          
          <li class="nav-item">
          <a class="nav-link" href="<?= base_url('home/setting') ?>">
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              <span class="menu-title">Setting</span>
            </a>
          </li>

          <?php 
      } else {

      }
?>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles default primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles light"></div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
</button>

            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email-outline"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0 font-weight-semibold">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../assets/images/faces/face1.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                      <p class="text-gray mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../assets/images/faces/face6.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                      <p class="text-gray mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../assets/images/faces/face7.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                      <p class="text-gray mb-0"> 18 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <h6 class="p-3 mb-0 text-center text-primary font-13">4 new messages</h6>
                </div>
              </li>
              <li class="nav-item dropdown ml-3">
                <a class="nav-link" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="px-3 py-3 font-weight-semibold mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="mdi mdi-calendar"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-0">New order recieved</h6>
                      <p class="text-gray ellipsis mb-0"> 45 sec ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-warning">
                        <i class="mdi mdi-settings"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-0">Server limit reached</h6>
                      <p class="text-gray ellipsis mb-0"> 55 sec ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-info">
                        <i class="mdi mdi-link-variant"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-0">Kevin karvelle</h6>
                      <p class="text-gray ellipsis mb-0"> 11:09 PM </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <h6 class="p-3 font-13 mb-0 text-primary text-center">View all notifications</h6>
                </div>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-logout d-none d-md-block mr-3">
                <a class="nav-link" href="#">Status</a>
              </li>
              <li class="nav-item nav-logout d-none d-md-block">
                <button class="btn btn-sm btn-danger">Trailing</button>
              </li>
              <li class="nav-item nav-profile dropdown d-none d-md-block">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <div class="nav-profile-text">English </div>
                </a>
                <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="flag-icon flag-icon-bl mr-3"></i> French </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="flag-icon flag-icon-cn mr-3"></i> Chinese </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="flag-icon flag-icon-de mr-3"></i> German </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="flag-icon flag-icon-ru mr-3"></i>Russian </a>
                </div>
              </li>
              <li class="nav-item nav-logout d-none d-lg-block">
                <a class="nav-link" href="index.html">
                  <i class="mdi mdi-home-circle"></i>
                </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        