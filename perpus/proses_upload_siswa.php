<?php
if($_POST){
$nama_siswa=$_POST['nama_siswa'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$alamat=$_POST['alamat'];
$gender=$_POST['gender'];
$username=$_POST['username'];
$password= $_POST['password'];
$id_kelas=$_POST['id_kelas'];

include "koneksi.php";
$simpan=mysqli_query($conn,"insert into siswa
    value('','$nama_siswa','$tanggal_lahir','$alamat','$gender','$username','$password','$id_kelas')");
   
    if ($simpan){
        echo '<script>alert ("tambah siswa berhasil");location.href="tampil_siswa.php"</script>'; 
    
    }else{
        echo '<script>alert ("gagal tambah siswa");location.href="tampil_siswa.php"</script>'; 
    }
} 


?>