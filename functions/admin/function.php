<?php
require('../../koneksi.php');
require '../../redisBD.php';
$redis = new redisDB();
$dtkey = $dtvalue = null;
error_reporting(0);
function buatAbsensi($dataAbsensi)
{
    global $client;
    global $redis;

    $collection = $client->absensi_karyawan->absensi;

    $insertOneResult = $collection->insertOne([

        'nama' => $_POST['nama'],
        'tgl_absensi' => $_POST['tgl_absensi'],
        'karyawan' => []
    ]);

    $insertOneResult = $client->absensi_karyawan->log_absensi->insertOne([

        'nama' => $_POST['nama'],
        'tgl_absensi' => $_POST['tgl_absensi'],
        'karyawan' => []
    ]);

    $redis->InsertDataToKey($_POST['nama'], $_POST['tgl_absensi']);

    printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

    var_dump($insertOneResult->getInsertedId());

    return $insertOneResult->getInsertedCount();
}


function updateAbsensi($dataAbsensi)
{
    global $client;

    $collection = $client->absensi_karyawan->absensi;

    $updateOneResult = $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
        ['$set' => [
            'nama' => $_POST['nama'],
            'tgl_absensi' => $_POST['tgl_absensi'],
        ]]
    );

    // printf("Inserted %d document(s)\n", $updateOneResult->getUpdatedCount());

    // var_dump($updateOneResult->getUpdatedId());

    // return $updateOneResult->getUpdatedCount();
    $_SESSION["success"] = "Data Absensi Berhasil Diupdate";
    header("location: index.php");
}

function updateKaryawan($dataAbsensi)
{
    global $client;

    $collection = $client->absensi_karyawan->karyawan;

    $updateOneResult = $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
        ['$set' => [
            'nama' => $_POST['nama'],
            'alamat' => $_POST['alamat'],
            'email' => $_POST['email'],
            'no_telp' => $_POST['no_telp'],
            'tgl_lahir' => $_POST['tgl_lahir'],

        ]]
    );

    // printf("Inserted %d document(s)\n", $updateOneResult->getUpdatedCount());

    // var_dump($updateOneResult->getUpdatedId());

    // return $updateOneResult->getUpdatedCount();
    $_SESSION['success'] = "Data Karyawan berhasil diubah";
    header("location: index.php");
}


// if (isset($_GET['id'])) {
//     $mhs = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
// }
// if (isset($_POST['submit'])) {
//     require 'config.php';
//     $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
//     $_SESSION['success'] = "Data Mahasiswa Berhasil dihapus";
//     header("Location: index.php");
// }

function hapusAbsensi($dataKaryawan)
{
    global $client;

    $collection = $client->absensi_karyawan->absensi;

    $hapusOneResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

    // printf("Inserted %d document(s)\n", $updateOneResult->getUpdatedCount());

    // var_dump($updateOneResult->getUpdatedId());

    // return $updateOneResult->getUpdatedCount();
}
