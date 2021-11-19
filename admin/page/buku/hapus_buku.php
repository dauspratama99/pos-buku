<?php

    $id = $_GET['idhapus'];
    
    $hapus = $koneksi->query("DELETE FROM tb_buku WHERE id_buku='$id'");

    if($hapus == True){
        echo"<script>
            alert('Data Berhasil Di Hapus')
            window.location='?page=page/buku/index'
        </script>";
    }else{
        echo"<script>
            alert('Data Gagal Di Hapus')
            window.location='?page=page/buku/index'
        </script>";
    }

?>