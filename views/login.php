<?php
session_start();
require_once '../koneksi.php';
if (isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    // memilih collecttion karyawan
    $karyawanCollection = $db->karyawan;
    $getDatakaryawan = $karyawanCollection->find(array('email' => $email));
    $searchKaryawan = $getDatakaryawan;

    foreach ($searchKaryawan as $findKaryawan) {
        $storeEmail = $findKaryawan['email'];
        $storePassword = $findKaryawan['password'];
        $storeNama = $findKaryawan['nama'];
    }

    if ($email == $storeEmail && $password == $storePassword) {

        $_SESSION["login"] = true;
        // $_SESSION["email"] = $email;

        if ($row['email'] == "admin@gmail.com") {
            header("Location: ../../index.php");
            exit;
        } else {
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}



?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login Akun</title>
    <!-- Icon -->
    <link rel="shortcut icon" href="img/logo.jpeg" type="image/x-icon">
</head>

<body>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">username / password salah</p>
    <?php endif; ?>

    <form class="" action="" method="POST">
        <div class="container">
            <h1 class="text-center">Login Akun</h1>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password: </label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Konfirmasi Password: </label>
                <input type="password" class="form-control" name="password2" id="password2">
            </div>

            <button type="submit" class="btn btn-warning" name="login">Submit</button>
            <div class="mb-3 text-center">
                <p>Belum punya akun? <a href="registrasi.php">Daftar</a></p>
            </div>

    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>