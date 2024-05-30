<?php
// $conn = mysqli_connect("localhost","root","","dbmahasiswa");
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require 'function.php';
if (isset($_POST["submit"])) {
  if (tambah($_POST) > 0) {
    echo "
        <script>
        alert ('data berhasil di tambah');
        document.location.href='dash.php'
        </script>   
            ";
  } else {
    echo "
            <script> alert('data gagal'); 
            document.location.href='dash.php'
            </script>
        ";
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Tambah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<style>
  body {
    font-family: tahoma, sans-serif;
    background-image: url(./assest/img/patt-3.jpg);
    background-repeat: no-repeat;
  }

  .container {
    background-color: #978D97;
    background: transparent;
    backdrop-filter: blur(20px);
    margin-top: 40px;
    padding: 10px 10px;
    border: 2px solid whitesmoke;
    border-radius: 11px;
    width: 600px;
    height: auto;
  }

  .form {
    justify-content: center;
    padding: 0 30px;
    font-size: 15px;
    color: black;
  }

  .tmb {
    color: black;
  }
</style>

<body>
  <div class="container">
    <h1 style="text-align: center;" class="tmb">TAMBAH DATA</h1>
    <form class="form" action="" method="post">
      <div class="mb-3">
        <label class="form-label text-center" for="Nim">Nim</label>
        <input type="text" name="Nim" class="form-control" id="Nim" required placeholder="masukan Nim"
          autocomplete="off">
      </div>
      <div class="mb-3">
        <label class="form-label text-center" for="Nama">Nama</label>
        <input type="text" name="Nama" class="form-control" id="Nama" required placeholder="Masukan Nama"
          autocomplete="off">
      </div>
      <div class="mb-3">
        <label class="form-label text-center" for="Nilai">Nilai</label>
        <input type="text" class="form-control" name="Nilai" id="Nilai" required placeholder="Masukan Nilai"
          autocomplete="off">
      </div>
      <div class="mb-3">
        <label class="form-label text-center" for="Matkul">Mata Kuliah</label>
        <input type="text" class="form-control" name="Matkul" id="Matkul" required placeholder="Mata Kuliah"
          autocomplete="off">
      </div>
      <button class="btn btn-primary text-center" type="submit" name="submit" id="submit"
        onclick=" return confirm('apakah Sudah benar?');">Submit</button>
      <button class="btn btn-warning text-center" type="submit" name="submit" id="submit"><a href="dash.php"
          style="text-decoration: none; color:white;">Cancel</a></button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>