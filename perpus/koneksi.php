<?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="db_perpus";
    $conn=mysqli_connect($host,$user,$pass,$db);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
?> 
