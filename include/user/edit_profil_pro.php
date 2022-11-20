<?php

    include 'include/config.php';

    $id = $_POST['id'];
    $user = $_POST['user'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
	$password_confirmation = $_POST['password_confirmation'];

    if($pass != $password_confirmation){
        $_SESSION['error'] = 'Password yang anda masukkan tidak sama dengan password confirmation.';
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['username'] = $_POST['username'];
    }

    if ($user != "" && $username != "" && $pass != "" && $password_confirmation != "") {

        $sql = mysqli_query($db_konek, "UPDATE user SET nama='$user',
        username='$username',
        password='$pass' WHERE id_user='$id'");

        echo "
            <script type='text/javascript'>
                alert('Berhasil meng-edit data');
                window.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
        <script type='text/javascript'>
            alert('Isi form dengan benar');
            window.location.href = '?page=user/edit_profil.php&id=$id';
        </script>
        ";
    }

?>  