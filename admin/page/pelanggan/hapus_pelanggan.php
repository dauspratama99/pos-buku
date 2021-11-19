<?php

    $id = $_GET['idhapus'];
    
    $hapus = $koneksi->query("DELETE FROM tb_pelanggan WHERE id_pelanggan='$id'");

    if($hapus == True){
        echo"<script>
            alert('Data Berhasil Di Hapus')
            window.location='?page=page/pelanggan/index'
        </script>";
    }else{
        echo"<script>
            alert('Data Gagal Di Hapus')
            window.location='?page=page/pelanggan/index'
        </script>";
    }

?>