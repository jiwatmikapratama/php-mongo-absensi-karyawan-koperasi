<?php
session_start();
require_once '../../functions/admin/function.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../../index.php");
    exit;
}
require_once '../../koneksi.php';

// memilih collecttion karyawan
$karyawanCollection = $db->karyawan;
$getDatakaryawan = $karyawanCollection->find();

// Memilih collection absensi
$absensiCollection = $db->absensi;
$getAbsensi = $absensiCollection->find();

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

    <title>Absensi Koperasi | Dashboard</title>

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
                    <li><a class="nav-link scrollto active" href="index.php">MENU ADMIN</a></li>
                    <li><a class="nav-link scrollto" href="../../functions/logout.php">LOGOUT</a></li>

                </ul>

                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>
    <!--End Header -->
    </head>

    <body>
        <!-- <h1><?= $getDatakaryawanLogin ?></h1> -->
        <div class="container">
            <!-- Admin -->
            <h2>Data Karyawan</h2>
            <table class="table">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. Telp</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($getDatakaryawan as $karyawan) { ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $karyawan->nama ?></td>
                            <td><?= $karyawan->alamat ?></td>
                            <td><?= $karyawan->no_telp ?></td>
                            <td><?= $karyawan->email ?></td>
                            <td><?= date('d F Y', strtotime($karyawan->tgl_lahir)) ?></td>
                            <td class="text-center">
                                <a href="editKaryawan.php?id=<?= $karyawan["_id"] ?>" class="btn btn-warning">Ubah Data</a>
                                <a href="hapusKaryawan.php?id=<?= $karyawan["_id"] ?>" onclick="confirm('Yakin?')" class="btn btn-danger">Hapus Data</a>
                            </td>

                        </tr>
                        <?php $i++ ?>
                    <?php } ?>
                </tbody>
            </table>
            <a href="buatAbsensi.php" class="btn btn-primary">Buat Absensi</a>

            <!-- Jadwal -->
            <table class="table mt-3">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal presensi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($getAbsensi as $absensi) { ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $absensi->nama ?></td>
                            <td><?= date('d F Y', strtotime($absensi->tgl_absensi)) ?></td>
                            <td class="text-center">
                                <a href="editAbsensi.php?id=<?= $absensi["_id"] ?>" class="btn btn-warning">Ubah Absensi</a>
                                <a href="hapusAbsensi.php?id=<?= $absensi["_id"] ?>" onclick="confirm('Yakin?')" class="btn btn-danger">Hapus Absensi</a>
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