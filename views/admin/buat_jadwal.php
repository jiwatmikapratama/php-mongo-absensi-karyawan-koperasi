<?php
require_once '../../functions/admin/function.php';

if (isset($_POST['submit'])) {

    if (buatJadwal($_POST) > 0) {
        echo '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambahkan
      </div>';
        header("location: index.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">
        Data Gagal Ditambahkan
      </div>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
</head>

<body>
    <div class="container">
        <div class="header text-center my-4">
            <h2>Buat Absen</h2>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_absensi" class="form-label" for="tgl_absensi">Tanggal Absensi</label>
                        <input type="date" class="form-control" id="tgl_absensi" name="tgl_absensi" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Buat Absen</button>
                </form>
            </div>
            <div class="row">
                <div class="col-8">
                    <a href="index.php" class="btn btn-warning">Kembali</a>

                </div>
            </div>
        </div>
</body>

</html>