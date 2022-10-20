<?php
    $id_buku = $_POST["id_buku"];
    $nama_buku = $_POST["nama_buku"];
    $pengarang = $_POST["pengarang"];
    $deskripsi = $_POST['deskripsi'];

    include "koneksi.php";
    if ($_FILES['foto']['tmp_name']) {
        $temp = $_FILES['foto']['tmp_name'];
        $type = $_FILES['foto']['type'];
        $size = $_FILES['foto']['size'];
        $name = rand(0,9999).$_FILES['foto']['name'];
        $folder = "images/";

        if ($size < 2048000 and ($type =='image/jpeg' or $type == 'image/png'))
        {
            $query_foto = mysqli_query($conn, "SELECT * FROM buku where id_buku = '".$_POST['id_buku']."'");
            $data_foto = mysqli_fetch_array($query_foto);
            unlink('images/'.$data_foto['foto']);

            move_uploaded_file($temp, $folder . $name);
            $input = mysqli_query($conn, "UPDATE buku SET 
            nama_buku='".$nama_buku."', pengarang='".$pengarang."',
            deskripsi='".$deskripsi."', foto='".$name."'
            where id_buku='".$id_buku."'");

            if ($input) {
                echo "<script>alert('Berhasil');location.href='data_buku.php';</script>";
            }
            else {
                echo "<script>alert('Gagal');location.href='data_buku.php';</script>";
            }
        }
    }
    else{
        $input = mysqli_query($conn, "UPDATE buku SET nama_buku='".$nama_buku."', 
        pengarang='".$pengarang."', deskripsi='".$deskripsi."' where id_buku='".$id_buku."'");

        if ($input) {
            echo "<script>alert('Berhasil');location.href='data_buku.php';</script>";
        }
        else {
            echo "<script>alert('Gagal');location.href='data_buku.php';</script>";
        }
    }

?>