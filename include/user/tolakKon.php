<?php
include 'include/config.php';


$id = $_GET['id'];
$sql =mysqli_query($db_konek, "UPDATE pengajuan_kontraktor SET status_pengajuan ='ditolak' WHERE id_kontraktor = '$id'");

echo "
<script type='text/javascript'>
    alert('Berhasil meng-edit data');
    window.location.href = '?page=user/pengajuan.php';
</script>
";

?>