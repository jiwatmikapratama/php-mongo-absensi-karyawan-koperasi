<?php
require 'vendor/autoload.php'; // include Composer's autoloader
// membuat koneksi ke mogo server

$client = new MongoDB\Client("mongodb://localhost:27017");
// memilih database yang ingin digunakan
$db = $client->absensi_karyawan;
