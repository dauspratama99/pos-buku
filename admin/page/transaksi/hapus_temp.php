<?php

    $id = $_GET['idhapus'];
    
    $hapus = $koneksi->query("DELETE FROM tb_temp WHERE kode_temp='$id'");

    if($hapus == True){
        echo"<script>
            alert('Hapus Berhasil')
            window.location='?page=page/transaksi/step_1'
        </script>";
    }else{
        echo"<script>
            alert('Gagal Di Hapus')
            window.location='?page=page/transaksi/step_1'
        </script>";
    }

?>