<?php include 'include/config.php';?>

<div class="col-md-6">
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Barang</h6>
        </div>
        <div class="card-body">
            <form action="?page=user/prosesBarang.php" method="POST">
                <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang"><br>
                <input type="text" name="qty_barang" class="form-control" placeholder="Masukkan Jumlah Barang"><br>
                <input type="text" name="satuan" class="form-control" placeholder="Satuan"><br>
                <input type="text" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi Barang"><br>
                <input type="date" name="tgl_berlaku_sampai" class="form-control" placeholder="Tanggal Berlaku"><br>
                <?php
                    $sql = mysqli_query($db_konek, "SELECT  id_inventaris FROM inventaris");
                ?>
                <select name="id_inventaris" id="">
                    <option value="id_inventaris">Tempat Penyimpanan</option>
                    <?php if (mysqli_num_rows($sql) > 0 ) ?>
                        <?php while($ambil_data = mysqli_fetch_array($sql)){?>
                            <option><?php echo $ambil_data['id_inventaris']?></option>
                            <?php } ?>
                        
                    
                </select>
                <br>
                <br>
                <?php
                    $sql = mysqli_query($db_konek, "SELECT  id_status FROM status");
                ?>
                <select name="id_status" id="">
                    <option value="id_status">Status Barang</option>
                    <?php if (mysqli_num_rows($sql) > 0 ) ?>
                        <?php while($ambil_data = mysqli_fetch_array($sql)){?>
                            <option><?php echo $ambil_data['id_status']?></option>
                            <?php } ?>
                        
                    
                </select><br><br>
                <input type="submit" class="btn btn-success" value="Simpan Data"><br>
            </form>
        </div>
    </div>
</div>