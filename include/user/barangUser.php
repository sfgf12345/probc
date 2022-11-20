<div class="col-md-12">
    <h3>Halaman User</h3>
    <br>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Satuan</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Berlaku</th>
                        <th>inventaris</th>
                        <th>status</th>
                    
                    </tr>

                    <?php

                        include 'include/config.php';

                        $no = 1;
                        $sql = mysqli_query($db_konek, "SELECT  id_barang, nama_barang, qty_barang, satuan, deskripsi,
                        tgl_berlaku_sampai, inventaris.id_inventaris, inventaris.tempat, status.id_status, status.status 
                        FROM barang JOIN inventaris ON barang.id_inventaris = inventaris.id_inventaris JOIN status 
                        ON barang.id_status = status.id_status");

                        while ($ambil_data = mysqli_fetch_array($sql)) {    //(while untuk pengulangan) fetch_array = mengubah data objek ke dalam data array sehingga data yg diambil dari table database bisa ditampilkan 1 per 1
                            // print_r($ambil_data);
                            // exit();
                        $id_barang = $ambil_data['id_barang'];       
                        $namaBarang = $ambil_data['nama_barang'];
                        $jumlahBarang = $ambil_data['qty_barang'];
                        $satuan = $ambil_data['satuan'];
                        $deskripsiBarang = $ambil_data['deskripsi'];
                        $tglberlaku = $ambil_data['tgl_berlaku_sampai'];
                        $inventarisBarang = $ambil_data['id_inventaris'];
                        $statusBarang = $ambil_data['id_status'];

                    ?>

                    <tr>
                    
                        <td><?= $no++ ?></td>
                        <td><?= $namaBarang ?></td>
                        <td><?= $jumlahBarang ?></td>
                        <td><?= $satuan ?></td>
                        <td><?= $deskripsiBarang ?></td>
                        <td><?= $tglberlaku ?></td>
                        <td><?= $inventarisBarang ?></td>
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