<?php include 'include/config.php';?>

<div class="ml-5 mb-5">
    <h5 style="color: black;"> Upload File Persyaratan</h5> <hr>
    <form action="?page=user/upload.php" method="post" enctype="multipart/form-data">
        &nbsp;<b>Izin Usaha Jasa Pertambangan (IUJP) atau Izin yang Diterbitkan Oleh Instansi Terkait</b>
        <div class="input-group mb-3">
            <div class="custom-file">
                &nbsp;<input type="file" name="iujp">
            </div>
        </div>
        &nbsp;<b>Surat Pengesahan PJO dari KTT PT BC</b>
        <div class="input-group mb-3">
            <div class="custom-file">
                &nbsp;<input type="file" name="surat_pengesahan">
            </div>
        </div>
        &nbsp;<b>Rencana K3L Tersusun dan Ditandatangani</b>
        <div class="input-group mb-3">
            <div class="custom-file">
                &nbsp;<input type="file" name="rencana_k3l" id="inputGroupFile01">
            </div>
        </div>
        &nbsp;<b>Dokumen Kontrak / Purchase Order dari Pemberi Kerja</b>
        <div class="input-group mb-3">
            <div class="custom-file">
                &nbsp;<input type="file" name="dokumen_kontrak" id="inputGroupFile01">
            </div>
        </div>
        &nbsp;<b>Hasil Evaluasi Kinerja Kontrak / Subkontraktor </b>(Untuk Perpanjangan SIO)
        <div class="input-group mb-3">
            <div class="custom-file">
                &nbsp;<input type="file" name="hasil_evaluasi" id="inputGroupFile01">
            </div>
        </div>
        &nbsp;<b>Summary Pelaksanaan SIMAK K3L</b> (Untuk Perpanjangan SIO)
        <div class="input-group mb-3">
            <div class="custom-file">
                &nbsp;<input type="file" name="simak_k3l" id="inputGroupFile01">
            </div>
        </div>
        &nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Upload" class="btn btn-success"/>
        <?php if(isset($_GET['st'])) { ?>
                    <div class="alert alert-danger text-center">
                    <?php if ($_GET['st'] == 'success') {
                            echo "File Uploaded Successfully!";
                        }
                        else
                        {
                            echo 'Invalid File Extension!';
                        } ?>
                    </div>
                <?php } ?>
    </form>
</div>