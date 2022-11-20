<?php

    include 'include/config.php';

    $user = $_POST['user'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    if ($user != "" && $pass != "") {

        $sql = mysqli_query($db_konek, "INSERT INTO user(nama, username, password) VALUES('$user', '$username', '$pass')");

        echo "
            <script type='text/javascript'>
                alert('Tambah data berhasil');
                window.location.href = '?page=user/tampil_data.php';
            </script>
         ";
    } else {
        echo "
            <script type='text/javascript'>
                alert('Isi form dengan benar');
                window.location.href = '?page=user/form.php';
            </script>
        ";
    }

?>