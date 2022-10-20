<?php

if($_POST){

    $id_petugas= $_POST['id_petugas'];
    $nama=$_POST['nama_petugas'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    if(empty($nama)){
        echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } elseif(empty($username)){

        echo "<script>alert('alamat pelanggan tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } elseif(empty($password)){

        echo "<script>alert('telpn pelanggan tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } elseif(empty($role)){

        echo "<script>alert('role tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    }   else {
        include "../koneksi.php";

        $insert=mysqli_query($konn,"UPDATE petugas SET nama_petugas='".$nama."',username='".$username."',password='".$password.",
        role='".$role."'
        WHERE petugas.id_petugas='".$id_petugas."'")or die(mysqli_error($konn));

        if($insert){
            echo "<script>alert('Sukses Mengubah Petugas');location.href='tampil_petugas.php';</script>";
        } else {
            echo "<script>alert('Gagal Mengubah Petugas');location.href='tambah_petugas.php';</script>";
        }
    }
}
?>