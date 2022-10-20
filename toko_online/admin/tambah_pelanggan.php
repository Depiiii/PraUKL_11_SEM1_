<!DOCTYPE html>

<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="file/icon.png" type="image/jpeg" rel="icon">
    <title></title>

</head>
<body>
    <div class="container col-10">

            <div class="col-md py-5">
            <h3> Tambah Pelanggan</h3>
                <form action="" method="post">

                    Nama :

                    <input type="text" name="nama_pelanggan" value="" class="form-control">

                    Alamat :

                    <input type="text" name="alamat" value="" class="form-control">

                    No Telp :

                    <input type="text" name="telp" value="" class="form-control">

                    email :

                    <input type="email" name="email" value="" class="form-control">

                    </br>

                    <input type="submit" name="simpan" value="Tambah Pelanggan" class="btn btn-primary" style="width: 100%">

                </form>
                <?php

                if(isset($_POST['simpan'])){

                    $nama=$_POST['nama_pelanggan'];
                    $alamat=$_POST['alamat'];
                    $telp=$_POST['telp'];
                    $email=$_POST['email'];

                    if(empty($nama)){
                        echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";

                    } elseif(empty($alamat)){
                        echo "<script>alert('alamat pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";

                    } elseif(empty($telp)){
                        echo "<script>alert('telp pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";

                    } elseif(empty($email)){

                        echo "<script>alert('email pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
                    } else {
                        
                        include "../koneksi.php";

                        $insert=mysqli_query($konn,"insert into pelanggan (nama_pelanggan, alamat, telp, email) value ('".$nama."','".$alamat."','".$telp."','".$email."')") or die(mysqli_error($konn));

                        if($insert){
                            echo "<script>alert('Sukses menambahkan pelanggan');location.href='tampil_pelanggan_admin.php';</script>";
                        } else {
                            echo "<script>alert('Gagal menambahkan Pelanggan');location.href='tambah_pelanggan_admin.php';</script>";
                        }
                    }
                }
                ?>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
            </div
    </div>
</body>

</html>