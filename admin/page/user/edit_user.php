<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <?php

    $id = $_GET['idedit'];
    $dataedit = $koneksi->query("SELECT * FROM tb_user WHERE id_user='$id'")->fetch_assoc();

    ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <br>
                        <div class="card-body">

                            <form action="#" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="id_user" value="<?= $dataedit["id_user"] ?>">

                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control" value="<?= $dataedit["username"] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control" value="<?= $dataedit["password"] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Level</label>
                                    <select name="level" id="level" class="form-control">
                                        <option value="" selected disabled>- Pilih -</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Pimpinan">Pimpinan</option>
                                    </select>
                                    <script>
                                        document.getElementById('level').value = "<?= $dataedit['level'] ?>"
                                    </script>
                                </div>

                                <div class="row">

                                    <div class="col-md-2">
    
                                        <button type="submit" name="edit" class="btn btn-warning btn-block">Update</button>
                                    </div>
                                </div>

                            </form>


                            <?php
                            
                            if (isset($_POST['edit'])) {

                                $id_user       = $_POST['id_user'];
                                $username     = $_POST['username'];
                                $password    = $_POST['password'];
                                $level       = $_POST['level'];
                                
                                $update = $koneksi->query("UPDATE tb_user SET username='$username',             password='$password',level='$level' WHERE id_user='$id_user'");
                                
                                    if ($update == True) {
                                        echo "<script>
                                            alert('Data Berhasil Diedit')
                                            window.location='?page=page/user/index'
                                        </script>";
                                    } else {
                                        echo "<script>
                                            alert('Data Gagal Diedit')
                                            window.location='?page=page/user/edit_user&idedit=" . $id . "'
                                    </script>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>