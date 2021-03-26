<?php 
    require_once 'mysql_koneksi.php';

    session_start();

    // perintah SQL (4)
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO tb_tamu VALUES('',
    '$nama','$email','$pesan')";

    // Eksekusi Perintah menampilkan ke tabel
    if($conn->query($sql)===true){
        $_SESSION['update_status'] = 1;
        $_SESSION['update_message'] = '<strong>Berhasil!</strong>Data berhasil tersimpan';
        // header('location:halaman_buku_tamu.php');
        echo "<script>alert('Berhasil Tersimpan');
        location.assign('halaman_buku_tamu.php');
        </script>";
    }
    else {
        $_SESSION['update_status'] = 0;
        $_SESSION['update_message'] = '<strong>Gagal!</strong>Data gagal tersimpan';
        echo "<script>alert('Gagal Tersimpan');
        location.assign('halaman_buku_tamu.php');
        </script>";
    }

    // // perintah SQL (3)
    // $nama = 'pouty';
    // $email = 'pouty@gmail.com';
    // $pesan = 'mangat';

    // $sql = "INSERT INTO tb_tamu VALUES('',
    // '$nama','$email','$pesan')";

    // // Perintah SQL (1)
    // $sql = "INSERT INTO tb_tamu VALUES('',
    // 'Puti Megitasari','putimegitasari@gmail.com',
    // 'Semangat')"; 

    // Eksekusi Perintah (temen 1 dan 3)
    // if($conn->query($sql) === true){
    //     echo '<hr/>';
    //     echo 'berhasil tersimpan';
    // }
    // else {
    //     echo '<hr/>';
    //     echo 'yah, tidak tersimpan';
    // }
?>

