<?php
require_once 'mysql_koneksi.php';
session_start();

if(!isset($_SESSION['log'])){
    header('location:form_login.php');
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h3>Form Input Buku Tamu</h3>
            <a href="logout.php">Logout</a>
        </div>

        <div class="card-body">
            <form action="proses_insert_buku_tamu.php" method="POST">

                <?php
                if (isset($_SESSION['update_status'])) {
                ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <?= $_SESSION['update_message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }  unset($_SESSION['update_status']);
                ?>

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
            if (isset($_SESSION['update_status'])) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['update_message']; ?>
                    <button type="button" class="close alert-primary" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }
            unset($_SESSION['update_status']);
            ?>

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
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal" data-id="<?= $row['id_tamu']; ?>" data-nama="<?= $row['nama_tamu']; ?>" data-email="<?= $row['email_tamu']; ?>" data-pesan="<?= $row['pesan_tamu']; ?>"><i class="fas fa-edit" onclick="return confirm('Sudah yakin dengan pilihan mu? yakin mau edit?')"></i></button>
                                        <a href="halaman_edit_buku_tamu.php?idtamu=<?= $row['id_tamu']; ?>" class="btn btn-dark btn-sm disabled"><i class="fas fa-edit" onclick="return confirm('Sudah yakin dengan pilihan mu? yakin mau edit?')"></i></a>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="proses_update_buku_tamu.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="id" class="form-control edit-id" required readonly />
                        </div>
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control edit-nama" placeholder="Masukan Nama" required />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control edit-email" placeholder="Masukan Email" required />
                        </div>
                        <div class="form-group">
                            <textarea type="text" name="pesan" class="form-control edit-pesan" placeholder="Masukan Pesan dan Kesan Anda" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-dark btn-block">Edit</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                pageLength: 5,
            });


            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id') // Extract info from data-* attributes
                var nama = button.data('nama')
                var email = button.data('email')
                var pesan = button.data('pesan')
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-body .edit-id').val(id)
                modal.find('.modal-body .edit-nama').val(nama)
                modal.find('.modal-body .edit-email').val(email)
                modal.find('.modal-body .edit-pesan').html(pesan)

            })
            $('.alert').delay(500).fadeOut(2000);
        });
    </script>
</body>

</html>