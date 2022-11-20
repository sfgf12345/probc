<?php include 'include/config.php';?>


                
<div class="col-md-10">
    <!-- DataTables Example -->
    <div class="card shadow mb-4 ml-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pengajuan Subkontraktor</h6>
        </div>
        <div class="card-body">
            <form action="?page=user/prosesPengajuanSub.php" method="POST">
                &nbsp;<b><label for="validationCustom01">Nama Perusahaan</label></b>
                <input type="text" name="nama_perusahaan" class="form-control" id="validationCustom01" required  placeholder="Nama perusahaan yang akan mengajukan permohonan SIO" style="margin-bottom: 10px;">
                <!-- <div class="invalid-feedback">
                    Mohon isi dengan benar!
                </div> -->

                <b></b><input type="hidden" name="jenis_vendor" class="form-control" value="Subkontraktor" readonly style="margin-bottom: 10px;">
                <!-- <div class="jenis_vendor mb-3">
                &nbsp;<b>Jenis Vendor</b>
                    <br>
                    <select class="form-control" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">Kontraktor</option>
                        <option value="2">Subkontraktor</option>
                    </select>
                </div> -->


                &nbsp;<b for="validationCustom02">Departement In Charge / Nama Kontraktor</b><input type="text" name="dic" class="form-control" placeholder="Nama Departement In Charge / Kontraktor yang akan menggunakan jasa" id="validationCustom02" required style="margin-bottom: 10px;">

                &nbsp;<b for="validationCustom03">Bidang Pekerjaan</b><input type="text" name="bidang_pekerjaan" class="form-control" placeholder="Bidang pekerjaan atau bidang usaha yang akan dilakukan
" id="validationCustom03" required style="margin-bottom: 10px;">

                &nbsp;<b for="validationCustom04">Masa Kontrak</b> <input type="date" name="masa_kontrak" class="form-control" placeholder="Masa Kontrak" id="validationCustom04" required style="margin-bottom: 10px;">

                &nbsp;<b>Project Site</b> <br>
                <div class="row mt-1">
                    <div class="prosite col-md-3">
                        &nbsp;&nbsp;<input type="checkbox" name="project_site[]" value="LMO" id="project_site[]"> LMO <br>
                        &nbsp;&nbsp;<input type="checkbox" name="project_site[]" value="BMO" id="project_site[]"> BMO <br>
                    </div>
                    <div class="prosite col-md-3">
                        &nbsp;&nbsp;<input type="checkbox" name="project_site[]" value="SMO" id="project_site[]"> SMO <br>
                        &nbsp;&nbsp;<input type="checkbox" name="project_site[]" value="Gurimbang" id="project_site[]"> Gurimbang <br>
                    </div>
                    <div class="prosite col-md-3">
                        &nbsp;&nbsp;<input type="checkbox" name="project_site[]" value="Transhipment" id="project_site[]"> Transhipment <br>
                        &nbsp;&nbsp;<input type="checkbox" name="project_site[]" value="Head Office" id="project_site[]"> Head Office <br>
                    </div>
                    <div class="prosite col-md-3">
                        &nbsp;&nbsp;<input type="checkbox" name="project_site[]" value="Samburakat" id="project_site[]" 
                        style="margin-bottom: 15px;"> Samburakat <br>
                    </div>
                </div>
                <hr>
                <div class="row perizinan">      
                    <div class="col-md-12 mb-3 text-center">             
                        &nbsp;<b class="font-weight-bold">Perizinan</b>
                    </div>
                    <div class="col-md-4">
                        <div class="jenis_izin mb-3" for="validationCustom06">
                            &nbsp;<b>Jenis Izin</b>
                            <select class="form-control" name="jenis_izin" aria-label="Default select example" id="validationCustom06" required>
                                <option selected>Pilih jenis perizinan</option>
                                <option value="Inti" name="jenis_izin" required>Inti</option>
                                <option value="Non-inti" name="jenis_izin" required>Non-inti</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        &nbsp;<b>Nomor Izin</b><input type="text" name="no_izin" class="form-control" id="validationCustom04" required placeholder="Nomor perizinan" style="margin-bottom: 10px;">
                    </div>
                    <div class="col-md-4">
                        &nbsp;<b>Tanggal terbit</b><input type="date" name="tgl_terbit" class="form-control" id="validationCustom04" required placeholder="" style="margin-bottom: 10px;">
                    </div>
                    <div class="col-md-4">
                        &nbsp;<b>Tanggal Berakhir</b><input type="date" name="tgl_berakhir" class="form-control" id="validationCustom04" required placeholder="" style="margin-bottom: 10px;">
                    </div>
                    <div class="col-md-8">
                        &nbsp;<b>Jenis Kegiatan</b>
                        <!-- <input type="text" name="jenis_kegiatan" class="form-control" id="validationCustom04" required placeholder="Jenis kegiatan" style="margin-bottom: 10px;"> -->
                        <textarea id="w3review" class="form-control" name="jenis_kegiatan" rows="1" cols="72" required placeholder="Jenis kegiatan"></textarea>
                    </div>
                </div>
                <hr>
                <div class="row pjo">      
                    <div class="col-md-12 mb-3 text-center">             
                        &nbsp;<b class="font-weight-bold">Penanggung Jawab Operasi</b>
                    </div>
                    
                    <div class="col-md-4">
                        &nbsp;<b for="validationCustom05">Nama PJO</b><input type="text" name="pjo" class="form-control" id="validationCustom04" required placeholder="Nama penanggung jawab operasi" style="margin-bottom: 10px;">
                    </div>
                    <div class="col-md-4">
                        &nbsp;<b>Kompetensi</b><input type="text" name="kompetensi" class="form-control" id="validationCustom04" required placeholder="Kompetensi PJO" style="margin-bottom: 10px;">
                    </div>
                    <div class="col-md-4">
                        &nbsp;<b>Jabatan</b><input type="text" name="jabatan" class="form-control" id="validationCustom04" required placeholder="Jabatan PJO" style="margin-bottom: 10px;">
                    </div>
                    <div class="col-md-4">
                        &nbsp;<b>Email</b><input type="email" name="email" class="form-control" id="validationCustom04" required placeholder="Email PJO" style="margin-bottom: 10px;">
                    </div>
                    <div class="col-md-4">
                        &nbsp;<b>No Telepon</b><input type="text" name="no_telp" class="form-control" id="validationCustom04" required placeholder="Nomor Telepon PJO" style="margin-bottom: 10px;">
                    </div>
                    <div class="col-md-4">
                        &nbsp;<b>No SK dari KTT</b><input type="text" name="no_sk" class="form-control" id="validationCustom04" required placeholder="Nomor SK dari KTT" style="margin-bottom: 10px;">
                    </div>
                    <div class="col-md-4">
                        &nbsp;<b>Tanggal Terbit SK</b><input type="date" name="tgl_sk" class="form-control" id="validationCustom04" required placeholder="" style="margin-bottom: 10px;">
                    </div>
                </div>
                <hr>
                <div class="jenis_pengajuan mb-3" for="validationCustom06">
                &nbsp;<b>Jenis Pengajuan</b>
                    <br>
                    <select class="form-control" name="jenis_pengajuan" aria-label="Default select example" id="validationCustom06" required>
                        <option selected>Pilih jenis pengajuan</option>
                        <option value="Pengajuan Baru" name="jenis_pengajuan" required>Pengajuan Baru</option>
                        <option value="Perpanjangan" name="jenis_pengajuan" required>Perpanjangan</option>
                        <option value="Penggantian PJO" name="jenis_pengajuan" required>Penggantian PJO</option>
                    </select>
                </div>
                <b></b><input type="hidden" class="form-control mb-3" readonly name="pengajuan_dibuat" placeholder="Tanggal Pengajuan Dibuat" value="<?php echo date("Y-m-d\TH:i:s",time()); ?>"/>

                <b></b><input type="hidden" name="status_pengajuan" class="form-control" value="diminta" readonly style="margin-bottom: 10px;">
            
                <input type="submit" name="submit" class="btn btn-success" value="Berikutnya"><br>
            </form>
                <!-- <div class="project-site" required>
                </div> -->
                <!-- &nbsp;<b> Jenis Pengajuan</b><input type="text" name="jenis_pengajuan" class="form-control" placeholder="" style="margin-bottom: 10px;"> -->
        </div>
    </div>
</div>

<!-- <div class="col-md-6">
    <div class="card shadow mb-4 mr-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Keterangan Project Site</h6>
        </div>
        <div class="card-body">
        </div>
    </div>
</div> -->