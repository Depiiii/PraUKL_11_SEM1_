<?php 
    include "header.php";
?>
<h2 align="center">Selamat datang <?=$_SESSION['nama_siswa']?> di website Perpus Online.</h2>
<div class="row">
        <?php 
        include "koneksi.php";
        $qry_buku=mysqli_query($conn,"select * from buku");
        while($dt_buku=mysqli_fetch_array($qry_buku)){
            ?>
            <div class="col-md-3">
                <div class="card mt-3" >

                <img src="images/<?=$dt_buku['foto']?>">

                <div class="card-body">
                    <h5 class="card-title"><?=$dt_buku['nama_buku']?></h5>
                    <p class="card-text"><?=substr($dt_buku['deskripsi'], 0,30)?></p>
                    <a href="pinjam_buku.php?id_buku=<?=$dt_buku['id_buku']?>" class="btn btn-primary">Pinjam</a>
                </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
<?php
    include "footer.php";
?>
