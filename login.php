<?php
    include 'koneksi_mysql.php';

    session_start();

    $username = $_POST['user'];
    $password = $_POST['pass'];

    $login = "SELECT * FROM tb_user WHERE (username='$username' OR email='$username') AND password='$password'";
    $cek = $conn->query($login);

    if($cek->num_rows > 0){
        $_SESSION['log'] = '1';
        $_SESSION['msg_log'] = 'Halo, ada kabar baik nih. Kamu berhasil login.'; 
        header("location:halaman_buku_tamu.php");
    }
    else {
        $_SESSION['log'] = '0';
        $_SESSION['msg_log'] = 'Halo, silahkan dicek kembali username/password mu';
        header("location:form_login.php?pesan=gagal");
    }
?>