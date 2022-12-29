<?php
require_once '../../functions/karyawan/function.php';

$object = new MongoDB\BSON\ObjectID($_GET['id']);

if (isset($_GET['id'])) {
    $absensi = $db->absensi->findOne(['_id' => $object]);
}

if (isset($_POST['submit'])) {
    if (absensiKaryawan($_POST) > 0) {
        echo '<div class="alert alert-success" role="alert">
        Absensi berhasil direkam
      </div>';
        header("location: index.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">
        Absensi gagal silahkan coba lagi
      </div>';
    }
    $_SESSION['success'] = "Data Mahasiswa berhasil diubah";
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
</head>

<body>
    <div class="container">
        <div class="header text-center my-4">
            <h2>Absensi Karyawan</h2>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="id" name="id" value="<?= $absensi->_id; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $absensi->nama; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <input type="date" class="form-control" id="tgl_absensi" name="tgl_absensi" value="<?= $absensi->tgl_absensi; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" required value="">
                    </div>
                    <div class=" mb-3">
                        <select class="form-select" aria-label="Default select example" name="status" required>
                            <option selected value="">Status: </option>
                            <option value="hadir">Hadir</option>
                            <option value="tidak hadir">Tidak Hadir</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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