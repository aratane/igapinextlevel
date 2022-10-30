<?php
session_start();
include "../../../../config/koneksi.php";

if ($_GET['aksi'] == "tambah") {
    $kode_guru = $_POST['kodeGuru'];
    $nig = $_POST['nig'];
    $fullname = $_POST['namaLengkap'];
    $username = addslashes(strtolower($_POST['username']));
    $password = md5($_POST['password']);
    $jabatan = $_POST['jabatan'];
    $mapel = $_POST['mapel'];
    $alamat = $_POST['alamat'];
    $verif = "Tidak";
    $role = "Guru";
    $join_date = date('d-m-Y');

    $sql = "INSERT INTO user(kode_user,nig,fullname,username,password,jabatan,mapel,alamat,verif,role,join_date)
        VALUES('" . $kode_guru . "','" . $nig . "','" . $fullname . "','" . $username . "','" . $password . "','" . $jabatan . "','" . $mapel . "','" . $alamat . "','" . $verif . "','" . $role . "','" . $join_date . "')";
    $sql .= mysqli_query($koneksi, $sql);

    if ($sql) {
        $_SESSION['berhasil'] = "Guru berhasil ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Guru gagal ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} else if ($_GET['aksi'] == "edit") {

    $id_user = $_POST['idUser'];
    $nig = htmlspecialchars($_POST['nig']);
    $nama_lengkap = htmlspecialchars(addslashes($_POST['namaLengkap']));
    $username = htmlspecialchars(strtolower($_POST['uSername']));
    $password = htmlspecialchars(trim($_POST['pAssword']));
    $jabatan = htmlspecialchars(addslashes($_POST['jAbatan']));
    $mapel = htmlspecialchars(addslashes($_POST['mApel']));
    $alamat = htmlspecialchars(addslashes($_POST['aLamat']));

    $query = "UPDATE user SET nig = '$nig', fullname = '$nama_lengkap', username = '$username', 
          password = '$password', jabatan = '$jabatan', mapel = '$mapel', alamat = '$alamat'";

    $query .= "WHERE id_user = '$id_user'";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        $_SESSION['berhasil'] = "Data Guru berhasil dirubah !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data Guru gagal dirubah !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} else if ($_GET['aksi'] == "hapus") {
    $id_user = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = $id_user");

    if ($sql) {
        $_SESSION['berhasil'] = "Guru berhasil di hapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Guru gagal di hapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
