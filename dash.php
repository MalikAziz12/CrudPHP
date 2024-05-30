<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require 'function.php';
// $conn = mysqli_connect("localhost","root"," ","data");
$mahasiswa = mysqli_query($conn, "SELECT*FROM data");

if (isset($_POST["cari"])) {
  $mahasiswa = cari($_POST["keyword"]);
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <div class="cont-nav">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="dash.php">HOME</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="logout.php">LogOut</a>
            </li>
          </ul>
          <form class="d-flex" role="search" action="" method="post">
            <input class="form-control me-2" type="text" placeholder="input keyword" name="keyword" aria-label="Cari!!"
              autocomplete="off">
            <button class="btn btn-warning" type="submit" name="cari">Cari!!</button>
          </form>
        </div>
      </div>
    </nav>
  </div>

  <!-- <div class="main cf">
    <div class="contain_left">
       <ul class="admin">
        <li><a href="" style="font-size: 1.5rem;">Admin</a></li>
        <br>
        <li><a href="">Nilai Mahasiswa</a>
        </li>
         </li>
        <li><a href="">Informasi Pembayaran</a></li>
        <li><a href="">Nilai Setiap Matkul</a></li> -->

  <!-- </ul> -->
  <!-- </div> -->
  <div class="container">
    <div class="dashboard">
      <h1 style="text-align: center; margin-bottom:20px;">Nilai Mahasiswa</h1>
      <table class="table">
        <thead>
          <tr style="justify-content: center; text-align:center;">
            <th scope="col">Nim</th>
            <th scope="col">Nama</th>
            <th scope="col">Nilai</th>
            <th scope="col">Matkul</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php foreach ($mahasiswa as $bar): ?>
            <tr style="text-align: center;">
              <td>
                <?= $bar["Nim"]; ?>
              </td>
              <td>
                <?= $bar["Nama"]; ?>
              </td>
              <td>
                <?= $bar["Nilai"]; ?>
              </td>
              <td>
                <?= $bar["Matkul"]; ?>
              </td>
              <div class="action">
                <td style="color: white;"><button type="button" class="btn btn-danger"> <a
                      style="color: white; text-decoration:none;" href="hapus.php ? Nim=<?= $bar["Nim"] ?> "
                      onclick="return confirm('Yakin dihapus?')">Hapus</a></button>
                  <button type="button" class="btn btn-info edit"> <a style="color: white; text-decoration:none;"
                      href="edit.php ? Nim=<?= $bar["Nim"] ?>">Edit</a></button>
                </td>
              </div>

            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="cont-tamb">
        <div class="tambah" style="text-align: end; margin-right: 80px;">
          <button type="button" class="btn btn-success tambah"><a href="tambah.php" class="tambah"
              onclick="sweetalert();">Tambah</a></button>
          <button type="button" class="btn btn-warning tambah"><a href="print.php" target="_blank" class="tambah"
              onclick="sweetalert();">Print</a></button>
        </div>
      </div>
    </div>
  </div>
  <!-- Js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>