<?php 
    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='login_petugas.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login_petugas.php';</script>";
        } else {
            include "../koneksi.php";
            $qry_login=mysqli_query($konn,"select * from petugas where username = '".$username."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_login)>0){
                $dt_login=mysqli_fetch_array($qry_login);
                
                if ($dt_login['role']=='petugas'){
                session_start();
                $_SESSION['id_petugas']=$dt_login['id_petugas'];
                $_SESSION['nama_petugas']=$dt_login['nama_petugas'];
                $_SESSION['status_login_petugas']=true;
                $_SESSION['role']=$dt_login['role'];
                header("location: home_petugas.php");
                } elseif ($dt_login['role']=='admin') {
                    session_start();
                    $_SESSION['id_petugas']=$dt_login['id_petugas'];
                    $_SESSION['nama_petugas']=$dt_login['nama_petugas'];
                    $_SESSION['status_login_admin']=true;
                    $_SESSION['role']=$dt_login['role'];
                    header("location: home_admin.php");
            } else {
                echo "<script>alert('Username dan Password tidak benar');location.href='login_petugas.php';</script>";
            }
        }
    }
}
?>


<?php
session_start();
if($_SESSION['status_login_petugas'] == false){
    echo "<script>location.href='login_petugas.php';</script>";
}
?>



