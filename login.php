<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location: dash.php");
    exit;
}
require('function.php');
if (isset($_POST["login"])) {
    $nama = $_POST["nama"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE nama = '$nama'");
    // cek apakah user sudah ada atau tidak

    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            $_SESSION["login"] = true;
            header("Location: dash.php");
            exit;
        }
    }
    $error = true;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM LOGIN</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            text-align: center;
            justify-content: center;
            background: linear-gradient(#9eaba2 0%, #a3a398 60%, #355070 100%);
        }

        H1 {
            text-align: center;
            margin-top: 8px;
            color: white;
        }

        .main {
            border: 2px solid white;
            border-radius: 5px;
            height: auto;
            width: 400px;
            text-align: center;
            margin: 10% auto;
            padding: 8px 8px;
        }

        .form-label {
            font-size: 1.3rem;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<?php if (isset($error)): ?>
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">WARNING!!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>User name password salah</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<body>
    <div class="main">
        <div class="container">
            <h1>FORM LOGIN</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp"
                        autocomplete="off">

                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="rememberme">

                </div>
                <button type="submit" class="btn btn-success" name="login" id="login">Login</button>
                <button type="submit" class="btn btn-primary" name="regist" id="regist"><a href="regrist.php"
                        style="text-decoration:none; color:white;">Regist now</a></button>
            </form>
        </div>
    </div>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>