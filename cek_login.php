<?php
    session_start();
    include 'include/config.php';

    // VALIDASI PADA METHOD FORM
    if($_POST) {

        $user = $_POST['username'];
        $pass = $_POST['password'];
        $nama = $_POST['nama'];


        // VALIDASI PADA INPUT
        if ($user != "" and $pass != "") {

            $sql = mysqli_query($db_konek, "SELECT * FROM user WHERE username='$user' and password='$pass'");

            $cek_baris = mysqli_num_rows($sql);

            // KONDISI UNTUK VALIDASI BARIS
            if ($cek_baris == TRUE) {

                $ambil_data = mysqli_fetch_array($sql);
                $id_user = $ambil_data['id_user'];
                $user = $ambil_data['username'];

                // CARA MENYIMPAN VARIABLE KEDALAM SESION
                $_SESSION['id_user'] = $id_user;
                $_SESSION['username'] = $user;
                $_SESSION['nama'] = $nama;


                //KONDISI UNTUK VALIDASI STATUS PADA USER
                // if ($id_user == 1) {
                    header('Location: index.php');  //Cara 1 pakai location:
                // }else {
                //     echo "
                //         <script type='text/javascript'>
                //             alert('Status anda belum terdaftar');
                //             window.location.href  ='login.php'; 
                //         </script>
                //     ";
                // }

            } else {
                echo "  
                <script type='text/javascript'>
                    alert('LOGIN GAGAL');
                    window.location.href = 'login.php';
                </script>
                ";
            }
        } else {
            echo "  
            <script type='text/javascript'>
                alert('LOGIN GAGAL');
                window.location.href = 'login.php';
            </script>
            ";
        }
    } 

?>