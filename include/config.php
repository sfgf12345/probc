<!-- KONEKSI KE DALAM DATABASE -->

<?php

$db_konek = mysqli_connect("localhost","root", "", "pro");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>