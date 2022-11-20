<?php

    include 'include/config.php';

    $id_user = $_SESSION['id_user'];
    $no_sio = $_POST['$no_sio'];
    $masa_berlaku_sio = $_POST['masa_berlaku_sio'];
    $no_po = $_POST['no_po'];
    $jenis_vendor = $_POST['jenis_vendor'];
    $no_rk3l = $_POST['no_rk3l'];
    $kegiatan = $_POST['kegiatan'];
    $jenis_perizinan = $_POST['jenis_perizinan'];
    $no_perizinan = $_POST['no_perizinan'];
    $tgl_terbit = $_POST['tgl_terbit'];
    $tgl_berakhir = $_POST['tgl_berakhir'];
    $nama_pjo = $_POST['nama_pjo'];
    $kompetensi = $_POST['kompetensi'];
    $jabatan = $_POST['jabatan'];
    $email = $_POST['email'];
    $no_kontak = $_POST['no_kontak'];
    $sk_pjo_dari_ktt = $_POST['sk_pjo_dari_ktt'];
    $tgl_terbit_sk = $_POST['tgl_terbit_sk'];

    

    if($no_sio != " "){
    
    $sql = mysqli_query($db_konek, "CALL mengajukan_pengajuan('', '$id_user', '$no_sio', '$masa_berlaku_sio', '$no_po', '$jenis_vendor', '$no_rk3l', '$kegiatan', '$jenis_perizinan', '$no_perizinan', '$tgl_terbit', '$tgl_berakhir', '$nama_pjo', '$kompetensi', '$jabatan', '$email', '$no_kontak', '$sk_pjo_dari_ktt', '$tgl_terbit_sk', 'diminta' ) ");
    // // pengajuan(id_user, nama_pengajuan, qty_pengajuan, tujuan_pengajuan, status_pengajuan) 
    // VALUES( '$id_user', '$nama_pengajuan', '$qty_pengajuan', '$tujuan_pengajuan', 'diminta' )");

    echo "
    <script type='text/javascript'>
        alert('Tambah data berhasil');
        window.location.href = '?page=user/pengajuanUser.php';
    </script>
    " ;
    }else {
        echo "
            <script type='text/javascript'>
                alert('Isi form dengan benar');
                window.location.href = '?page=user/tambahPengajuan.php';
            </script>
        ";
    }

?>