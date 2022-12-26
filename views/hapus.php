<?php
require_once '../functions/karyawan/function.php';
// Delete get Id
$object = new MongoDB\BSON\ObjectID($_GET['id']);
if (isset($_GET['id'])) {
    $karyawan = $db->karyawan->findOne(['_id' => $object]);
}
$karyawan = $db->karyawan->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
$_SESSION['success'] = "Data Mahasiswa Berhasil dihapus";
header("Location: ../index.php");
