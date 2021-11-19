<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_storevaria');
?>
<!DOCTYPE html>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Cetak Laporan Buku</title>
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
                    <h1>Laporan Data Buku</h1>


                    <hr <hr style="display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
                </center>
            </div>
        </div>

        <h3 align="center"><u>Periode Cetak : <?php echo date('F Y')  ?></u></h3>

        <div class="row">
            <div>
                <div>
                    <br>
                    <table>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $ambil = $koneksi->query("SELECT * FROM tb_buku ORDER BY tahun_buku = 'DESC'");
                            while ($pecah = $ambil->fetch_object()) {
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?= $pecah->kode_buku ?></td>
                                    <td><?= $pecah->judul_buku ?></td>
                                    <td><?= $pecah->penggarang_buku ?></td>
                                    <td><?= $pecah->penerbit_buku  ?></td>
                                    <td><?= $pecah->tahun_buku  ?></td>
                                    <td><?= $pecah->jumlah_buku  ?></td>
                                    <td>Rp. <?= number_format(  $pecah->harga_buku  ) ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>