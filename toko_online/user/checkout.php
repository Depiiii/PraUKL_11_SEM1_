<?php 
    session_start();
    include "../koneksi.php";
    $cart=@$_SESSION['cart'];
    if(($cart)!=null){
        mysqli_query($konn,"insert into transaksi (id_pelanggan,tgl_transaksi) value('".$_SESSION['id_pelanggan']."','".date('Y-m-d')."')");
         $id=mysqli_insert_id($konn);
        foreach ($cart as $key_produk => $val_produk) {
            mysqli_query($konn,"insert into detail_transaksi(id_transaksi,id_produk,qty) value('".$id."','".$val_produk['id_barang']."','".$val_produk['qty']."')");
        }
        unset($_SESSION['cart']);
        echo '<script>alert("Anda berhasil membeli barang");location.href="data_transaksi.php"</script>';
    }
?>
