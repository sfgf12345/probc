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
                        <th>No</th>
                        <th>Nomor SIO</th>
                        <th>Masa Berlaku SIO</th>
                        <th>Nomor PO</th>
                        <th>Jenis Vendor
                        </th>
                        <th>Nomor RK3L</th>
                        <th>Kegiatan</th>
                        <th>Jenis Perizinan</th>
                        <th>Nomor Perizinan</th>
                        <th>Tanggal Terbit</th>
                        <th>Tanggal Berakhir</th>
                        <th>Nama PJO</th>
                        <th>Kompetensi</th>
                        <th>Jabatan (Sesuai SO Perusahaan)</th>
                        <th>Alamat Email</th>
                        <th>No Kontak</th>
                        <th>SK PJO dari KTT</th>
                        <th>Tanggal Terbit SK</th>
                        <th>Aksi</th>
                    
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
                        $id_permohonan = $ambil_data['id_permohonan'];       

                        $no_sio = $ambil_data['no_sio'];
                        $masa_berlaku_sio = $ambil_data['masa_berlaku_sio'];
                        $no_po = $ambil_data['no_po'];
                        $jenis_vendor = $ambil_data['jenis_vendor'];
                        $no_rk3l = $ambil_data['no_rk3l'];
                        $kegiatan = $ambil_data['kegiatan'];
                        $jenis_perizinan = $ambil_data['jenis_perizinan'];
                        $no_perizinan = $ambil_data['no_perizinan'];
                        $tgl_terbit = $ambil_data['tgl_terbit'];
                        $tgl_berakhir = $ambil_data['tgl_berakhir'];
                        $nama_pjo = $ambil_data['nama_pjo'];
                        $kompetensi = $ambil_data['kompetensi'];
                        $jabatan = $ambil_data['jabatan'];
                        $email = $ambil_data['email'];
                        $no_kontak = $ambil_data['no_kontak'];
                        $sk_pjo_dari_ktt = $ambil_data['sk_pjo_dari_ktt'];
                        $tgl_terbit_sk = $ambil_data['tgl_terbit_sk'];

                        $statusPengajuan = $ambil_data['status_pengajuan'];
                    ?>

                    <tr>
                    
                        <td><?= $no++ ?></td>
                        <td><?= $idUser ?></td>

                        <td><?= $no_sio ?></td>
                        <td><?= $masa_berlaku_sio ?></td>
                        <td><?= $no_po ?></td>
                        <td><?= $jenis_vendor ?></td>
                        <td><?= $no_rk3l ?></td>
                        <td><?= $kegiatan ?></td>
                        <td><?= $jenis_perizinan ?></td>
                        <td><?= $no_perizinan ?></td>
                        <td><?= $tgl_terbit ?></td>
                        <td><?= $tgl_berakhir ?></td>
                        <td><?= $nama_pjo ?></td>
                        <td><?= $kompetensi ?></td>
                        <td><?= $jabatan ?></td>
                        <td><?= $email ?></td>
                        <td><?= $no_kontak ?></td>
                        <td><?= $sk_pjo_dari_ktt ?></td>
                        <td><?= $tgl_terbit_sk ?></td>

                        <td><?= $statusBarang ?></td>
                        <td>
                            <a href="?page=user/editBarang.php&id=<?=$id_barang?>" class="btn btn-warning">Edit </a>
                            <a onclick = "return confirm('Anda yakin ingin menghapus data ini?')" href="?page=user/hapusBarang.php&id=<?= $id_barang ?>" class="btn btn-danger"> Delete</a>
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