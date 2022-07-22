<?php

// ENVIRONMENT
$server = "localhost";
$database = "sekolah";
$username = "root";
$password = "";

// KONEKSI KE DATABASE
$conn = mysqli_connect($server, $username, $password, $database);

// CEK KONEKSI
if (!$conn) {
    echo "Koneksi ke Database gagal";
    die(mysqli_connect_error());
}

if (!empty($_POST)) {
    $query = "INSERT INTO siswa VALUES ({$_POST["nik"]}, '{$_POST['nama']}', '{$_POST['kelas']}', '{$_POST['jurusan']}', '{$_POST['alamat']}')";

    $result = mysqli_query($conn, $query);

    $success = mysqli_affected_rows($conn);

    if ($success) {
        echo 'DATA BERHASIL DISIMPAN';
    } else {
        echo 'DATA GAGAL DISIMPAN';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ini Halaman Tambah Data</title>
</head>

<style>
    form input {
        display: block;
        margin-bottom: 20px;
    }
</style>

<body>
    <h1>Halaman Tambah Data</h1>
    <a href="index.php">Kembali</a>

    <form action="" method="POST">
        <label for="nik">NIK : </label>
        <input type="text" name="nik">
        <label for="nama">Nama : </label>
        <input type="text" name="nama">
        <label for="kelas">Kelas : </label>
        <input type="text" name="kelas">
        <label for="jurusan">Jurusan : </label>
        <input type="text" name="jurusan">
        <label for="alamat">Alamat : </label> <br>
        <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea> <br>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>