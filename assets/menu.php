<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GMOC</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Data
      </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data:</h6>
            <a class="collapse-item" href="#">Siswa</a>
            <a class="collapse-item" href="#">Guru</a>
            <a class="collapse-item" href="#">Kelas</a>
            <a class="collapse-item" href="#">Mata Pelajaran</a>
          </div>
        </div>
      </li> -->


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Setting
      </div> -->

      <!-- Nav Item - Tables -->
      <?php if($_SESSION['id_user'] == 1):?>
      <li class="nav-item">
        <a class="nav-link" href="?page=user/tampil_data.php">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=user/pengajuan.php">
          <i class="fas fa-fw fa-file"></i>
          <span>Pengajuan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=user/historypengajuan.php">
          <i class="fas fa-fw fa-table"></i>
          <span>History Pengajuan</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="?page=user/status.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Status</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="?page=user/monitoringSIO.php">
          <i class="fas fa-fw fa-desktop"></i>
          <span>Monitoring SIO</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="?page=user/monitoringKontrak.php">
          <i class="fas fa-fw fa-desktop"></i>
          <span>Monitoring Kontrak</span></a>
      </li> -->
      
      

      <?php else:?> 

      <li class="nav-item">
        <a class="nav-link" href="?page=user/pengajuanUser.php">
          <i class="fas fa-fw fa-file"></i>
          <span>Pengajuan</span></a>
      </li>
      <!-- history untuk kapan sio di acc -->
      <li class="nav-item">
        <a class="nav-link" href="?page=user/historypengajuanUser.php">
          <i class="fas fa-fw fa-table"></i>
          <span>History Pengajuan</span></a>
      </li>



        <?php endif;?>
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>