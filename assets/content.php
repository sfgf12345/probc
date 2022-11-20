

<!-- Earnings (Monthly) Card Example -->

<?php if($_SESSION['id_user'] == 1):?>
            
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
            <a class="stretched-link" href="?page=user/tampil_data.php" style="font-size: 15px; text-decoration: none;" > User  </a>
          </div>
          <div class="col-auto ml-auto">
            <i class="fas fa-fw fa-user"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
            <a class="stretched-link" href="?page=user/pengajuan.php" style="font-size: 15px; text-decoration: none;" > Pengajuan </a>
          </div>
          <div class="col-auto ml-auto">
            <i class="fas fa-fw fa-file"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
            <a class="stretched-link" href="?page=user/historypengajuan.php" style="font-size: 15px; text-decoration: none;" > History Pengajuan </a>
          </div>
          <div class="col-auto ml-auto">
            <i class="fas fa-fw fa-table"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
            <a class="stretched-link" href="?page=user/monitoringSIO.php" style="font-size: 15px; text-decoration: none;"> Monitoring SIO</a>
          </div>
          <div class="col-auto ml-auto">
            <i class="fas fa-fw fa-desktop"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


            <!-- Earnings (Monthly) Card Example -->
            

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="pengajuan.php" style="font-size: 15px;"> Pengajuan</a></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="?page=user/status.php" style="font-size: 15px;"> Status </a></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
                <?php else:?> 
                              <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                      <a class="stretched-link" href="?page=user/pengajuanUser.php" style="font-size: 15px; text-decoration: none;"> Pengajuan</a>
                    </div>
                    <div class="col-auto ml-auto">
                      <i class="fas fa-fw fa-file fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                      <a class="stretched-link" href="?page=user/historypengajuanUser.php" style="font-size: 15px; text-decoration: none;"> History Pengajuan</a>
                    </div>
                    <div class="col-auto ml-auto">
                      <i class="fas fa-fw fa-table fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



                    <?php endif;?>
