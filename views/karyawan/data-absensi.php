<?php
session_start();
require_once '../../functions/admin/function.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
require_once '../../koneksi.php';

$object = new MongoDB\BSON\ObjectID($_GET['id']);

if (isset($_GET['id'])) {
    $absensi = $db->absensi->findOne(['_id' => $object]);
}

// Memilih collection list absensi
$absensiCollection = $db->absensi;
$getDataAbsensi = $absensiCollection->find(['_id' => $object]);


// $nama_karyawan = $_POST["nama"];
// $status = $_POST["status"];

?>

<!DOCTYPE html>
<html lang="en">

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

    <title>Absensi Koperasi | Data Absensi Koperasi <?= $absensi->nama ?></title>

    <!-- Fonts & Icon-->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Bagian Header --->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="#"></a><a href="#">KOPERASI</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <!-- <li><a class="nav-link scrollto" href="riwayat-absen.php">RIWAYAT ABSENSI</a></li> -->
                    <li><a class="nav-link scrollto" href="index.php">ABSENSI</a></li>
                    <li><a class="nav-link scrollto" href="../../functions/logout.php">LOGOUT</a></li>

                </ul>

                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>
    <!--End Header -->

    <!-- Table Absensi -->
    <div class="container mt-4">
        <h2>Data absensi koperasi <?= $absensi->nama ?></h2>
        <table class="table">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Status</th>
                    <!-- <th scope="col">Status</th> -->
                    <!-- <th scope="col">Aksi</th> -->
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $i = 1 ?>

                <?php foreach ($getDataAbsensi as $absensi) { ?>
                    <?php foreach ($absensi->karyawan as $data) { ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>

                            <td><?= $data['nama_karyawan'] ?></td>
                            <td><?= $data['status'] ?></td>
                        </tr>
                        <?php $i++ ?>
                    <?php } ?>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <h1><?= $_SESSION["login"]  ?></h1>
    <a href="../../functions/logout.php">Logout</a>


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