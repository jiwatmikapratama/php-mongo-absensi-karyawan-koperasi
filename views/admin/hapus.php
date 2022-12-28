<?php
require_once '../../functions/admin/function.php';
// Delete get Id
$object = new MongoDB\BSON\ObjectID($_GET['id']);
if (isset($_GET['id'])) {
    $absensi = $db->absensi->findOne(['_id' => $object]);
}
$absensi = $db->absensi->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
$_SESSION['success'] = "Data Absensi Berhasil dihapus";
header("Location: index.php");
