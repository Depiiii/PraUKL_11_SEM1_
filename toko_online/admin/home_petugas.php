<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php 
    include "navbar_petugas.php";
    if($_SESSION['role']=='petugas'){
        ?>
        <div class="py-5">
            <h2 align ="center">Selamat datang <?=$_SESSION['nama_petugas']?> di website toko Online.</h2>
            </div>
            <div class="row">

            <?php
            
                include "../koneksi.php";
            $qry_produk=mysqli_query($konn, "select * from produk" );
            while ($dt_produk=mysqli_fetch_array($qry_produk)){
            
            ?>
            <div class="col-md-3">
                <div class="card">
            <img src="../gambar/<?=$dt_produk['foto_produk']?>" class="card-img-top">
                    <div class="card-body">
            <h5 class="card-title" ><?=$dt_produk['nama_produk']?></h5>
                        <p class="card-text"><?=$dt_produk['deskripsi']?></p>
                <a href="#" class="btn btn-primary">tampilkan data produk</a>
                    </div>
                </div>
            </div>



            <?php
            }
            ?>

            
                </div>
        <?php
    } else {
        echo 'anda bukan petugas';
    }
?>


    </html>

