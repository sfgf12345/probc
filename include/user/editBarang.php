<div class="col-md-6">
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Barang</h6>
        </div>
        <div class="card-body">
            <?php

                    include 'include/config.php';

                    $no = 1;
                    $tangkap_data = $_GET['id'];
                    $sql = $db_konek->query("SELECT * FROM barang WHERE id_barang = '$tangkap_data'");
                    // $pecah = $sql->fetch_assoc();

                    $ambil_data = mysqli_fetch_array($sql);
                        // print_r($ambil_data);
                        // exit();
                    $id_barang = $ambil_data['id_barang'];
                    $nama_barang = $ambil_data['nama_barang'];
                    $qty_barang = $ambil_data['qty_barang'];
                    $satuan = $ambil_data['satuan'];
                    $deskripsi = $ambil_data['deskripsi'];
                    $tgl_berlaku_sampai = $ambil_data['tgl_berlaku_sampai'];
                    $id_inventaris = $ambil_data['id_inventaris'];
                    $id_status = $ambil_data['id_status'];

                ?>

                <form action="?page=user/edit_proBarang.php" method="POST">
                <input type="hidden" name="id" value="<?= $id_barang ?>">

                <input type="text" name="nama_barang" value="<?= $nama_barang ?>" placeholder="Nama Barang"><br>
                <input type="text" name="qty_barang" value="<?= $qty_barang ?>" placeholder="Enter your Password"><br>
                <input type="text" name="satuan" value="<?= $satuan ?>" placeholder="Enter your text"><br>
                <input type="text" name="deskripsi" value="<?= $deskripsi ?>" placeholder="Enter your Password"><br>
                <input type="date" name="tgl_berlaku_sampai" value="<?= $tgl_berlaku_sampai ?>" placeholder="Enter your Password"><br>
                <input type="text" name="id_inventaris" value="<?= $id_inventaris ?>" placeholder="Enter your Password" readonly><br>
                <input type="text" name="id_status" value="<?= $id_status ?>" placeholder="Enter your Password" readonly><br>

                <input type="submit" class="btn btn-success" value="Simpan Data"><br>
            </form>
        </div>
    </div>
</div>