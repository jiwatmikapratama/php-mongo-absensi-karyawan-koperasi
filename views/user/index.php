<?php
session_start();
require_once '../../koneksi.php';

// memilih collecttion karyawan
$karyawanCollection = $db->karyawan;
$getDatakaryawan = $karyawanCollection->find();

// Memilih collection absensi
$absensiCollection = $db->absensi;
$getDataAbsensi = $absensiCollection->find();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Karyawan Koperasi</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <!-- <h1><?= $getDatakaryawanLogin ?></h1> -->
    <a href="../../functions/logout.php">Logout</a>
    <div class="container">

        <!-- User -->
        <h2>User</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal presensi</th>
                    <th scope="col">Status</th>

                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($getDataAbsensi as $absensi) { ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $absensi->nama ?></td>
                        <td><?= $absensi->tgl_absensi ?></td>
                        <td>
                            <?php if ($absensi->karyawan->status == '') {
                                echo "Belum absen";
                            } else {
                                echo $absensi->karyawan->status;
                            } ?>
                        </td>
                        <td>
                            <a href="absensi.php?id=<?= $absensi["_id"] ?>">Absen</a>
                        </td>

                    </tr>
                    <?php $i++ ?>
                <?php } ?>
            </tbody>
        </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>