<?php

include 'include/config.php';

$id_user = $_SESSION['id_user'];


$no = 1;
$sql =mysqli_query($db_konek, "SELECT nama_perusahaan FROM pengajuan_kontraktor WHERE id_user='$id_user' UNION SELECT nama_perusahaan FROM pengajuan WHERE id_user='$id_user'");
$ambil_data = mysqli_fetch_array($sql);
    // print_r($ambil_data);
    // exit();
$nama_perusahaan = $ambil_data['nama_perusahaan'];

// pengajuan
$nama_perusahaan = $ambil_data['nama_perusahaan'];

?>

<div class="col-md-8 ml-5">
<div class="media position-relative">
  <div class="media-body">
    <h5 class="mt-0" style="color: black;">Pengajuan Berhasil, Konfirmasi Kiriman Anda!</h5>
    <p>Nama dan foto yang terkait dengan Akun Anda akan direkam saat Anda mengupload file dan mengirim formulir ini. Hanya ID yang Anda masukkan yang dapat menjadi bagian dari respons Anda.</p>
    <a href="#" class="stretched-link" data-toggle="modal" data-target="#exampleModal">Konfirmasi Kiriman Anda!</a>
  </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin ingin mengirim pengajuan?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <form action="https://formsubmit.co/zuhairsyahf@gmail.com" method="POST">
                    
                    <input type="hidden" name="_next" value="http://localhost/probc/?page=user/pengajuanUser.php">

                    <!-- <input type="hidden" name="_autoresponse" value=""> -->

                    <!-- <input type="hidden" name="_cc" value="adm.cm@beraucoal.co.id"> -->
                    <input type="hidden" name="_cc" value="gloriasendy15@gmail.com,zuhairsyahfadhil@gmail.com">

                    <!-- reply-to user's email -->
                    <!-- <input type="email" name="email" placeholder="Email Address"> -->

                    <input type="hidden" name="_subject" value="Pengajuan Baru dari <?= $nama_perusahaan ?>, Harap Cek Dashboard Administrasi Anda!">
                    <button class="btn btn-success" type="submit">Kirim</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    </div>