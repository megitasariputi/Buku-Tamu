<?php 
    require_once 'mysql_koneksi.php';

    // perintah SQL (4)
    $id = $_GET['idtamu'];

    // Perintah SQL
    $sql = "DELETE FROM tb_tamu WHERE id_tamu = '$id'";

    // Eksekusi Perintah menerapkan ke tabel
    if($conn->query($sql)===true){
        // header('location:halaman_buku_tamu.php');
        echo "<script>alert('Berhasil Terhapus');
        location.assign('halaman_buku_tamu.php');
        </script>";
    }
    else {
        echo "<script>alert('Gagal Terhapus');
        location.assign('halaman_buku_tamu.php');
        </script>";
    }

    
?>

