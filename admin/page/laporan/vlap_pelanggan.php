<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_storevaria');
?>
<!DOCTYPE html>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Cetak Laporan Pelanggan</title>
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
                    <h1>Laporan Pelanggan</h1>


                    <hr <hr style="display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
                </center>
            </div>
        </div>
      
        <h3 align="center"><u>Periode : <?php echo date('F Y')  ?></u></h3>
      
        <div class="row">
            <div>
                <div>
                    <br>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nohp</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $ambil = $koneksi->query("SELECT * FROM tb_pelanggan");
                            while ($pecah = $ambil->fetch_object()) {
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?= $pecah->nama_pelanggan ?></td>
                                    <td><?= $pecah->alamat_pelanggan ?></td>
                                    <td><?=$pecah->nohp_pelanggan ?></td>
                                    <td><?= $pecah->email_pelanggan  ?></td>
                                    <td><?= $pecah->status_pelanggan  ?></td>
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