
<?php

include 'include/config.php';

$tangkap_id = $_GET['id'];

$hapus = mysqli_query($db_konek, "DELETE FROM barang WHERE id_barang='$tangkap_id'");

echo "
    <script type='text/javascript'>
        alert('Hapus Berhasil!');
        window.location.href = '?page=user/barang.php';
    </script>
";
?>