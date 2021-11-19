<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Transasksi Penjualan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Transaksi</li>
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
              <a href="?page=page/transaksi/step_1" class="btn btn-primary btn-m mb-2"><i class="fas fa-cart-arrow-down"></i> Tambah Transaksi</a>
            </div>
            <div class="card-body">

              <table class="table table-striped" id="example1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Nota</th>
                    <th>Jumlah Beli</th>
                    <th>Total Harga</th>
                    <th style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $detail = $koneksi->query("SELECT * FROM  tb_penjualandetail ORDER BY id_detail");
                  while ($data = $detail->fetch_assoc()) { ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td>INV - 0001<?= $data["nota_detail"]; ?></td>
                      <td><?= $data["qty_detail"]; ?> Psc</td>
                      <td>Rp. <?= number_format( $data["total_detail"]); ?></td>
                      <td style="text-align: center;">
                      
                      <a href="?page=page/transaksi/hapus_index&idhapus=<?= $data["id_detail"] ?>" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a>
                      
                    </td>
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