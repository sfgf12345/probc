<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<title>Register Member - PHP</title>
</head>
<body class="bg-gradient-dark" style="background-color: #5a5c69;">

  <div class="container">
				<?php
				if(isset($_SESSION['error'])) {
				?>
				<div class="alert alert-warning" role="alert">
				  <?php echo $_SESSION['error']?>
				</div>
				<?php
				}
				?>

				<?php
				if(isset($_SESSION['message'])) {
				?>
				<div class="alert alert-success" role="alert">
				  <?php echo $_SESSION['message']?>
				</div>
				<?php
				}
				?>





    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="card o-hidden border-0 shadow-lg my-5" style="width: 45%;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
                  </div>
                  <form action="cek_register.php" method="post" class="user">
                  <div class="form-group">
                    <label for="username">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="name" value="<?php echo @$_SESSION['nama']?>" aria-describedby="name" placeholder="Nama lengkap" autocomplete="off">

                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="<?php echo @$_SESSION['username']?>" aria-describedby="username" placeholder="Username" autocomplete="off">

                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="<?php echo @$_SESSION['password']?>" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="password">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="<?php echo @$_SESSION['password_confirmation']?>"  placeholder="Password">
                  </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="http://localhost/probc/login.php">Back to Login</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

<?php
session_destroy();
?>