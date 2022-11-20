<div class="col-md-12">
    <div class="container-fluid">
        <div class="col">
            <h5 style="color: #0F0E0E;">Data Pengajuan</h5>
            <hr>
        </div>
        <br>
    </div>
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Kontraktor</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Departement In Charge / Nama Kontraktor</th>
                        <th>No. Pengajuan SAP</th>

                        <th>Status Pengajuan</th>
                        <th>Pengajuan Dibuat</th>
                        <th>Aksi</th>
                    
                    </tr>

                    <?php

                        include 'include/config.php';

                        $no = 1;
                        $sql = mysqli_query($db_konek, "SELECT * FROM pengajuan_kontraktor");

                        while ($ambil_data = mysqli_fetch_array($sql)) {    //(while untuk pengulangan) fetch_array = mengubah data objek ke dalam data array sehingga data yg diambil dari table database bisa ditampilkan 1 per 1
                            // print_r($ambil_data);
                            // exit();
                        $id_kontraktor = $ambil_data['id_kontraktor'];       
                        $id_user = $ambil_data['id_user'];

                        $nama_perusahaan = $ambil_data['nama_perusahaan'];
                        $jenis_vendor = $ambil_data['jenis_vendor'];
                        $dic = $ambil_data['dic'];
                        $no_pengajuan_sap = $ambil_data['no_pengajuan_sap'];
                        $pengajuan_dibuat = $ambil_data['pengajuan_dibuat'];
                        $status_pengajuan = $ambil_data['status_pengajuan'];
                        

                    ?>
                       <?php if($status_pengajuan == 'diminta'):?>

                    <tr>
                    
                        <td><?= $no++ ?></td>

                        <td><?= $nama_perusahaan ?></td>
                        <td><?= $dic ?></td>
                        <td><?= $no_pengajuan_sap ?></td>
                        <td><?= $status_pengajuan ?></td>
                        <td><?= $pengajuan_dibuat ?></td>
                        <td style="text-align: center;">
                            <?php
                            if($status_pengajuan == 'diminta'): ?>
                                
                                <a href= "?page=user/terimaKon.php&id=<?=$id_kontraktor?>" class="btn btn-success" style="width: 80px;">Terima </a>
                                <a onclick = "return confirm('Anda yakin ingin menolak pengajuan ini?')" href="?page=user/tolakKon.php&id=<?=$id_kontraktor?> " class="btn btn-danger" style="width: 80px;"> Tolak</a>
                                
                                <?php
                                    endif;
                                ?>
                            
                        </td>
                    </tr>
                    <?php endif;?> 


                        <?php 
                            }      // penutup while, kenapa pake php baru biar tabel diatas gak susah bikinnya
                        ?>

                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Subkontraktor</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Departement In Charge / Nama Kontraktor</th>
                        <th>Bidang Pekerjaan</th>
                        <th>Masa Kontrak
                        </th>
                        <th>Project Site</th>
                        <th>Nama Penanggungjawab</th>
                        <th>Jenis Pengajuan</th>
                        
                        <th>Jenis Izin</th>
                        <th>No Izin</th>
                        <th>Tanggal Terbit</th>
                        <th>Tanggal Berakhir</th>
                        <th>Jenis Kegiatan</th>

                        <th>Kompetensi</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>No SK</th>
                        <th>Tanggal SK</th>
                        <th>IUJP</th>
                        <th>Surat Pengesahan</th>
                        <th>Rencana K3L</th>
                        <th>Dokumen Kontrak</th>
                        <th>Hasil Evaluasi</th>
                        <th>Simak K3L</th>



                        <th>Status Pengajuan</th>
                        <th>Pengajuan Dibuat</th>
                        <th>Aksi</th>
                    
                    </tr>

                    <?php

                        include 'include/config.php';

                        $no = 1;
                        $sql =mysqli_query($db_konek, "SELECT * FROM  upload INNER JOIN pengajuan ON upload.id_user=pengajuan.id_user");

                        while ($ambil_data = mysqli_fetch_array($sql)) {    //(while untuk pengulangan) fetch_array = mengubah data objek ke dalam data array sehingga data yg diambil dari table database bisa ditampilkan 1 per 1
                            // print_r($ambil_data);
                            // exit();
                            $id_pengajuan = $ambil_data['id_pengajuan'];       
                            $id_upload = $ambil_data['id_upload'];       
                            $idUser = $ambil_data['id_user'];
    
                            $nama_perusahaan = $ambil_data['nama_perusahaan'];
                            $jenis_vendor = $ambil_data['jenis_vendor'];
                            $dic = $ambil_data['dic'];
                            $bidang_pekerjaan = $ambil_data['bidang_pekerjaan'];
                            $masa_kontrak = $ambil_data['masa_kontrak'];
                            $values = $ambil_data['project_site'];
                            if (is_array($values) || is_object($values))
                            {
                                foreach ($values as $value)
                                {
                                }
                            }                        
                            $jenis_izin = $ambil_data['jenis_izin'];
                            $no_izin = $ambil_data['no_izin'];
                            $tgl_terbit = $ambil_data['tgl_terbit'];
                            $tgl_berakhir = $ambil_data['tgl_berakhir'];
                            $jenis_kegiatan = $ambil_data['jenis_kegiatan'];
    
                            $pjo = $ambil_data['pjo'];
                            $kompetensi = $ambil_data['kompetensi'];
                            $jabatan = $ambil_data['jabatan'];
                            $email = $ambil_data['email'];
                            $no_telp = $ambil_data['no_telp'];
                            $no_sk = $ambil_data['no_sk'];
                            $tgl_sk = $ambil_data['tgl_sk'];
                            
                                $iujp = $ambil_data['iujp'];
                                $surat_pengesahan = $ambil_data['surat_pengesahan'];
                                $rencana_k3l = $ambil_data['rencana_k3l'];
                                $dokumen_kontrak = $ambil_data['dokumen_kontrak'];
                                $hasil_evaluasi = $ambil_data['hasil_evaluasi'];
                                $simak_k3l = $ambil_data['simak_k3l'];
    
                            $jenis_pengajuan = $ambil_data['jenis_pengajuan'];
                            $pengajuan_dibuat = $ambil_data['pengajuan_dibuat'];
    
                            $statusPengajuan = $ambil_data['status_pengajuan'];

                    ?>
                       <?php if($statusPengajuan == 'diminta'):?>

                    <tr>
                    
                    <td><?= $no++ ?></td>
                        
                        <td><?= $nama_perusahaan ?></td>
                        <td><?= $dic ?></td>
                        <td><?= $bidang_pekerjaan ?></td>
                        <td><?= $masa_kontrak ?></td>
                        <td><?= $values ?></td>
                        <td><?= $pjo ?></td>
                        <td><?= $jenis_pengajuan ?></td>

                        <td><?= $jenis_izin ?></td>
                        <td><?= $no_izin ?></td>
                        <td><?= $tgl_terbit ?></td>
                        <td><?= $tgl_berakhir ?></td>
                        <td><?= $jenis_kegiatan ?></td>

                        <td><?= $kompetensi ?></td>
                        <td><?= $jabatan ?></td>
                        <td><?= $email ?></td>
                        <td><?= $no_telp ?></td>
                        <td><?= $no_sk ?></td>
                        <td><?= $tgl_sk ?></td>
                        <td>
                            <a href="<?php echo $ambil_data['iujp']; ?>" download><?= $iujp ?>
                        </td>
                        <td>
                            <a href="uploads/<?php echo $ambil_data['surat_pengesahan']; ?>" download><?= $surat_pengesahan ?>
                        </td>
                        <td>
                            <a href="uploads/<?php echo $ambil_data['rencana_k3l']; ?>" download><?= $rencana_k3l ?>
                        </td>
                        <td>
                            <a href="uploads/<?php echo $ambil_data['dokumen_kontrak']; ?>" download><?= $dokumen_kontrak ?>
                        </td>
                        <td>
                            <a href="uploads/<?php echo $ambil_data['hasil_evaluasi']; ?>" download><?= $hasil_evaluasi ?>
                        </td>
                        <td>
                            <a href="uploads/<?php echo $ambil_data['simak_k3l']; ?>" download><?= $simak_k3l ?>
                        </td>



                        <td><?= $status_pengajuan ?></td>
                        <td><?= $pengajuan_dibuat ?></td>
                        <td style="text-align: center;">
                            <?php
                            if($status_pengajuan == 'diminta'): ?>
                                
                                <a href= "?page=user/terima.php&id=<?=$id_pengajuan?>" class="btn btn-success" style="width: 80px;">Terima </a>
                                <a onclick = "return confirm('Anda yakin ingin menolak pengajuan ini?')" href="?page=user/tolak.php&id=<?=$id_pengajuan?> " class="btn btn-danger" style="width: 80px;"> Tolak</a>
                                
                                <?php
                                    endif;
                                ?>
                            
                        </td>
                    </tr>
                    <?php endif;?> 

                        <?php 
                            }      // penutup while, kenapa pake php baru biar tabel diatas gak susah bikinnya
                        ?>

                </table>
            </div>
        </div>
    </div>
</div>

     <!-- pada baris ke 40-43 tanda tanya nya  untuk mencetak data di dlm browser, sama dengan echo -->