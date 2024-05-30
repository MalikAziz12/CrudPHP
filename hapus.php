<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function.php';
$nim = $_GET["Nim"];
if (hapus($nim) > 0) {
    echo "
    <script type='text/javascript'>
       alert('data berhasil dihapus');
        document.location.href='dash.php';
    </script>
    ";
} else {
    echo "
    <script> alert('data gagal di hapus'); 
    document.location.href='dash.php';
    </script>
    ";
}
?>

<!-- <script type='text/javascript'>
    setTimeout(function () {

        Swal.fire({
            icon: 'success',
            title: 'berhasil',
            text: 'data di simpan',
            timer: 3200,
            showConfirmButton: 'true'
        });
    }, 10);
    window.setTimeout(function () {
        document.location.href = 'dash.php';
    }, 3000);
</script> -->

<!-- js -->
<script src="./assest/sweetalert/sweetalert2.min.js"></script>
<script src="./assest/sweetalert/sweetalert2.min.css"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>