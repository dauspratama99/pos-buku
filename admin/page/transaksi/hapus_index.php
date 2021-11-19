<?php

    $id = $_GET['idhapus'];
    
    $hapus = $koneksi->query("DELETE FROM tb_penjualandetail WHERE id_detail='$id'");

    if($hapus == True){
        echo"<script>
            alert('Data Berhasil Di Hapus')
            window.location='?page=page/transaksi/index'
        </script>";
    }else{
        echo"<script>
            alert('Data Gagal Di Hapus')
            window.location='?page=page/transaksi/index'
        </script>";
    }

?>