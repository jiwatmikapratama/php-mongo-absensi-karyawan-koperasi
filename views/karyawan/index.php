<?php
session_start();
require_once '../../functions/admin/function.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
require_once '../../koneksi.php';

// memilih collecttion karyawan
$karyawanCollection = $db->karyawan;
$getDatakaryawan = $karyawanCollection->find();

// Memilih collection absensi
$absensiCollection = $db->absensi;
$getDataAbsensi = $absensiCollection->find();


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

    <title>Absensi Koperasi</title>

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
                    <li><a class="nav-link scrollto active" href="index.php">ABSENSI</a></li>
                    <li><a class="nav-link scrollto" href="../../functions/logout.php">LOGOUT</a></li>

                </ul>

                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>
    <!--End Header -->

    <!-- Table Absensi -->
    <div class="container mt-4">
        <h2>Absen Karyawan</h2>
        <table class="table">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Presensi</th>
                    <!-- <th scope="col">Status</th> -->
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <!-- <?php // memilih collecttion karyawan
                        $absensiCollection = $db->absensi;
                        $cekabsen = $absensiCollection->find(['karyawan.nama_karyawan' => $nama_karyawan]);
                        ?> -->
                <?php foreach ($getDataAbsensi as $absensi) { ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $absensi->nama ?></td>
                        <td><?= date('d F Y', strtotime($absensi->tgl_absensi)) ?></td>
                        <!-- <td>
                            <?php if ($absensi->karyawan[1]->status == '') {
                                echo "Belum absen";
                            } else {
                                echo $absensi->karyawan->status;
                            } ?> 

                            <?php echo $absensi->karyawan[$i]->status ?>
                        </td> -->
                        <td class="text-center">
                            <a href="absensi.php?id=<?= $absensi["_id"] ?>" class="btn btn-warning">Absensi</a>
                            <a href="data-absensi.php?id=<?= $absensi["_id"] ?>" class="btn btn-primary">Lihat Data Absensi</a>
                        </td>

                    </tr>
                    <?php $i++ ?>
                <?php } ?>

            </tbody>
        </table>
    </div>

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