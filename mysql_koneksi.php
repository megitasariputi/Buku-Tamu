<?php 
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'db_myweb';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die('koneksi gagal'.$conn->connect_error);
    } 
    echo '';
?>