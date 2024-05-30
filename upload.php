<?php
$gambar = upload();
if (!$gambar) {
    return false;
}

function upload()
{
    // membuat function upload gambar
    $namaFile = $_FILES['sesuai_nama_database']['name'];
    $ukuranFile = $_FILES['sesuai_nama_database']['size'];
    $tempatFile = $_FILES['sesuai_nama_database']['nama_tempat'];
    $error = $_FILES['sesuai_nama_database']['error'];

    //cek apakah tidak ada gambar yang di upload

    if ($error === 4) {
        echo "<script>
        alert('Upload gambar')
        </script>";
        return false;
    }
    // pengecekan jenis ekstensi gambarnya

    $gambarvalid = ['jpg', 'jpeg', 'png', 'dng'];
    $ekstensigambar = explode('.', $namaFile);
    $ekstensigambar = strtolower(end($ekstensigambar)); // memaksa string ke huruf kecil semua
    //dan end untuk mengambil data paling belakang 
    if (!in_array($ekstensigambar, $gambarvalid)) {
        //kasih pesan errornya
        echo "<script>
        alert('Upload harus gambar')
        </script>";
        return false;
    }

    //cek jika ukuran gambar over size

    if ($ukuranFile > 100000) { //dalam ukuran bite
        echo "<script>
        alert('ukuran gambar oversize')
        </script>";
        return false;
    }
    //lolos pengecekan daan gambar siap di aplod
    //jangan lupa generate nama gambar
    $namagambarbaru = uniqid();
    $namagambarbaru .= '.';
    $namagambarbaru .= $ekstensigambar;
    if (move_uploaded_file($tempatFile, 'img/' . $namagambarbaru)) { //
        return $namagambarbaru;
    }
}
?>