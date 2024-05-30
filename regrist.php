<?php
require('function.php');

if (isset($_POST['regist'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert ('data berhasil di tambah');
        document.location.href='login.php';
        </script>   
        ";
    } else {
        echo mysqli_error($conn);
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM REGISTRATION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="regist.css">
</head>

<body>
    <h1>Form Registrasi</h1>
    <div class="main">
        <form class="row g-3" action="" method="post">
            <div class="col-12">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" required placeholder="nama anda"
                    autocomplete="off">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="col-md-6">
                <label for="password2" class="form-label">confirm Password</label>
                <input type="password" class="form-control" name="password2" id="password2" required>
            </div>
            <div class="col-12">
                <label for="email" class="form-label">Alamat email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="example@gmail.com"
                    required autocomplete="off">
            </div>
            <div class="col-12">
                <label for="domisili" class="form-label">Alamat domisili</label>
                <input type="text" name="domisili" class="form-control" id="domisili" placeholder="kota/prov" required
                    autocomplete="off">
            </div>
            <div class="col-md-4">
                <label for="nim" class="form-label">Nim</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="col-md-4">
                <label for="jeniskl" class="form-label">Jenis Kelamin</label>
                <select id="jeniskl" name="jeniskl" class="form-select">
                    <option selected>none</option>
                    <option>laki-laki</option>
                    <option>perempuan</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" name="kelas" id="kelas" required>
            </div>
            <!-- <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div> -->
            <div class="col-12">
                <button type="submit" name="regist" id="regist" class="btn btn-primary">Sign Up</button>
                <button type="submit" name="cancel" id="cancel" class="btn btn-warning"><a href="login.php"
                        style="text-decoration: none; color:white;">Cancel</a>
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>