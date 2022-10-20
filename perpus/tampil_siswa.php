<?php 
    include "header_admin.php";
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
                <h3 align='center'>Data Siswa</h3>
                    <form method="post" action="tampil_siswa.php" class="d-flex">
                        <input class="form-control" type="search" name="cari" placeholder="Search" aria-label="Search" value="<?php
                        if(isset($_POST['cari'])){
                            $cari = $_POST['cari'];
                            echo $cari;
                        }
                        ?>">
                        <button class="btn btn-outline-success" type ="submit">Search</button>
                    </form>
        <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA SISWA</th>
                <th>TANGGAL LAHIR</th>
                <th>ALAMAT</th>
                <th>GENDER</th>
                <th>USERNAME</th>

            </tr>
        </thead>
        <tbody>
        <?php
            include "koneksi.php";
            if(isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $qry_siswa=mysqli_query($conn, "select * from siswa where id_siswa = '$cari' or nama_siswa like '%$cari%' or  alamat like '%$cari%'");
            }
            else{
                $qry_siswa = mysqli_query($conn, "select * from siswa ");
            }
            $no = 0;
        while ($data_siswa = mysqli_fetch_array($qry_siswa)) {
            $no++
        ?>
        


        <tr>            <td><?=$no?>
                </td><td><?=$data_siswa['nama_siswa']?></td> 
                <td><?=$data_siswa['tanggal_lahir']?></td> 
                <td><?=$data_siswa['alamat']?></td><td>
                <?=$data_siswa['gender']?></td> 
                <td><?=$data_siswa['username']?></td> 
                
                <td><a href="ubah_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" class="btn btn-success">Ubah<a>
                    |<a href="hapus.php?id_siswa=<?=$data_siswa['id_siswa']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>

            </tr>
            <?php 
            }
            ?>
            </div>


        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah_siswa">tambah</button>
</button>

<div class="modal" id="tambah_siswa" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
          <div class="modal-body">
            <form action="proses_upload_siswa.php" method="post" enctype="multipart/form-data">
          nama siswa:
          <input type="text" required class="form-control" name="nama_siswa"><br>
          tanggal lahir:
          <input type="date" required class="form-control" name="tanggal_lahir"><br>
          alamat:
          <textarea name ="alamat" rows="4"  class="form-control"></textarea><br>
          gender:
          <select name="gender" class="form-control" required>
            <option></option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
            </select><br>

        Username:
          <input type="text" required class="form-control" name="username"><br>
          Password:
          <input type="password" required class="form-control" name="password"><br>
          Kelas :
        <select name="id_kelas" class="form-control">
            <option></option>
            <?php 
            include "koneksi.php";
            $qry_kelas=mysqli_query($conn,"select * from kelas");
            while($data_kelas=mysqli_fetch_array($qry_kelas)){
                echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';    
            }
            ?>
        </select><br>
  
          <input type="submit" name="simpan" value="SIMPAN" class="btn btn-success" style="float: right;" >
              </form>
          </div>
    </div>
  </div>
</div>
</body>
</html>
