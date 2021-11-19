<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_storevaria');
?>
<!DOCTYPE html>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Cetak Laporan Penjualan</title>
    <style>
        html,
        body {
            background: #eee;
            margin: 0;
            font-family: 'Open Sans', sans-serif;
        }


        .container {

            margin: auto;
            /* padding-left: 100px; */
        }

        /*design table 1*/
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;

            border: 1px solid #999;
            padding: 8px 20px;
        }

        .contoh-link:hover {
            background: #16A085;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div>
                <center>
                    <h1>Laporan Data Penjualan</h1>


                    <hr <hr style="display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
                </center>
            </div>
        </div>
        <br>
        <p>Tanggal Cetak : <?php echo date('d F Y')  ?></u></p>

        <div class="row">
            <div>
                <div>
                    <br>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Invoice</th>
                                <th>Tanggal Transaksi</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $subTotal = 0;

                            if (isset($_POST['cari'])) {

                                $dari = $_POST['dari'];
                                $sampai = $_POST['sampai'];

                                $cariTgl = $koneksi->query("SELECT * FROM tb_penjualan LEFT JOIN tb_penjualandetail ON tb_penjualan.nota_penjualan=tb_penjualandetail.nota_detail WHERE tb_penjualan.tanggal_penjualan BETWEEN '$dari' AND '$sampai' ORDER BY nota_penjualan ASC");
                            } else {
                                $cariTgl = $koneksi->query("SELECT * FROM tb_penjualan LEFT JOIN tb_penjualandetail ON tb_penjualan.nota_penjualan=tb_penjualandetail.nota_detail ORDER BY nota_penjualan ASC");
                            }


                            while ($data = $cariTgl->fetch_array()) {

                                $subTotal += $data["total_detail"];
                                // var_dump($data);
                            ?>


                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td>INV-001<?= $data["nota_penjualan"]; ?></td>
                                    <td><?= date("d F Y", strtotime($data["tanggal_penjualan"])); ?></td>
                                    <td><?= $data["kode_detail"]; ?></td>
                                    <td><?= $data["nama_detail"]; ?></td>
                                    <td>Rp. <?= number_format($data["harga_detail"]); ?></td>
                                    <td><?= $data["qty_detail"]; ?> Pcs</td>
                                    <td>Rp. <?= number_format($data["total_detail"]); ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="7">Sub Total</th>
                                <th align="left">Rp. <?= number_format($subTotal) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                    <br>
                    <br>
                    <div class="" aliign="">

                        <div class="float-end text-center" style="padding: 1cm;padding-top:0%">
                            <!-- <h6 class="text-center" style="margin-bottom: 2cm;">{{ date('d F Y') }}</h6> -->
                            <span align="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala Toko</span><br><br><br><br>
                            <span>( ..................................... )</span><br>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>