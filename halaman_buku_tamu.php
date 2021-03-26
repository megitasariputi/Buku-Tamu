<?php
require_once 'mysql_koneksi.php';
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h3>Form Input Buku Tamu</h3>
        </div>
        <div class="card-body">
            <form action="proses_insert_buku_tamu.php" method="POST">
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
                    <button type="submit" class="btn btn-outline-dark">Submit</button>
                </div>
            </form>

            <?php
            $sql = "SELECT * FROM tb_tamu ORDER BY id_tamu ASC";
            $result = $conn->query($sql);
            ?>

            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>id</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pesan/Komentar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['id_tamu']; ?></td>
                                <td><?= $row['nama_tamu']; ?></td>
                                <td><?= $row['email_tamu']; ?></td>
                                <td><?= $row['pesan_tamu']; ?></td>
                                <td align="center">
                                    <div class="btn-group">
                                        <a href="proses_delete_buku_tamu.php?idtamu=<?= $row['id_tamu']; ?>" onclick="return confirm('Sudah yakin dengan pilihan mu? yakin mau apus?')" class="btn btn-dark btn-sm"><i class="fas fa-trash"></i></a>
                                        <a href="halaman_edit_buku_tamu.php?idtamu=<?= $row['id_tamu']; ?>" class="btn btn-dark btn-sm"><i class="fas fa-edit" onclick="return confirm('Sudah yakin dengan pilihan mu? yakin mau edit?')"></i></a>
                                    </div>
                                </td>
                            </tr>
                    <?php
                            $no++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                pageLength: 5,
            });
        });
    </script>
</body>

</html> 
