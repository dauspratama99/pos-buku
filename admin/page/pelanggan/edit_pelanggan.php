<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pelanggan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <?php

    $id = $_GET['idedit'];
    $dataedit = $koneksi->query("SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id'")->fetch_assoc();

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

                                <input type="hidden" name="id_pelanggan" value="<?= $dataedit["id_pelanggan"] ?>">

                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama_pelanggan" class="form-control" value="<?= $dataedit["nama_pelanggan"] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat_pelanggan" class="form-control" value="<?= $dataedit["alamat_pelanggan"] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Nohp / Wa</label>
                                    <input type="text" name="nohp_pelanggan" class="form-control" value="<?= $dataedit["nohp_pelanggan"] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email_pelanggan" class="form-control" value="<?= $dataedit["email_pelanggan"] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status_pelanggan" id="status_pelanggan" class="form-control">
                                        <option value="" selected disabled>- Pilih -</option>
                                        <option value="Baru">Baru</option>
                                        <option value="Member">Member</option>
                                    </select>
                                    <script>
                                        document.getElementById('status_pelanggan').value = "<?= $dataedit['status_pelanggan'] ?>"
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

                                $id_pelanggan       = $_POST['id_pelanggan'];
                                $nama_pelanggan = $_POST['nama_pelanggan'];
                                $alamat_pelanggan = $_POST['alamat_pelanggan'];
                                $nohp_pelanggan    = $_POST['nohp_pelanggan'];
                                $email_pelanggan    = $_POST['email_pelanggan'];
                                $status_pelanggan    = $_POST['status_pelanggan'];

                                $update = $koneksi->query("UPDATE tb_pelanggan SET nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan', nohp_pelanggan='$nohp_pelanggan', email_pelanggan='$email_pelanggan', status_pelanggan='$status_pelanggan' WHERE id_pelanggan = '$id_pelanggan'");

                                if ($update == True) {
                                    echo "<script>
                                            alert('Data Berhasil Diedit')
                                            window.location='?page=page/pelanggan/index'
                                        </script>";
                                } else {
                                    echo "<script>
                                            alert('Data Gagal Diedit')
                                            window.location='?page=page/pelanggan/edit_user&idedit=" . $id . "'
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