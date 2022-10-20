<?php
session_start();
    if($_SESSION['status_login']!=true){
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container col-11">
            <a class="navbar-brand" href="home.php">TOKO ONLINE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            
            <a class="nav-link" href="tampil_produk.php">Produk
            </a>
            <a class="nav-link" href="data_transaksi.php">Transaksi
            </a>
            <a class="nav-link" href="logout.php">logout
            </a>
            </ul>
            <form action="" method="post">
        <span class="navbar-text">
        <a href="" class="btn btn-success">Hai "<?php echo $_SESSION['nama_pelanggan']?>"</a>
        <a href="keranjang.php" class="btn btn-warning">Keranjang</a>
        </span>
            </form>
        </div>
        </div>
    </nav>  
</body>
</html>
