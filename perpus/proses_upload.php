<?php
if($_POST){
$nama_buku=$_POST['nama_buku'];
$pengarang=$_POST['pengarang'];
$deskripsi=$_POST['deskripsi'];
$file_name=$_FILES['foto']['name'];
$file_tmp=$_FILES['foto']['tmp_name'];
$upload=move_uploaded_file($file_tmp,'images/'.$file_name);
if($upload){
include "koneksi.php";
$simpan=mysqli_query($conn,"insert into buku
    value('','$nama_buku','$pengarang','$deskripsi','$file_name')");
   
    if ($simpan){
        header('location:data_buku.php');
    }else{
        echo '<script>alert ("gagal upload");location.href="daftar_buku.php"</script>'; 
    }
    
}else{
echo '<script>alert ("gagal upload");location.href="daftar_buku.php"</script>';
}
}
?>