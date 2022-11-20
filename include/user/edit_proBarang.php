<?php

    include 'include/config.php';

    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $qty_barang = $_POST['qty_barang'];
    $satuan = $_POST['satuan'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_berlaku_sampai = $_POST['tgl_berlaku_sampai'];
    $id_inventaris = $_POST['id_inventaris'];
    $id_status = $_POST['id_status'];
    
    if ($nama_barang != "") {
    $sql =mysqli_query($db_konek, "UPDATE barang SET nama_barang='$nama_barang', qty_barang='$qty_barang', satuan = '$satuan', 
        deskripsi = '$deskripsi', tgl_berlaku_sampai = '$tgl_berlaku_sampai', id_inventaris = '$id_inventaris',
        id_status = '$id_status' WHERE id_barang = '$id'");

        echo "
            <script type='text/javascript'>
                alert('Berhasil meng-edit data');
                window.location.href = '?page=user/barang.php';
            </script>
        ";
    } else {
        echo "
        <script type='text/javascript'>
            alert('Isi form dengan benar');
            window.location.href = '?page=user/editBarang.php&id=$id';
        </script>
        ";
     }

?>