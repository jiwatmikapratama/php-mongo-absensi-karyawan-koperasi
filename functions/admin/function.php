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

// function absensiKaryawan($dataKaryawan)
// {
//     global $client;

//     $collection = $client->absensi_karyawan->absensi;

//     $updateOneResult = $collection->updateOne(
//         ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
//         ['$set' => [
//             'karyawan' => [
//                 'id' =>  new MongoDB\BSON\ObjectID($_GET['id']),
//                 'nama' => $_POST['nama'],
//             ],

//             'status' => $_POST['status'],
//         ]]
//     );

//     // printf("Inserted %d document(s)\n", $updateOneResult->getUpdatedCount());

//     // var_dump($updateOneResult->getUpdatedId());

//     // return $updateOneResult->getUpdatedCount();
// }

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
