<?php include 'koneksi.php';

session_start();


if (isset($_SESSION['admin'])) {
    header("location: index.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="asset/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page" style="background-image: url(../asset/img/bck1.jpg); background-size:cover;">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h3"><b>Silahkan Login</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg" style="color:grey;">Masukan Username dan Password !</p>

                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


    <?php

    if (isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];


        $cek_user = $koneksi->query("SELECT * FROM tb_user WHERE username = '$username' AND password = '$password' ")->fetch_assoc();

        if ($cek_user == True) {
            $_SESSION['admin'] = $cek_user;
            echo "<script>
                alert('Login Sukses');
                window.location='index.php';
                </script>";
        } else {
            echo "<script>
                alert('Periksa Username dan Password Anda');
                window.location='login.php';
                </script>";
        }
    }

    ?>

    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="asset/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="asset/dist/js/adminlte.min.js"></script>
</body>

</html>