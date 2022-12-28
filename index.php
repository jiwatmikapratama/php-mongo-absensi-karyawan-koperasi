<?php
session_start();
require_once 'koneksi.php';

// memilih collecttion karyawan
$karyawanCollection = $db->karyawan;
$getDatakaryawan = $karyawanCollection->find();

// Memilih collection absensi
$absensiCollection = $db->absensi;
$getDataabsesi = $absensiCollection->find();




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
    <h1><?= $_SESSION['login'] ?></h1>
    <div class="container">
        <!-- Admin -->
        <h2>Admin</h2>
        <table class="table">
            <thead>
                <tr>
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
                        <td><?= $karyawan->tgl_lahir ?></td>
                        <td>
                            <a href="views/admin/edit.php?id=<?= $karyawan["_id"] ?>">Ubah Data</a>
                            <a href="views/admin/hapus.php?id=<?= $karyawan["_id"] ?>" onclick="confirm('Yakin?')">Hapus Data</a>
                        </td>

                    </tr>
                    <?php $i++ ?>
                <?php } ?>
            </tbody>
        </table>
        <a href="views/admin/tambah.php">Buat Jadwal</a>

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
                <?php foreach ($getDataabsesi as $absensi) { ?>
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
                            <a href="views/admin/edit.php?id=<?= $karyawan["_id"] ?>">Ubah Data</a>
                            <a href="views/admin/hapus.php?id=<?= $karyawan["_id"] ?>" onclick="confirm('Yakin?')">Hapus Data</a>
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