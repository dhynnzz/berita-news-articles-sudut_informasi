<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_si'); // Sesuaikan dengan detail koneksi Anda

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari tabel `tb_informasi` dan `tb_sumber_informasi` dengan JOIN
$sql = "
    SELECT 
        tb_informasi.id_informasi,
        tb_informasi.judul_informasi,
        tb_informasi.tanggal,
        tb_sumber_informasi.id_sumber,
        tb_sumber_informasi.nama_sumber,
        tb_sumber_informasi.alamat_sumber
    FROM 
        tb_informasi
    JOIN 
        tb_sumber_informasi 
    ON 
        tb_informasi.id_informasi = tb_sumber_informasi.id_informasi
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Informasi</title>
    <link rel="stylesheet" href="css/tampil-data.css">
</head>
<body>
    <div class="layout">
        <!-- Sidebar -->
        <div class="sidebar">
            <ul>
                <li>Dashboard</li>
                <li><a href="articles.php">Articles</a></li>
                <li>User Management</li>
                <li><a href="CRUD 2/information.php">information</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="navbar">
                <a href="home.php">HOME</a>
                <a href="#">PROFILE</a>
                <a href="#">SETTINGS</a>
                <a href="logout.php">LOGOUT</a>
                <div class="profile-icon">👤</div>
            </div>

            <div class="table-container">
                <h2>Data Informasi</h2>
                <div class="tambah-data">
                    <a href="articles.php">Tambah Data</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Judul Informasi</th>
                            <th>Tanggal</th>
                            <th>Nama Sumber</th>
                            <th>Alamat Sumber</th>
                            <th>Aksi</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['judul_informasi']); ?></td>
                                    <td><?php echo $row['tanggal']; ?></td>
                                    <td><?php echo htmlspecialchars($row['nama_sumber']); ?></td>
                                    <td><?php echo htmlspecialchars($row['alamat_sumber']); ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id_informasi']; ?>" class="btn btn-edit">Edit</a>
                                        <a href="delete.php?id=<?php echo $row['id_informasi']; ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                    <td>
                                    <a href="CRUD 2/information-entry.php?id=<?php echo $row['id_informasi']; ?>" class="btn btn-edit">Tambah Kategori</a>
                                    
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">Tidak ada data.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>


<?php
// Tutup koneksi
$conn->close();
?>
