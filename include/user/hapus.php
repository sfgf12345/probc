
<?php

include 'include/config.php';

$tangkap_id = $_GET['id'];

$hapus = mysqli_query($db_konek, "DELETE FROM user WHERE id_user='$tangkap_id'");

echo "
    <script type='text/javascript'>
        alert('Hapus Berhasil!');
        window.location.href = '?page=user/tampil_data.php';
    </script>
";
?>