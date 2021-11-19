<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Penjualan / Sales</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                        <li class="breadcrumb-item active">Penjualan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                            </div>
                            <div class="card-body">
                                <form action="page/laporan/vlap_penjualan1.php" method="POST" target="blank">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-1 col-form-label">Dari</label>
                                        <div class="col-sm-3">
                                            <input type="date"  class="form-control" name="dari" id="dari">
                                        </div>
                                        <label for="" class="col-sm-1 col-form-label">Sampai</label>
                                        <div class="col-sm-3">
                                            <input type="date"  class="form-control" name="sampai" id="sampai">
                                        </div>

                                        <div class="col-sm-1">
                                            
                                        <button type="submit" class="btn btn-secondary form-control" name="cari"><i class="fa fa-print"></i> </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Invoice</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Kode Barang</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     $no = 1;

                                    // if(isset($_POST['cari'])){

                                    //     $dari = $_POST['dari'];
                                    //     $sampai = $_POST['sampai'];

                                        // $cariTgl = $koneksi->query("SELECT * FROM tb_penjualan LEFT JOIN tb_penjualandetail ON tb_penjualan.nota_penjualan=tb_penjualandetail.nota_detail WHERE tb_penjualan.tanggal_penjualan BETWEEN '$dari' AND '$sampai' ORDER BY nota_penjualan ASC");
                                    // } else {
                                        $cariTgl = $koneksi->query("SELECT * FROM tb_penjualan LEFT JOIN tb_penjualandetail ON tb_penjualan.nota_penjualan=tb_penjualandetail.nota_detail ORDER BY nota_penjualan ASC");
                                    // }
                                  
                                  
                                    while($data = $cariTgl->fetch_array()){

                                        // var_dump($data);
                                        ?>
                                    
                                  
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>INV-001<?= $data["nota_penjualan"]; ?></td>
                                        <td><?= $data["tanggal_penjualan"]; ?></td>
                                        <td><?= $data["kode_detail"]; ?></td>
                                        <td>Rp. <?= number_format( $data["harga_detail"]); ?></td>
                                        <td><?= $data["qty_detail"]; ?> Pcs</td>
                                        <td>Rp. <?= number_format($data["total_detail"]) ; ?></td>
                                    </tr>
                                    <?php    
                                    }
                                    ?>

                                    </tbody>
                                </table>
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