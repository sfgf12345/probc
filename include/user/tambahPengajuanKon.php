<?php include 'include/config.php';?>

<div class="col-md-6">
    <!-- DataTables Example -->
    <div class="card shadow mb-4 ml-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pengajuan Kontraktor</h6>
        </div>
        <div class="card-body">
            <form action="?page=user/prosesPengajuanKon.php" method="POST">
                &nbsp;<b for="validationCustom01">Nama Perusahaan</b><input type="text" name="nama_perusahaan" class="form-control" id="validationCustom01" required placeholder="Nama perusahaan yang akan mengajukan permohonan SIO" style="margin-bottom: 10px;">
                <b></b><input type="hidden" name="jenis_vendor" class="form-control" value="Kontraktor" readonly style="margin-bottom: 10px;">
                <!-- <div class="jenis_vendor mb-3">
                &nbsp;<b>Jenis Vendor</b>
                    <br>
                    <select class="form-control" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">Kontraktor</option>
                        <option value="2">Subkontraktor</option>
                    </select>
                </div> -->


                &nbsp;<b>Departement In Charge / Nama Kontraktor</b><input type="text" name="dic" class="form-control" required placeholder="Nama Departement In Charge / Kontraktor yang akan menggunakan jasa" style="margin-bottom: 10px;">
                &nbsp;<b>No Pengajuan SAP</b><input type="text" name="no_pengajuan_sap" class="form-control" required placeholder="Nomor dari pengajuan di SAP"  requiredstyle="margin-bottom: 10px;">
                &nbsp;<b></b><input type="hidden" class="form-control mb-3" name="pengajuan_dibuat" placeholder="Tanggal Pengajuan Dibuat" readonly value="<?php echo date("Y-m-d\TH:i:s",time()); ?>"/>

                &nbsp;<b></b><input type="hidden" name="status_pengajuan" class="form-control" value="diminta" readonly style="margin-bottom: 10px;">
                <br>
                <input type="submit" class="btn btn-success" value="Kirim"><br>
            </form>
        </div>
    </div>
</div>