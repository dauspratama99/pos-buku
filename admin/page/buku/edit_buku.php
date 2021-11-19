<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Buku</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <?php

    $id = $_GET['idedit'];
    $dataedit = $koneksi->query("SELECT * FROM tb_buku WHERE id_buku='$id'")->fetch_assoc();

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

                                <input type="hidden" name="id_buku" value="<?= $dataedit["id_buku"] ?>">

                                <div class="form-group">
                                    <label for="">ISBN / Kode</label>
                                    <input type="text" name="kode_buku" class="form-control" value="<?= $dataedit["kode_buku"] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Judul</label>
                                    <input type="text" name="judul_buku" class="form-control" value="<?= $dataedit["judul_buku"] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Penggarang</label>
                                    <input type="text" name="penggarang_buku" class="form-control" value="<?= $dataedit["penggarang_buku"] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Penerbit</label>
                                    <input type="text" name="penerbit_buku" class="form-control" value="<?= $dataedit["penerbit_buku"] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Tahun Terbit</label>
                                    <input type="text" name="tahun_buku" class="form-control" value="<?= $dataedit["tahun_buku"] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Jumlah Stok</label>
                                    <input type="text" name="jumlah_buku" class="form-control" value="<?= $dataedit["jumlah_buku"] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Harga (Rp.)</label>
                                    <input type="text" name="harga_buku" class="form-control" value="<?= $dataedit["harga_buku"] ?>">
                                </div>

                                <div class="row">

                                    <div class="col-md-2">

                                        <button type="submit" name="edit" class="btn btn-warning btn-block">Update</button>
                                    </div>
                                </div>

                            </form>


                            <?php

                            if (isset($_POST['edit'])) {

                                $id_buku  = $_POST['id_buku'];
                                $kode_buku = $_POST['kode_buku'];
                                $judul_buku = $_POST['judul_buku'];
                                $penggarang_buku    = $_POST['penggarang_buku'];
                                $penerbit_buku    = $_POST['penerbit_buku'];
                                $tahun_buku    = $_POST['tahun_buku'];
                                $jumlah_buku    = $_POST['jumlah_buku'];
                                $harga_buku    = $_POST['harga_buku'];

                                $update = $koneksi->query("UPDATE tb_buku SET kode_buku='$kode_buku', judul_buku='$judul_buku', penggarang_buku='$penggarang_buku', penerbit_buku='$penerbit_buku', tahun_buku='$tahun_buku', jumlah_buku='$jumlah_buku', harga_buku='$harga_buku' WHERE id_buku = '$id_buku'");

                                if ($update == True) {
                                    echo "<script>
                                            alert('Data Berhasil Diedit')
                                            window.location='?page=page/buku/index'
                                        </script>";
                                } else {
                                    echo "<script>
                                            alert('Data Gagal Diedit')
                                            window.location='?page=page/buku/edit_user&idedit=" . $id . "'
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