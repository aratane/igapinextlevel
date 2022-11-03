<?php
session_start();
include "../../../../config/koneksi.php";

if ($_GET['aksi'] == "tambah") {
    $kode_petugas = $_POST['kodePetugas'];
    $nig = $_POST['nig'];
    $fullname = $_POST['namaLengkap'];
    $username = addslashes(strtolower($_POST['username']));
    $password = md5($_POST['password']);
    $alamat = $_POST['alamat'];
    $verif = "Tidak";
    $role = "Petugas";
    $petugas = "Perpustakaan";
    $join_date = date('d-m-Y');

    $sql = "INSERT INTO user(kode_user,nig,fullname,username,password,alamat,verif,role,petugas,join_date)
        VALUES('" . $kode_petugas . "','" . $nig . "','" . $fullname . "','" . $username . "','" . $password . "','" . $alamat . "','" . $verif . "','" . $role . "','" . $petugas . "','" . $join_date . "')";
    $sql .= mysqli_query($koneksi, $sql);

    if ($sql) {
        $_SESSION['berhasil'] = "Petugas berhasil ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Petugas gagal ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} else if ($_GET['aksi'] == "edit") {

    $id_user = $_POST['idUser'];
    $nig = htmlspecialchars($_POST['nig']);
    $nama_lengkap = htmlspecialchars(addslashes($_POST['namaLengkap']));
    $username = htmlspecialchars(strtolower($_POST['uSername']));
    $password = htmlspecialchars(trim($_POST['pAssword']));
    $petugas = htmlspecialchars(addslashes($_POST['pEtugas']));
    $alamat = htmlspecialchars(addslashes($_POST['aLamat']));

    $query = "UPDATE user SET nig = '$nig', fullname = '$nama_lengkap', username = '$username', 
          password = '$password', petugas = '$petugas', alamat = '$alamat'";

    $query .= "WHERE id_user = '$id_user'";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        $_SESSION['berhasil'] = "Data Petugas berhasil dirubah !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data Petugas gagal dirubah !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} else if ($_GET['aksi'] == "hapus") {
    $id_user = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = $id_user");

    if ($sql) {
        $_SESSION['berhasil'] = "Petugas berhasil di hapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Petugas gagal di hapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
