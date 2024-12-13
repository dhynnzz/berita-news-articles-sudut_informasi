<?php
session_start();
if (!isset($_SESSION['nama_pengelola'])) {
    header('Location: login.php');
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'db_si');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$judul_informasi = $_POST['judul_informasi'];
$tanggal = $_POST['tanggal'];
$nama_sumber = $_POST['nama_sumber'];
$alamat_sumber = $_POST['alamat_sumber'];
$id_pengelola = $_POST['id_pengelola'];

$sql1 = "INSERT INTO tb_informasi (id_pengelola, judul_informasi, tanggal) 
         VALUES ('$id_pengelola', '$judul_informasi', '$tanggal')";
if ($conn->query($sql1) === TRUE) {
    $id_informasi = $conn->insert_id;

    $sql2 = "INSERT INTO tb_sumber_informasi (id_informasi, nama_sumber, alamat_sumber) 
             VALUES ('$id_informasi', '$nama_sumber', '$alamat_sumber')";
    if ($conn->query($sql2) === TRUE) {
        header('Location: tampil-data.php');
        exit;
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$conn->close();
?>
