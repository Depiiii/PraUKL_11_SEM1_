<?php
if($_POST){
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(empty($email)){
        
        echo "<script>alert('Email tidak boleh kosong');location.href='login_admin.php';</script>";
    }elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='login_admin.php';</script>";
    } else{
        include "koneksi.php";
            $qry_login=mysqli_query($conn,"select * from petugas where email = '".$email."' and password = '".md5($password) ."'");  //untuk mengeksekusi (delete,)
        if(mysqli_num_rows($qry_login)>0){
            $dt_login=mysqli_fetch_array($qry_login);
            session_start();
            $_SESSION['id_petugas']=$dt_login['id_petugas']; //menyimpan data agar tersimpan lebih lama session
            $_SESSION['nama_petugas']=$dt_login['nama_petugas'];
            $_SESSION['status_login_admin']=true; 
            $_SESSION['role']=$dt_login['role'];
            header("location: home_admin.php");
        } else {
            echo "<script>alert('email dan Password tidak benar');location.href='login_admin.php';</script>";
        }
    }
    }
else {
    echo "no";
}
?>