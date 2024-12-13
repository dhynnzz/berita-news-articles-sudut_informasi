<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_kategori = $_POST['nama_kategori'];
    $deskripsi = $_POST['deskripsi'];

    $stmt = $conn->prepare("INSERT INTO tb_kategori (nama_kategori, deskripsi) VALUES (?, ?)");
    $stmt->bind_param("ss", $nama_kategori, $deskripsi);

    if ($stmt->execute()) {
        header("Location: information.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <link rel="stylesheet" href="../CSS/information-entry.css">
</head>
<body>
    <h2>Tambah Kategori</h2>
    <form method="POST">
        <label for="nama_kategori">Nama Kategori:</label><br>
        <input type="text" id="nama_kategori" name="nama_kategori" required><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi" rows="4" cols="50"></textarea><br><br>

        <button type="submit">Simpan</button>
        <a href="information.php"class = "kembali">Kembali</a>
    </form>
    
</body>
</html>
