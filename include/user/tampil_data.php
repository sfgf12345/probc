<div class="col-md-12">
    <div class="container-fluid">
        <div class="col">
            <h5 style="color: #0F0E0E;">Administrasi User</h5>
            <hr>
        </div>
        <br>
    </div>
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="float: left; margin-top: 10px !important;">Data User</h6>
            <a href="?page=user/form.php" class="btn btn-primary" style="margin-left: 15px; width: 15%; float: right;">Tambah Data User</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <!-- <th>Password</th> -->
                        <th>Aksi</th>
                    </tr>
                    
                    <?php
                        include  'include/config.php';
                        $no = 1;

                        // $jumlahDataPerHalaman = 6;
                        // $jumlahData = mysqli_query($db_konek, "SELECT COUNT(*) FROM user");
                        // $jumlahHalaman = ceil((int)$jumlahData / (int)$jumlahDataPerHalaman);
                        // $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
                        // $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

                        $data_user = mysqli_query($db_konek, "SELECT * FROM user WHERE id_user>1");

                        while ($ambil_data = mysqli_fetch_array($data_user)) {    //(while untuk pengulangan) fetch_array = mengubah data objek ke dalam data array sehingga data yg diambil dari table database bisa ditampilkan 1 per 1
                            // print_r($ambil_data);
                            // exit();
                        $id_user = $ambil_data['id_user'];
                        $nama = $ambil_data['nama'];
                        $username = $ambil_data['username'];
                        

                    ?>

                    <tr>
                    
                        <td><?= $no++ ?></td>
                        <td><?= $nama ?></td>
                        <td><?= $username ?></td>
                        <!-- <td><?= $password_user ?></td> -->
                        <td>
                            <!-- <a href="?page=user/edit.php&id=<?= $id_user ?>" class="btn btn-warning">Edit </a> -->
                            <a onclick = "return confirm('Anda yakin ingin menghapus data ini?')" href="?page=user/hapus.php&id=<?= $id_user ?>" class="btn btn-danger"> Delete</a>
                        </td>
                        
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