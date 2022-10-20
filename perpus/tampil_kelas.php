<?php
    include 'header_admin.php';

?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
<div class="container">
        <div class="card">
            <div class="card-header">
                <h3 align='center'>Data Kelas</h3>
                    <form method="post" action="tampil_kelas.php" class="d-flex">
                        <input class="form-control" type="search" name="cari" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type ="submit">Search</button>
                    </form>
        <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA KELAS</th>
                <th>Kelompok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
        <tbody>
        <?php
            include "koneksi.php";
            if(isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $qry_kelas=mysqli_query($conn, "select * from kelas where id_kelas = '$cari' or nama_kelas like '%$cari%' or kelompok like '%$cari%'");
            }
            else{
                $qry_kelas = mysqli_query($conn, "select * from kelas");
            }
            $no = 0;
            while ($data_kelas = mysqli_fetch_array($qry_kelas)) { 
        ?>
            <tr>
                <td><?=$data_kelas['id_kelas']?></td>
                <td><?=$data_kelas['nama_kelas']?></td>
                <td><?=$data_kelas['kelompok']?></td>
                <td>
                    <a href="./ubah_kelas.php?id_kelas=<?= $data_kelas['id_kelas'] ?>" class="btn btn-success">Ubah</a>
                    <a href="./hapus_kelas.php?id_kelas=<?= $data_kelas['id_kelas'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php 
            }
            ?>
            </div>
        </tbody>
    </table>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>



    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah_kelas">tambah</button>
</button>

<div class="modal" id="tambah_kelas" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">tambah kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
          <div class="modal-body">
            <form action="proses_tambah_kelas.php" method="post" enctype="multipart/form-data">
          nama kelas:
          <input type="text" required class="form-control" name="nama_kelas"><br>
          kelompok:
          <input type="text" required class="form-control" name="kelompok"><br>
          <input type="submit" name="simpan" value="SIMPAN" class="btn btn-success">
              </form>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>