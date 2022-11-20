<div class="col-md-6">
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
        </div>
        <div class="card-body">
            <?php

                    include 'include/config.php';

                    $no = 1;
                    $sql =mysqli_query($db_konek, "SELECT * FROM user WHERE id_user='$id_user'");
                    $ambil_data = mysqli_fetch_array($sql);
                        // print_r($ambil_data);
                        // exit();
                    $id_user = $ambil_data['id_user'];
                    $nama = $ambil_data['nama'];
                    $username = $ambil_data['username'];
                    $password_user = $ambil_data['password'];

                ?>

            <form action="?page=user/edit_profil_pro.php" method="POST">
                <input type="hidden" name="id" value="<?= $id_user ?>">
                &nbsp;<span>Nama</span><input type="text" name="user" value="<?= $nama ?>" class="form-control" placeholder="Enter name"><br>
                &nbsp;<span>Username</span><input type="text" name="username" value="<?= $username ?>" class="form-control" placeholder="Enter username"><br>
                &nbsp;<span>Password</span><input type="password" name="pass" value="<?= $password_user ?>" class="form-control" placeholder="Enter password"><br>
                <div class="form-group">
                    <label for="password">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="<?php echo @$_SESSION['password_confirmation']?>"  placeholder="Password">
                </div>
                <input type="submit" class="btn btn-success" value="Simpan Data"><br>
            </form>
        </div>
    </div>
</div>