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
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data User</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
              <div class="card">
                <div class="card-header p-2">
                  <button type="button" class="btn btn-primary btn-m mb-2" data-toggle="modal" data-target="#tambah"> Tambah</button>
                </div>
                <div class="card-body">

                  <table class="table table-striped" id="example1">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $query_tampiluser = $koneksi->query("SELECT * FROM tb_user ORDER BY id_user ASC");
                      while ($data = $query_tampiluser->fetch_assoc()) { ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data["username"]; ?></td>
                          <td><?= $data["password"]; ?></td>
                          <td><?= $data["level"]; ?></td>
                          <td>
                            <a href=" ?page=page/user/edit_user&idedit=<?= $data["id_user"] ?>" class="btn btn-warning btn-sm "><i class="fa fa-edit"></i></a>

                            <a href="?page=page/user/hapus_user&idhapus=<?= $data["id_user"] ?>" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>

                <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="#" method="POST" enctype="multipart/form-data">

                          <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm">
                          </div>

                          <div class="form-group">
                            <label for="">Level User</label>
                            <select name="level" class="form-control">
                              <option value="" selected disabled>- Pilih -</option>
                              <option value="Admin">Admin</option>
                              <!-- <option value="Pimpinan">Pimpinan</option> -->
                            </select>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                      </div>
                      </form>

                    </div><!-- /.container-fluid -->


                    <?php

                    if (isset($_POST['simpan'])) {

                      $username = $_POST['username'];
                      $password = $_POST['password'];
                      $level    = $_POST['level'];
                      // $originalname = $_FILES['fotobarang']['name'];
                      // $lokasi = $_FILES['fotobarang']['tmp_name'];
                      // $size = $_FILES['fotobarang']['size'];
                      // $filename = time() . "_" . $originalname;


                      $simpan = $koneksi->query("INSERT INTO tb_user (id_user, username, password, level)
                                                    VALUES ('$id_user','$username','$password','$level')");

                      if ($simpan == True) {
                        // move_uploaded_file($lokasi, 'asset/img/barang/' . $filename);
                        echo "<script>
                                alert('Data Berhasil Disimpan')
                                window.location='?page=page/user/index'
                              </script>";
                      } else {
                              echo "<script>
                                alert('Data Gagal Disimpan')
                                window.location='?page=page/user/index'
                              </script>";
                      }
                    }

                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script>
      $(document).ready(function() {
        $('#example1').DataTable();
      });
    </script>