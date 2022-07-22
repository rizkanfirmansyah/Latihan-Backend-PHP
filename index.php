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

// mysqli_close($conn);

// AMBIL DATA KE TABLE
$query = "SELECT * FROM siswa";
$data = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Sekolah</title>
</head>

<style>
    thead th {
        padding-left: 30px;
        padding-right: 30px;
        background-color: greenyellow;
    }

    td {
        text-align: center;
    }

    a {
        padding-left: 30px;
        padding-right: 30px;
        padding-top: 10px;
        padding-bottom: 10px;
        background-color: blue;
        color: white;
        text-align: center;
        display: block;
        width: 100px;
    }
</style>

<body>

    <h1>Aplikasi Sekolah</h1>
    <a href="insert.php">Tambah Data</a>
    <table border="1">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $value) : ?>
                <tr>
                    <td><?php echo $value['nik'] ?></td>
                    <td><?= $value['nama'] ?></td>
                    <td><?= $value['kelas'] ?></td>
                    <td><?= $value['jurusan'] ?></td>
                    <td><?= $value['alamat'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>