<?php
require('../../koneksi.php');

function addKaryawan($dataKaryawan)
{
    global $client;

    $collection = $client->absensi_karyawan->karyawan;

    $insertOneResult = $collection->insertOne([

        'nama' => $_POST['nama'],
        'alamat' => $_POST['nama'],
        'tgl_lahir' => $_POST['tgl_lahir'],
        'no_telp' => [$_POST['no_telp']]

        // 'nama' => 'nama',
        // 'alamat' => 'test',
        // 'tgl_lahir' => '2021-01-01',
        // 'no_telp' => '0987272'
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
            'alamat' => $_POST['alamat'],
            'tgl_lahir' => $_POST['tgl_lahir'],
            'no_telp' => [$_POST['no_telp']]
        ]]
    );

    // printf("Inserted %d document(s)\n", $updateOneResult->getUpdatedCount());

    // var_dump($updateOneResult->getUpdatedId());

    // return $updateOneResult->getUpdatedCount();
}

function absensiKaryawan($dataKaryawan)
{
    global $client;

    $collection = $client->absensi_karyawan->absensi;;


    $updateOneResult = $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
        [
            '$push' => [
                'karyawan' => [
                    'nama_karyawan' => $_POST['nama_karyawan'],
                    'status' => $_POST['status']

                ],
            ]
        ],
    );
    $_SESSION["success"] = "Absensi berhasil dilakukan";
    header("location: index.php");
}

function hapusKaryawan($dataKaryawan)
{
    global $client;

    $collection = $client->absensi_karyawan->karyawan;

    $hapusOneResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

    // printf("Inserted %d document(s)\n", $updateOneResult->getUpdatedCount());

    // var_dump($updateOneResult->getUpdatedId());

    // return $updateOneResult->getUpdatedCount();
}
