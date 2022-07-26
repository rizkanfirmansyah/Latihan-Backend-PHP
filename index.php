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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <!-- As a heading -->
    <nav class="navbar navbar-light bg-primary ">
        <div class="container">
            <span class="navbar-brand mb-0 h1 text-white">Aplikasi Pendataan Siswa</span>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <h1>Aplikasi Sekolah</h1>
            <div class="row my-3">
                <div class="col-6">
                    <input type="text" class="form-control" placeholder="Cari data disini">
                </div>
                <div class="col-6 justify-content-end d-flex">
                    <a href="insert.php" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
            <table border="1" class="table table-hover">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>Tombol Aksi</th>
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
                            <td>
                                <a href="insert.php?nik=<?= $value['nik'] ?>" class="badge bg-warning">Edit</a>
                                <a href="delete.php?nik=<?= $value['nik'] ?>" class="badge bg-danger" onclick="confirm('APAKAH ANDA YAKIN?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>