<?php

    include 'include/config.php';

    $id_user = $_SESSION['id_user'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $jenis_vendor = $_POST['jenis_vendor'];
    $dic = $_POST['dic'];
    $no_pengajuan_sap = $_POST['no_pengajuan_sap'];
    $pengajuan_dibuat = $_POST['pengajuan_dibuat'];
    $status_pengajuan = $_POST['status_pengajuan'];


    if($nama_perusahaan != ""){

    $sql = mysqli_query($db_konek, "INSERT INTO pengajuan_kontraktor(id_user, nama_perusahaan, jenis_vendor, dic, no_pengajuan_sap, pengajuan_dibuat, status_pengajuan) VALUES('$id_user', '$nama_perusahaan', '$jenis_vendor', '$dic', '$no_pengajuan_sap', '$pengajuan_dibuat', '$status_pengajuan') ");
    // // pengajuan(id_user, nama_pengajuan, qty_pengajuan, tujuan_pengajuan, status_pengajuan) 
    // VALUES( '$id_user', '$nama_pengajuan', '$qty_pengajuan', '$tujuan_pengajuan', 'diminta' )");

    echo "
    <script type='text/javascript'>
        window.location.href = '?page=user/notif_send.php';
    </script>
    " ;
    }

?>