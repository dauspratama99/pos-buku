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
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Pelanggan</li>
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
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nohp</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $pelanggan = $koneksi->query("SELECT * FROM tb_pelanggan ORDER BY id_pelanggan ASC");
                      while ($data = $pelanggan->fetch_assoc()) { ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data["nama_pelanggan"]; ?></td>
                          <td><?= $data["alamat_pelanggan"]; ?></td>
                          <td><?= $data["nohp_pelanggan"]; ?></td>
                          <td><?= $data["email_pelanggan"]; ?></td>
                          <td><?= $data["status_pelanggan"]; ?></td>
                          <td>
                            <a href=" ?page=page/pelanggan/edit_pelanggan&idedit=<?= $data["id_pelanggan"] ?>" class="btn btn-warning btn-sm "><i class="fa fa-edit"></i></a>

                            <a href="?page=page/pelanggan/hapus_pelanggan&idhapus=<?= $data["id_pelanggan"] ?>" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelanggan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="#" method="POST" enctype="multipart/form-data">

                          <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama_pelanggan" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat_pelanggan" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="">Nohp / Wa</label>
                            <input type="text" name="nohp_pelanggan" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email_pelanggan" class="form-control form-control-sm">
                          </div>

                          <div class="form-group">
                            <label for="">Status Pelanggan</label>
                            <select name="status_pelanggan" class="form-control">
                              <option value="" selected disabled>- Pilih -</option>
                              <option value="Baru">Baru</option>
                              <option value="Member">Member</option>
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

                      $nama_pelanggan = $_POST['nama_pelanggan'];
                      $alamat_pelanggan = $_POST['alamat_pelanggan'];
                      $nohp_pelanggan    = $_POST['nohp_pelanggan'];
                      $email_pelanggan    = $_POST['email_pelanggan'];
                      $status_pelanggan    = $_POST['status_pelanggan'];
                      // $originalname = $_FILES['fotobarang']['name'];
                      // $lokasi = $_FILES['fotobarang']['tmp_name'];
                      // $size = $_FILES['fotobarang']['size'];
                      // $filename = time() . "_" . $originalname;


                      $simpan = $koneksi->query("INSERT INTO tb_pelanggan (id_pelanggan, nama_pelanggan, alamat_pelanggan, nohp_pelanggan, email_pelanggan, status_pelanggan)
                                                    VALUES ('$id_pelanggan','$nama_pelanggan','$alamat_pelanggan','$nohp_pelanggan', '$email_pelanggan', '$status_pelanggan')");
                    
                        var_dump($simpan);
                      if ($simpan == True) {
                        
                        echo "<script>
                                alert('Data Berhasil Disimpan')
                                window.location='?page=page/pelanggan/index'
                              </script>";
                      } else {
                              echo "<script>
                                alert('Data Gagal Disimpan')
                                window.location='?page=page/pelanggan/index'
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