<?php include 'koneksi.php';

session_start();


if (!isset($_SESSION['admin'])) {
    header("location: login.php");
    die();
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'component/style.php'; ?>
</head>


<body class="hold-transition sidebar-mini layout-fixed ">
<script src="asset/plugins/jquery/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="wrapper">

        <!-- Navbar -->
        <?php include 'component/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'component/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
       

        <?php include 'content.php'; ?>


        <!-- /.content-wrapper -->
        <?php include 'component/footer.php'; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php include 'component/script.php'; ?>

</body>

</html>