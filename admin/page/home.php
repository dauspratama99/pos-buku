<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">
            <marquee>Selamat Datang Pengunjung . . . !</marquee>
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              $pelanggan = $koneksi->query("SELECT * FROM tb_pelanggan");
              $total = mysqli_num_rows($pelanggan);

              ?>
              <h3><?= $total; ?></h3>

              <p>TOTAL PELANGGAN</p>
            </div>
            <div class="icon">
              <i class="fas fa-restroom"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $buku = $koneksi->query("SELECT * FROM tb_buku");
              $total_buku = mysqli_num_rows($buku);
              ?>
              <h3><?= $total_buku; ?></h3>

              <p>TOTAL BUKU</p>
            </div>
            <div class="icon">
              <i class="fas fa-book"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              $user = $koneksi->query("SELECT * FROM tb_user");
              $total_user = mysqli_num_rows($user);
              ?>
              <h3><?= $total_user; ?></h3>

              <p>TOTAL USER</p>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">

              <?php
              $totalOmset = 0;
              $cariTgl = $koneksi->query("SELECT * FROM tb_penjualan LEFT JOIN tb_penjualandetail ON tb_penjualan.nota_penjualan=tb_penjualandetail.nota_detail ORDER BY nota_penjualan ASC");
              
              while ($data = $cariTgl->fetch_array()) {

              $totalOmset += $data["total_detail"];
              ?>

              <?php
              }
              ?>

              <h3>Rp. <?= number_format( $totalOmset) ?></h3>

              <p>TOTAL OMSET</p>
            </div>
            <div class="icon">
              <i class="fas fa-dollar-sign"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>