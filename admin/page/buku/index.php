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
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Buku</li>
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
                        <th>ISBN / Kode</th>
                        <th>Judul</th>
                        <th>Penggarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Jumlah Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $buku = $koneksi->query("SELECT * FROM tb_buku ORDER BY id_buku ASC");
                      while ($data = $buku->fetch_assoc()) { ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data["kode_buku"]; ?></td>
                          <td><?= $data["judul_buku"]; ?></td>
                          <td><?= $data["penggarang_buku"]; ?></td>
                          <td><?= $data["penerbit_buku"]; ?></td>
                          <td><?= $data["tahun_buku"]; ?></td>
                          <td><?= $data["jumlah_buku"]; ?></td>
                          <td>Rp. <?= number_format($data["harga_buku"]);  ?></td>
                          <td>
                            <a href=" ?page=page/buku/edit_buku&idedit=<?= $data["id_buku"] ?>" class="btn btn-warning btn-sm "><i class="fa fa-edit"></i></a>

                            <a href="?page=page/buku/hapus_buku&idhapus=<?= $data["id_buku"] ?>" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="#" method="POST" enctype="multipart/form-data">

                          <div class="form-group">
                            <label for="">ISBN / Kode</label>
                            <input type="text" name="kode_buku" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="">Judul</label>
                            <input type="text" name="judul_buku" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="">Penggarang</label>
                            <input type="text" name="penggarang_buku" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="">Penerbit</label>
                            <input type="text" name="penerbit_buku" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="">Tahun Terbit</label>
                            <input type="text" name="tahun_buku" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="">Jumlah Stok</label>
                            <input type="text" name="jumlah_buku" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="">Harga (Rp.)</label>
                            <input type="text" name="harga_buku" class="form-control form-control-sm">
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

                      $kode_buku = $_POST['kode_buku'];
                      $judul_buku = $_POST['judul_buku'];
                      $penggarang_buku    = $_POST['penggarang_buku'];
                      $penerbit_buku    = $_POST['penerbit_buku'];
                      $tahun_buku    = $_POST['tahun_buku'];
                      $jumlah_buku    = $_POST['jumlah_buku'];
                      $harga_buku    = $_POST['harga_buku'];
                      // $originalname = $_FILES['fotobarang']['name'];
                      // $lokasi = $_FILES['fotobarang']['tmp_name'];
                      // $size = $_FILES['fotobarang']['size'];
                      // $filename = time() . "_" . $originalname;


                      $simpan = $koneksi->query("INSERT INTO tb_buku (id_buku, kode_buku, judul_buku, penggarang_buku, penerbit_buku, tahun_buku, jumlah_buku, harga_buku)
                                                    VALUES ('$id_buku','$kode_buku','$judul_buku','$penggarang_buku', '$penerbit_buku', '$tahun_buku', '$jumlah_buku', '$harga_buku')");
                    
                      if ($simpan == True) {
                        
                        echo "<script>
                                alert('Data Berhasil Disimpan')
                                window.location='?page=page/buku/index'
                              </script>";
                      } else {
                              echo "<script>
                                alert('Data Gagal Disimpan')
                                window.location='?page=page/buku/index'
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