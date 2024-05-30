<?php
// session_start();
// if (!isset($_SESSION["login"])) {
//     header("Location: login.php");
//     exit;
// }
$conn = mysqli_connect("localhost", "root", "", "dbmahasiswa");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $kotak = [];
    while ($bar = mysqli_fetch_assoc($result)) {
        $kotak[] = $bar;
    }
    return $kotak;
}

function hapus($nim)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM data WHERE Nim = $nim");
    return mysqli_affected_rows($conn);
}

function tambah($add)
{
    global $conn;
    $nim = htmlspecialchars($add["Nim"]);
    $nama = htmlspecialchars($add["Nama"]);
    $nilai = htmlspecialchars($add["Nilai"]);
    $matkul = htmlspecialchars($add["Matkul"]);

    $query = "INSERT INTO data VALUES ($nim,'$nama',$nilai,'$matkul')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit($edit)
{
    global $conn;
    $nim = htmlspecialchars($edit["Nim"]);
    $nama = htmlspecialchars($edit["Nama"]);
    $nilai = htmlspecialchars($edit["Nilai"]);
    $matkul = htmlspecialchars($edit["Matkul"]);

    $query = "UPDATE data SET 
    Nim = '$nim',
    Nama = '$nama', 
    Nilai = '$nilai', 
    Matkul = '$matkul'
    WHERE Nim = $nim
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function cari($keyword)
{

    $query = "SELECT * FROM data
    WHERE
    Nama LIKE '%$keyword%' OR
    Nim LIKE '%$keyword%' OR
    Nilai LIKE '%$keyword%' OR
    Matkul LIKE '%$keyword%' 
    ";
    return query($query);
}
function registrasi($data)
{
    global $conn;

    $nama = strtolower(stripcslashes($data["nama"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $passwordconfirm = mysqli_real_escape_string($conn, $data["password2"]);
    $email = strtolower(stripcslashes($data["email"]));
    $jkl = strtolower(stripcslashes($data["jeniskl"]));
    $alamat = strtolower(stripcslashes($data["domisili"]));
    $nimregist = strtolower(stripcslashes($data["nim"]));


    // cek jika user name sudah ada

    $result = mysqli_query($conn, "SELECT nama FROM users WHERE nama = '$nama' ");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert ('data sudah ada'); </script>";
        return false;
    }
    if ($password !== $passwordconfirm) {
        echo "<script>
        alert ('Password tidak sama'); </script>";
        return false;
    }

    // enkripis password

    $password = password_hash($password, PASSWORD_DEFAULT);

    // input data

    mysqli_query($conn, "INSERT INTO users VALUES ('','$nama','$password','$email','$jkl','$alamat','$nimregist')");

    return mysqli_affected_rows($conn);
}

?>