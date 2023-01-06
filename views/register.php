<?php
session_start();
require_once '../koneksi.php';
if (isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST["register"])) {

    global $client;

    $collection = $client->absensi_karyawan->karyawan;

    $insertOneResult = $collection->insertOne([

        'nama' => $_POST['nama'],
        'alamat' => $_POST['alamat'],
        'email' => $_POST['email'],
        'no_telp' => $_POST['no_telp'],
        'tgl_lahir' => $_POST['tgl_lahir'],
        'password' => $_POST['password'],

    ]);

    printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

    var_dump($insertOneResult->getInsertedId());
    header("Location: ../index.php");
    return $insertOneResult->getInsertedCount();
}
?>

<!doctype html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="img/lg3.png">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- css -->
        <link href="/css/signin.css" rel="stylesheet">

        <title>Absensi Koperasi | Register</title>

        <!-- Fonts & Icon-->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    </head>
</head>

<body>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">username / password salah</p>
    <?php endif; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="" action="" method="POST">
                    <div class="container">
                        <h1 class="text-center">Register</h1>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No. Telpon</label>
                            <input type="text" class="form-control" name="no_telp" id="no_telp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password: </label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>

                        <button type="submit" class="btn btn-dark" name="register">Submit</button>
                        <div class="mb-3 text-center">
                            <p>Sudah punya akun? <a href="../index.php">Login</a></p>
                        </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="footer" class="text-center">
        <small>Copyright &copy; 2022 - Pendidikan Teknik Informatika</small>

    </footer>
    <!-- ======= End  Footer -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
</body>

</html>