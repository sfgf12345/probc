<?php

    include 'include/config.php';

    $id_user = $_SESSION['id_user'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $jenis_vendor = $_POST['jenis_vendor'];
    $dic = $_POST['dic'];
    $bidang_pekerjaan = $_POST['bidang_pekerjaan'];
    $masa_kontrak = $_POST['masa_kontrak'];


    // mengambil array -> per satuan
    if (isset($_POST['submit'])) {
        $project_site = $_POST['project_site'];
        // var_dump($project_site);
        $source = null;
        foreach ($project_site as $project) {
            $source .= $project . ", ";
        }
        $site = substr($source, 0, -1);
        if (!empty($site)) {
            $sql;
        }
    }

    // $project_site = array('SMO','LMO','GMO','BMO');
    // $string = serialize($project_site);
    $jenis_izin = $_POST['jenis_izin'];
    $no_izin = $_POST['no_izin'];
    $tgl_terbit = $_POST['tgl_terbit'];
    $tgl_berakhir = $_POST['tgl_berakhir'];
    $jenis_kegiatan = $_POST['jenis_kegiatan'];

    $pjo = $_POST['pjo'];
    $kompetensi = $_POST['kompetensi'];
    $jabatan = $_POST['jabatan'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $no_sk = $_POST['no_sk'];
    $tgl_sk = $_POST['tgl_sk'];

    $jenis_pengajuan = $_POST['jenis_pengajuan'];
    $pengajuan_dibuat = $_POST['pengajuan_dibuat'];
    $status_pengajuan = $_POST['status_pengajuan'];

    
    if($nama_perusahaan != ""){

    $sql = mysqli_query($db_konek, "INSERT INTO pengajuan(id_user, nama_perusahaan, jenis_vendor, dic, bidang_pekerjaan, masa_kontrak, project_site, jenis_izin, no_izin, tgl_terbit, tgl_berakhir, jenis_kegiatan, pjo, kompetensi, jabatan, email, no_telp, no_sk, tgl_sk, jenis_pengajuan, pengajuan_dibuat, status_pengajuan) VALUES('$id_user', '$nama_perusahaan','$jenis_vendor', '$dic', '$bidang_pekerjaan', '$masa_kontrak','$source', '$jenis_izin', '$no_izin', '$tgl_terbit', '$tgl_berakhir', '$jenis_kegiatan', '$pjo', '$kompetensi', '$jabatan', '$email', '$no_telp', '$no_sk', '$tgl_sk', '$jenis_pengajuan', '$pengajuan_dibuat', '$status_pengajuan') ");
    // // pengajuan(id_user, nama_pengajuan, qty_pengajuan, tujuan_pengajuan, status_pengajuan) 
    // VALUES( '$id_user', '$nama_pengajuan', '$qty_pengajuan', '$tujuan_pengajuan', 'diminta' )");

    echo "
    <script type='text/javascript'>
        window.location.href = '?page=user/tambahPengajuanSub_Upload.php';
    </script> 
    ";
    }

    
?>