<?php
session_start();
require_once '../../functions/admin/function.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../../index.php");
    exit;
}
require_once '../../functions/admin/function.php';
// Delete get Id
$object = new MongoDB\BSON\ObjectID($_GET['id']);
if (isset($_GET['id'])) {
    $karyawan = $db->karyawan->findOne(['_id' => $object]);
}
$karyawan = $db->karyawan->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
$_SESSION['success'] = "Data karyawan Berhasil dihapus";
header("Location: index.php");
