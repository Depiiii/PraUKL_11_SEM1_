<?php 
    if($_POST){
        $email=$_POST['email'];
        $password=$_POST['password'];
        if(empty($email)){
            echo "<script>alert('email tidak boleh kosong');location.href='login.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
        } else {
            include "../koneksi.php";
            $qry_login=mysqli_query($konn,"select * from pelanggan where email = '".$email."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_login)>0){
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['id_pelanggan']=$dt_login['id_pelanggan'];
                $_SESSION['nama_pelanggan']=$dt_login['nama_pelanggan'];
                $_SESSION['password']=$dt_login['password'];
                $_SESSION['status_login']=true;
                header("location: home.php");
            } else {
                echo "<script>alert('email dan Password tidak benar');location.href='login.php';</script>";
            }
        }
    }
?>