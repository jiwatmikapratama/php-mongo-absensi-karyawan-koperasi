<?php
session_start();
require_once '../../functions/admin/function.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
require_once '../../functions/admin/function.php';

$object = new MongoDB\BSON\ObjectID($_GET['id']);

if (isset($_GET['id'])) {
    $karyawan = $db->karyawan->findOne(['_id' => $object]);
}

if (isset($_POST['submit'])) {
    if (updateKaryawan($_POST) > 0) {
        echo '<div class="alert alert-success" role="alert">
        Data Karyawan Berhasil Diupdate
      </div>';
        header("location: index.php");
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

    <title>Absensi Koperasi | Edit Data Karyawan</title>

    <!-- Fonts & Icon-->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="header text-center my-4">
            <h2>Ubah Data <?= $karyawan->nama; ?></h2>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $karyawan->_id; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required value="<?= $karyawan->nama; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required value="<?= $karyawan->alamat; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="text" class="form-control" id="email" name="email" required value="<?= $karyawan->email; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">no_telp</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" required value="<?= $karyawan->no_telp; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label">tgl_lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required value="<?= $karyawan->tgl_lahir; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="text" class="form-control" id="password" name="password" required value="<?= $karyawan->password; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <a href="index.php" class="btn btn-warning">Kembali</a>
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