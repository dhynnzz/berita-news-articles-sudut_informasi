<?php
include '../koneksi.php';
$result = $conn->query("SELECT * FROM tb_kategori");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - tb_kategori</title>
    <link rel="stylesheet" href="../CSS/information.css">
</head>
<body>
    <h2>Daftar Kategori</h2>
    <a href="information-entry.php">Tambah Kategori</a>
    <a href="information-cetak.php">Cetak Data</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama_kategori']); ?></td>
                    <td><?= htmlspecialchars($row['deskripsi']); ?></td>
                    <td>
                        <a href="information-update.php?id=<?= $row['id_kategori']; ?>">Edit</a> |
                        <a href="information-hapus.php?id=<?= $row['id_kategori']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
