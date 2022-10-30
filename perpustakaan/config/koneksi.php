<?php
//------------------------------::::::::::::::::::::------------------------------\\
// Dibuat oleh DEV Team di IT CLUB SMK IGASAR PINDAD BANDUNG \\
//------------------------------::::::::::::::::::::------------------------------\\
$server = "localhost";
$username = "root";
$password = "";
$database = "db_igapin";

$koneksi = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
