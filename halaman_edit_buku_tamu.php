<?php
require_once 'mysql_koneksi.php';

$id = $_GET['idtamu'];
$sql = "SELECT * FROM tb_tamu WHERE id_tamu='$id'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    $nama = $row['nama_tamu'];
    $email = $row['email_tamu'];
    $pesan = $row['pesan_tamu'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h3>Form Edit Buku Tamu</h3>
        </div>
        <div class="card-body">
            <form action="proses_update_buku_tamu.php" method="POST">
                <div class="form-group">
                    <input type="text" name="id" class="form-control" required readonly value="<?= $_GET['idtamu']; ?>" />
                </div>
                <div class="form-group">
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Masukan Email" required />
                </div>
                <div class="form-group">
                    <textarea type="text" name="pesan" class="form-control" placeholder="Masukan Pesan dan Kesan Anda" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-dark">Edit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>