<?php 
    require_once 'mysql_koneksi.php';

    session_start();

    // perintah SQL (4)
    $id = $_GET['idtamu'];

    // Perintah SQL
    $sql = "DELETE FROM tb_tamu WHERE id_tamu = '$id'";

    // Eksekusi Perintah menerapkan ke tabel
    if($conn->query($sql)===true){
        $_SESSION['update_status'] = 1;
        $_SESSION['update_message'] = '<strong>Berhasil!</strong>Data berhasil terhapus';
        // header('location:halaman_buku_tamu.php');
        echo "<script>alert('Berhasil Terhapus');
        location.assign('halaman_buku_tamu.php');
        </script>";
    }
    else {
        $_SESSION['update_status'] = 0;
        $_SESSION['update_message'] = '<strong>Gagal!</strong>Data gagal terhapus';
        echo "<script>alert('Gagal Terhapus');
        location.assign('halaman_buku_tamu.php');
        </script>";
    }

    
?>

