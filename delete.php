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

if (!empty($_GET['nik'])) {
    // condition
    $id = $_GET['nik'];
    $query = "DELETE FROM siswa WHERE nik=$id";

    $result = mysqli_query($conn, $query);

    $success = mysqli_affected_rows($conn);

    if ($success) {
        echo 'DATA BERHASIL DIHAPUS';
    } else {
        echo 'DATA GAGAL DIHAPUS';
    }
    return header('Location: index.php', true);
} else {
    // condition
    return header('Location: index.php', true);
}
