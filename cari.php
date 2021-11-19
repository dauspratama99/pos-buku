<?php

    $koneksi = mysqli_connect("localhost","root","","db_storevaria");
?>

<?php
    if(!isset($_POST['cari'])){
        $data = mysqli_query($koneksi,"SELECT * FROM tb_buku LIMIT 5");
    } else {
        $data = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE judul_buku LIKE '%$_POST[cari]%' || penggarang_buku LIKE '%$_POST[cari]%'");
    }

    if(mysqli_num_rows($data) > 0){
        $no = 1;
        while($a = mysqli_fetch_array($data)){
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $a["kode_buku"]; ?></td>
            <td><?= $a["judul_buku"]; ?></td>
            <td><?= $a["penggarang_buku"]; ?></td>
            <td><?= $a["penerbit_buku"]; ?></td>
            <td><?= $a["tahun_buku"]; ?></td>
            <td><?= $a["jumlah_buku"]; ?></td>
            <td>Rp. <?= number_format($a["harga_buku"]);  ?></td>
        </tr>

        <?php
        }
       
    } else {
        echo '<tr>';
        echo '<td colspan="8"><center>Data Tidak Ditemukan / Stok Kosong !</center></td>';
        echo '</tr>';
    }
?>