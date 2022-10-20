<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="file/icon.png" type="image/jpeg" rel="icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    if($_GET['id_pelanggan']){
        include "../koneksi.php";
        $qry=mysqli_query($konn,"select * from pelanggan where
        id_pelanggan='".$_GET['id_pelanggan']."'");
        $dt= mysqli_fetch_array($qry);
        
    }
?>
<body>
<div class="container col-10">

<div class="col-md py-5">
<h3> Ubah Pelanggan</h3>
    <form action="" method="post">
    <input type="hidden" name="id_pelanggan" value="<?=$dt['id_pelanggan']; ?>" />
        Nama :

        <input type="text" name="nm_plggn" value="<?=$dt['nama_pelanggan']?>" class="form-control">

        Alamat :

        <input type="text" name="almt_plggn" value="<?=$dt['alamat']?>" class="form-control">

        No Telp :

        <input type="text" name="telp_plggn" value="<?=$dt['telp']?>" class="form-control">
        </br>

        <input type="submit" name="simpan" value="Ubah Pelanggan" class="btn btn-primary" style="width: 100%">

    </form>
    <?php

        if(isset($_POST['simpan'])){
            $id_pelanggan = $_POST['id_pelanggan'];
            $nama=$_POST['nm_plggn'];
            $almt=$_POST['almt_plggn'];
            $tlp=$_POST['telp_plggn'];

            if(empty($nama)){
                echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tampil_pelanggan_admin.php';</script>";
            } elseif(empty($almt)){

                echo "<script>alert('alamat pelanggan tidak boleh kosong');location.href='tampil_pelanggan_admin.php';</script>";
            } elseif(empty($tlp)){

                echo "<script>alert('telpn pelanggan tidak boleh kosong');location.href='tampil_pelanggan_admin.php';</script>";
            }   else {
                include "../koneksi.php";

                $update=mysqli_query($konn,"update pelanggan set 
                nama_pelanggan='$nama',alamat='$almt',telp='$tlp' where id_pelanggan = '".$id_pelanggan."'") or die(mysqli_error($konn));

                if($update){
                    echo "<script>alert('Sukses mengubah Pelanggan');location.href='tampil_pelanggan_admin.php';</script>";
                } else {
                    echo "<script>alert('Gagal mengubah Pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
                }
            }
        }
        ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</div
</div>
</body>
</html>