<?php
$conn = new mysqli('localhost', 'root', '', 'db_si');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id_informasi = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id_informasi) {
    die("ID Informasi tidak ditemukan.");
}

$sql1 = "DELETE FROM tb_sumber_informasi WHERE id_informasi = '$id_informasi'";

$sql2 = "DELETE FROM tb_informasi WHERE id_informasi = '$id_informasi'";

if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
    header("Location: tampil-data.php");
    exit;
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}

$conn->close();
?>
