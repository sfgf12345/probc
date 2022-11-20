<?php

    include 'include/config.php';

    $namaBarang = $_POST['nama_barang'];
    $jumlahBarang = $_POST['qty_barang'];
    $satuanBarang = $_POST['satuan'];
    $deskripsiBarang = $_POST['deskripsi'];
    $tanggalBerlaku = $_POST['tgl_berlaku_sampai'];
    $idInventaris = $_POST['id_inventaris'];
    $idStatus = $_POST['id_status'];

    if($namaBarang != ""){
    
    mysqli_query($db_konek, "INSERT INTO barang(nama_barang, qty_barang, satuan, deskripsi,
     tgl_berlaku_sampai, id_inventaris, id_status) VALUES('$namaBarang', '$jumlahBarang', '$satuanBarang',
        '$deskripsiBarang', '$tanggalBerlaku' , '$idInventaris', '$idStatus')");

    echo "
    <script type='text/javascript'>
        alert('Tambah data berhasil');
        window.location.href = '?page=user/barang.php';
    </script>
 " ;
    }else {
        echo "
            <script type='text/javascript'>
                alert('Isi form dengan benar');
                window.location.href = '?page=user/tambahBarang.php';
            </script>
        ";
    }

?>