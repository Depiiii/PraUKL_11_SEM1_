<?php 
session_start();
    if($_POST){
        include "../koneksi.php";
        
        $qry_get_barang=mysqli_query($konn,"select * from produk where id_produk = '".$_GET['id_produk']."'");
        $dt_barang=mysqli_fetch_array($qry_get_barang);
        $_SESSION['cart'][]=array(
            'id_barang'=>$dt_barang['id_produk'],
            'nama_barang'=>$dt_barang['nama_produk'],
            'qty'=>$_POST['jumlah_beli']

        );
    }
    header('location: keranjang.php');
?>

