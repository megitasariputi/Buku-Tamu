<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="form_latihan7a.css">

    <title>Document</title>
</head>

<body>
    <div class="tengah" align="center">

        <div class="header" align="center">
            <h1>Form Login<h1>
        </div>

        <div class="navigationbar"></div>

        <div class="konten" align="center">

            <div class="content">
                <?php
                    if (isset($_SESSION['log'])) :  ?>
                        <?php
                        if ($_SESSION['log'] == 0) {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $_SESSION['msg_log']; ?>
                            </div>
                        <?php
                        }
                        ?>
                    <?php
                    endif;
                    ?>
            </div>

            <div class="maincontent">

                <!-- echo biasa -->
                <!-- <?php
                        // if (isset($_GET['pesan'])) {
                        //     if ($_GET['pesan'] == "gagal") {
                        //         echo "Login gagal! username atau password salah!";
                        //     }
                        // }
                        ?> -->

                <form action="login.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="user" class="form-control" placeholder="Masukan Username/Email" required />
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="Masukan Password" required />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-dark">Login</button>
                    </div>
                </form>
            </div>

            <div class="content2"></div>

        </div>

        <div class="footer">BLK Bekasi</div>

    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>

</html>