<?php
    $server="localhost";
    $user="root";
    $pass="";
    $db="miniprojet";
    $conn=new mysqli($server,$user,$pass,$db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        echo "";
    }
?>