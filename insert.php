<?php

// ENVIRONMENT
$server = "localhost";
$database = "sekolah";
$username = "root";
$password = "";
$data = null;

// KONEKSI KE DATABASE
$conn = mysqli_connect($server, $username, $password, $database);

// CEK KONEKSI
if (!$conn) {
    echo "Koneksi ke Database gagal";
    die(mysqli_connect_error());
}

if (!empty($_GET['nik'])) {
    $nik = $_GET['nik'];
    $query = "SELECT * FROM siswa WHERE nik=$nik";
    $data = mysqli_query($conn, $query);
    $data = $data->fetch_assoc();
}

if (!empty($_GET['id'])) {
    if (!empty($_POST)) {
        $id = $_GET['id'];
        $query = "UPDATE siswa SET nama='{$_POST['nama']}', kelas='{$_POST['kelas']}', jurusan='{$_POST['jurusan']}', alamat='{$_POST['alamat']}' WHERE nik=$id";

        $result = mysqli_query($conn, $query);

        $success = mysqli_affected_rows($conn);

        if ($success) {
            echo 'DATA BERHASIL DIUPDATE';
        } else {
            echo 'DATA GAGAL DIUPDATE';
        }
    }
}

if (!empty($_POST) && empty($_GET['id'])) {
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
    form input {
        display: block;
        margin-bottom: 20px;
    }
</style>

<body>

    <!-- As a heading -->
    <nav class="navbar navbar-light bg-primary ">
        <div class="container">
            <span class="navbar-brand mb-0 h1 text-white">Aplikasi Pendataan Siswa</span>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <h1>Halaman Tambah Data</h1>
            <a href="index.php">Kembali</a>

            <form action="insert.php?id=<?= !empty($_GET['nik']) ? $_GET['nik'] : ""; ?>" method="POST">
                <label for="nik">NIK : </label>
                <input type="text" required name="nik" value="<?= $data !== null ? $data['nik'] : "" ?>" <?= $data !== null ? "disabled" : "" ?>>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" value="<?= $data !== null ? $data['nama'] : "" ?>">
                <label for="kelas">Kelas : </label>
                <input type="text" name="kelas" value="<?= $data !== null ? $data['kelas'] : "" ?>">
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" value="<?= $data !== null ? $data['jurusan'] : "" ?>">
                <label for="alamat">Alamat : </label> <br>
                <textarea name="alamat" id="alamat" cols="30" rows="10" value="<?= $data !== null ? $data['alamat'] : "" ?>"><?= $data !== null ? $data['alamat'] : "" ?></textarea> <br>
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</html>