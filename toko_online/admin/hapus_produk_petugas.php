<?php
        if($_GET['id_produk']){
        include "../koneksi.php";
        $qry_hapus=mysqli_query($konn,"delete from produk where
        id_produk='".$_GET['id_produk']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses menghapus produk');location.href='tampil_produk_petugas.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus produk');location.href='tampil_produk_petugas.php';</script>";
        }
        }
?>