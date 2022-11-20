<div class="col-md-12">
    <h3>Halaman User</h3>
    <br>
    <a href="?page=user/tambahBarang.php" class="btn btn-primary">Tambah Data Barang</a>
    <br><br>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>id Status</th>
                        <th>Status Barang</th>
                        
                    
                    </tr>

                    <?php

                        include 'include/config.php';

                        $no = 1;
                        $sql = mysqli_query($db_konek, "SELECT * FROM status");

                        while ($ambil_data = mysqli_fetch_array($sql)) {    //(while untuk pengulangan) fetch_array = mengubah data objek ke dalam data array sehingga data yg diambil dari table database bisa ditampilkan 1 per 1
                            // print_r($ambil_data);
                            // exit();
                        $idStatus = $ambil_data['id_status'];       
                        $statusBarang = $ambil_data['status'];

                    ?>

                    <tr>
                    
                        <td><?= $idStatus ?></td>
                        <td><?= $statusBarang ?></td>
                        
                    </tr>

                        <?php 
                            }      // penutup while, kenapa pake php baru biar tabel diatas gak susah bikinnya
                        ?>

                </table>
            </div>
        </div>
    </div>
</div>

     <!-- pada baris ke 40-43 tanda tanya nya  untuk mencetak data di dlm browser, sama dengan echo -->