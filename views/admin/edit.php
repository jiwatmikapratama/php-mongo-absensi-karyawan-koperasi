<?php
require_once '../../functions/admin/function.php';

$object = new MongoDB\BSON\ObjectID($_GET['id']);

if (isset($_GET['id'])) {
    $karyawan = $db->karyawan->findOne(['_id' => $object]);
}

if (isset($_POST['submit'])) {
    if (updateAbsensi($_POST) > 0) {
        echo '<div class="alert alert-success" role="alert">
        Data Karyawan Berhasil Diupdate
      </div>';
        header("location: ../index.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">
        Data Karyawan Gagal Diupdate
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
            <h2>Ubah Absensi</h2>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="id" name="id" value="<?= $karyawan->_id; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required value="<?= $karyawan->nama; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_absensi" class="form-label">tgl_absensi</label>
                        <input type="text" class="form-control" id="tgl_absensi" name="tgl_absensi" required value="<?= $absensi->tgl_absensi; ?>">
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