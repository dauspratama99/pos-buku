<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Laporan Data Master</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
            <li class="breadcrumb-item active">Pelanggan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <form action="page/laporan/vlap_pelanggan.php" target="_blank" method="post">
                <div class="container-fluid">
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="" style="color: ;">Cetak Laporan Pelanggan</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input class="form-control" type="date" name="hari" value="<?php echo date('Y-m-d'); ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <button class="btn btn-secondary form-control"><i class="fa fa-print"></i> Print Pelanggan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <form action="page/laporan/vlap_buku.php" target="_blank" method="post">
                <div class="container-fluid">
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="" style="color: ;">Cetak Laporan Buku</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input class="form-control" type="date" name="hari" value="<?php echo date('Y-m-d'); ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <button class="btn btn-secondary form-control"><i class="fa fa-print"></i> Print Buku</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
      </div><!-- /.container-fluid -->
    </section>



</div>