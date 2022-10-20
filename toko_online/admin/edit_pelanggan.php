<?php

if($_POST){

    $id_pelanggan= $_POST['id_pelanggan'];
    $nama=$_POST['nama_pelanggan'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $alamat=$_POST['alamat'];
    $telp=$_POST['telp'];
    $email=$_POST['email'];

    if(empty($nama)){
    echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";

    } elseif(empty($username)){
      echo "<script>alert('username pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";

    } elseif(empty($password)){
      echo "<script>alert('password pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";

    } elseif(empty($alamat)){
      echo "<script>alert('alamat tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";

    } elseif(empty($telp)){
        echo "<script>alert('telp tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
  
    } elseif(empty($email)){
        echo "<script>alert('email tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
  

    }   else {
        include "../koneksi.php";

        $insert=mysqli_query($konn,"UPDATE pelanggan SET nama_pelanggan='".$nama."',username='".$username."',password='".$password.",
        role='".$role."'
        WHERE pelanggan.id_pelanggan='".$id_pelanggan."'")or die(mysqli_error($konn));

        if($insert){
            echo "<script>alert('Sukses Mengubah pelanggan');location.href='tampil_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal Mengubah pelanggan');location.href='tambah_pelanggan.php';</script>";
        }
    }
}
?>