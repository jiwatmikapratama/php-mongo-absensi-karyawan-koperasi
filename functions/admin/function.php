<?php
require('../../koneksi.php');

function buatJadwal($dataKaryawan)
{
    global $client;

    $collection = $client->absensi_karyawan->absensi;

    $insertOneResult = $collection->insertOne([

        'nama' => $_POST['nama'],
        'tgl_absensi' => $_POST['tgl_absensi'],
        'karyawan' => [
            'id' => '',
            'nama_karyawan' => '',
            'status' => ''
        ]
    ]);

    printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

    var_dump($insertOneResult->getInsertedId());

    return $insertOneResult->getInsertedCount();
}

function updateKaryawan($dataKaryawan)
{
    global $client;

    $collection = $client->absensi_karyawan->karyawan;

    $updateOneResult = $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
        ['$set' => [
            'nama' => $_POST['nama'],
            'alamat' => $_POST['nama'],
            'tgl_lahir' => $_POST['tgl_lahir'],
            'no_telp' => [$_POST['no_telp']]
        ]]
    );

    // printf("Inserted %d document(s)\n", $updateOneResult->getUpdatedCount());

    // var_dump($updateOneResult->getUpdatedId());

    // return $updateOneResult->getUpdatedCount();
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

function hapusKaryawan($dataKaryawan)
{
    global $client;

    $collection = $client->absensi_karyawan->karyawan;

    $hapusOneResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

    // printf("Inserted %d document(s)\n", $updateOneResult->getUpdatedCount());

    // var_dump($updateOneResult->getUpdatedId());

    // return $updateOneResult->getUpdatedCount();
}
