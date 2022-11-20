<?php
include 'include/config.php';


$id = $_GET['id'];
$sql =mysqli_query($db_konek, "UPDATE pengajuan SET status_pengajuan ='ditolak' WHERE id_pengajuan = '$id'");

echo "
<script type='text/javascript'>
    alert('Berhasil meng-edit data');
    window.location.href = '?page=user/pengajuan.php';
</script>
";

?>