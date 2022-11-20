<div class="col-md-12">
    <h3>Halaman User</h3>
    <br>
    <a href="?page=user/tambahPengajuan.php" class="btn btn-primary">Tambah Data Pengajuan</a>
    <br><br>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>id user</th>
                        <th>Nama Pengajuan</th>
                        <th>Qty Pengajuan</th>
                        <th>Tujuan Pengajuan</th>
                    
                    </tr>

                    <?php

                        include 'include/config.php';

                        $no = 1;
                        $sql = mysqli_query($db_konek, "SELECT * FROM pengajuan");

                        while ($ambil_data = mysqli_fetch_array($sql)) {    //(while untuk pengulangan) fetch_array = mengubah data objek ke dalam data array sehingga data yg diambil dari table database bisa ditampilkan 1 per 1
                            // print_r($ambil_data);
                            // exit();
                        $id_pengajuan = $ambil_data['id_pengajuan'];       
                        $idUser = $ambil_data['id_user'];
                        $namaPengajuan = $ambil_data['nama_pengajuan'];
                        $qtyPengajuan = $ambil_data['qty_pengajuan'];
                        $tujuanPengajuan = $ambil_data['tujuan_pengajuan'];

                    ?>

                    <tr>
                    
                        <td><?= $no++ ?></td>
                        <td><?= $idUser ?></td>
                        <td><?= $namaPengajuan ?></td>
                        <td><?= $qtyPengajuan ?></td>
                        <td><?= $tujuanPengajuan ?></td>
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