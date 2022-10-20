<?php
include "header_admin.php";
?>
<thead>
<div class="container">
        <div class="card">
            <div class="card-header">
                <h3 align='center'>Data BUKU</h3>
                    <form method="post" action="data_buku.php" class="d-flex">
                        <input class="form-control" type="search" name="cari" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type ="submit">Search</button>
                    </form>
        <table class="table table-hover table-striped">
  <thead>
   
    <tr>
    <th>NO</th>
        <th>NAMA BUKU</th>
        <th>PENGARANG</th>
        <th>DESKRIPSI</th>
        <th>FOTO</th>
        <th>AKSI</th>
    </tr>

  </thead>
  <tbody>
  <?php
            include "koneksi.php";
            if(isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $qry_buku=mysqli_query($conn, "select * from buku where id_buku= '$cari' or nama_buku like '%$cari%' or pengarang  like '%$cari%'");
            }
            else{
                $qry_buku = mysqli_query($conn, "select * from buku ");
            }
            $no = 0;
        while ($data_buku = mysqli_fetch_array($qry_buku)) {$no++;?>
          <tr>     
             <td><?=$no?>
                  </td><td><?=$data_buku['nama_buku']?></td> 
                  <td><?=$data_buku['pengarang']?></td> 
                  <td><?=$data_buku['deskripsi']?></td> 
                  <td><img src="images/<?=$data_buku['foto']?>" width="180px" height="260px"></td>
                  <td><a href="ubah_data.php?id_buku=<?=$data_buku['id_buku']?>" class="btn btn-success">Ubah<a>
                      | <a href="hapus_data.php?id_buku=<?=$data_buku['id_buku']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
  
              </tr>
              <?php 
              }
              
              ?>

        </tbody>
    </table>

    
    </thead>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah_buku">tambah</button>
</button>

<div class="modal" id="tambah_buku" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
          <div class="modal-body">
            <form action="proses_upload.php" method="post" enctype="multipart/form-data">
          nama buku:
          <input type="text" required class="form-control" name="nama_buku"><br>
          pengarang:
          <input type="text" required class="form-control" name="pengarang"><br>
          deskripsi:
          <textarea name ="deskripsi" rows="4"  class="form-control"></textarea><br>
          upload foto:
          <input type="file" required name="foto" class="form-control"><br>
          <input type="submit" name="simpan" value="SIMPAN" class="btn btn-success" style="float: right;" >
              </form>
          </div>
    </div>
  </div>
</div>
    <?php
include "footer.php";
?>