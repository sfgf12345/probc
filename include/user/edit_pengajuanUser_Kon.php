<div class="col-md-6">
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Pengajuan</h6>
        </div>
        <div class="card-body">
            <?php

                    include 'include/config.php';

                    $no = 1;
                    $sql =mysqli_query($db_konek, "SELECT * FROM pengajuan_kontraktor WHERE id_kontraktor='$id_kontraktor'");
                    $ambil_data = mysqli_fetch_array($sql);
                        // print_r($ambil_data);
                        // exit();
                    $id_kontraktor = $ambil_data['id_kontraktor'];
                    $nama_perusahaan = $ambil_data['nama_perusahaan'];
                    $jenis_vendor = $ambil_data['jenis_vendor'];
                    $dic = $ambil_data['dic'];
                    $no_pengajuan_sap = $ambil_data['no_pengajuan_sap'];

                ?>

            <form action="?page=user/edit_pengajuanUser_Kon_pro.php" method="POST">
                <input type="hidden" name="id_kontraktor" value="<?= $id_kontraktor ?>">
                &nbsp;<span>Nama Perusahaan</span><input type="text" name="nama_perusahaan" value="<?= $nama_perusahaan ?>" class="form-control" placeholder=""><br>
                &nbsp;<span>DIC</span><input type="text" name="dic" value="<?= $dic ?>" class="form-control" placeholder="Enter password"><br>
                &nbsp;<span>No Pengajuan SAP</span><input type="text" name="no_pengajuan_sap" value="<?= $no_pengajuan_sap ?>" class="form-control" placeholder="Enter password"><br>

                <input type="submit" class="btn btn-success" value="Simpan Data"><br>
            </form>
        </div>
    </div>
</div>