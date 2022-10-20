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
<title></title>
</head>
<body>
<?php include "header_admin.php"; ?>
    <div class="container col-10">
        <div class="col-md py-5">
        <table class="table table-hover table-striped">
    <thead>
    <tr>

        <th>NO</th>
        <th>NAMA PELANGGAN</th>
        <th>ALAMAT</th>
        <th>NO TELEPON</th>
        <th></th>

</tr>
    </thead>
    
    <tbody>
        <?php
        include "../koneksi.php";
        $qry_pelanggan = mysqli_query($konn,"select * from pelanggan");
        $no=0;
        while($data_pelanggan = mysqli_fetch_array($qry_pelanggan)){
        $no++;?>
        <tr><td><?=$no?> </td>
        <td> <?=$data_pelanggan['nama_pelanggan']?> </td>
        <td> <?=$data_pelanggan['alamat']?> </td>
        <td> <?=$data_pelanggan['telp']?> </td>
        <td>
        <a href="ubah_pelanggan.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan'] ?>"class="btn btn-success">Ubah </a>
        <a href="hapus_pelanggan.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan'] ?>" onclick="return confirm('Are you sure you want to delete this item?')"
        class="btn btn-danger">Hapus</a>
        </td>
        </tr>
        <?php
        }

        ?>
    </tbody>
    </table>
    <a href="tambah_pelanggan.php" class="btn btn-primary" style="float: right; width: 250px;">Tambah Pelanggan</a>

</body>
<?php include "../user/footer.php"; ?>
</html>