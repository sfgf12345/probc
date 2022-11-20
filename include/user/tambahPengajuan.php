<?php include 'include/config.php';?>

<div class="col-md-6">
    <!-- DataTables Example -->
    <div class="card shadow mb-4 ml-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pengajuan</h6>
        </div>
        <div class="card-body">
            <form action="?page=user/prosesPengajuan.php" method="POST">
                <!-- &nbsp;No Surat Izin Operasi<input type="text" name="no_sio" class="form-control" placeholder="" style="margin-bottom: 10px;"> -->
                &nbsp;No SIO<input type="text" name="no_sio" class="form-control" placeholder="" style="margin-bottom: 10px;">
                <!-- <select class="form-select" aria-label="Default select example" name="jenis_vendor">
                    <option selected>Jenis Vendor</option>
                    <option value="1">Kontraktor</option>
                    <option value="2">Sub Kontraktor</option>
                </select> -->
                &nbsp;Masa Berlaku SIO<input type="date" name="masa_berlaku_sio" class="form-control" placeholder="" style="margin-bottom: 10px;">
                &nbsp;No PO<input type="text" name="no_po" class="form-control" placeholder="" style="margin-bottom: 10px;">
                &nbsp;Jenis Vendor<input type="text" name="jenis_vendor" class="form-control" placeholder="" style="margin-bottom: 10px;">
                &nbsp;No RK3L<input type="text" name="no_rk3l" class="form-control" placeholder="" style="margin-bottom: 10px;">
                &nbsp;Kegiatan<input type="text" name="kegiatan" class="form-control" placeholder="" style="margin-bottom: 10px;">
                &nbsp;Jenis Perizinan<input type="text" name="jenis_perizinan" class="form-control" placeholder="" style="margin-bottom: 10px;">
                &nbsp;No Perizinan<input type="text" name="no_perizinan" class="form-control" placeholder="" style="margin-bottom: 10px;">
                &nbsp;Tanggal Terbit<input type="date" name="tgl_terbit" class="form-control" placeholder="" style="margin-bottom: 10px;">
                &nbsp;Tanggal Berakhir<input type="date" name="tgl_berakhir" class="form-control" placeholder="" style="margin-bottom: 10px;">
                &nbsp;Nama PJO<input type="text" name="nama_pjo" class="form-control" placeholder="" style="margin-bottom: 10px;">
                &nbsp;Kompetensi<input type="text" name="kompetensi" class="form-control" placeholder="" style="margin-bottom: 10px;">
                &nbsp;Jabatan<input type="text" name="jabatan" class="form-control" placeholder="" style="margin-bottom: 10px;">
                &nbsp;Email<input type="text" name="email" class="form-control" placeholder="" style="margin-bottom: 10px;">
                &nbsp;Kontak<input type="text" name="no_kontak" class="form-control" placeholder="" style="margin-bottom: 10px;">
                &nbsp;SK PJO dari KTT
                <div class="input-group mb-3">
                    <input type="file" name="sk_pjo_dari_ktt" class="form-control" id="inputGroupFile02">
                </div>
                &nbsp;Tanggal Terbit SK<input type="date" name="tgl_terbit_sk" class="form-control" placeholder="" style="margin-bottom: 10px;">
                
                

                
                <input type="submit" class="btn btn-success" value="Simpan Data"><br>
            </form>
        </div>
    </div>
</div>