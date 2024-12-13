<?php
include '../koneksi.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: information.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM tb_kategori WHERE id_kategori = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Data tidak ditemukan.");
}

$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_kategori = $_POST['nama_kategori'];
    $deskripsi = $_POST['deskripsi'];

    $stmt = $conn->prepare("UPDATE tb_kategori SET nama_kategori = ?, deskripsi = ? WHERE id_kategori = ?");
    $stmt->bind_param("ssi", $nama_kategori, $deskripsi, $id);

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
    <title>Edit Kategori</title>
    <link rel="stylesheet" href="../CSS/information-update.css">
</head>
<body>
    <h2>Edit Kategori</h2>
    <form method="POST">
        <label for="nama_kategori">Nama Kategori:</label><br>
        <input type="text" id="nama_kategori" name="nama_kategori" value="<?= htmlspecialchars($row['nama_kategori']); ?>" required><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi" rows="4" cols="50"><?= htmlspecialchars($row['deskripsi']); ?></textarea><br><br>

        <button type="submit">Simpan</button>
        <a href="information.php"class = "update">Kembali</a>
    </form>
</body>
</html>
