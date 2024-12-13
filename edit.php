<?php
$conn = new mysqli('localhost', 'root', '', 'db_si');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id_informasi = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id_informasi) {
    die("ID Informasi tidak ditemukan.");
}

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
    WHERE 
        tb_informasi.id_informasi = '$id_informasi'
";

$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Data tidak ditemukan.");
}

$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul_informasi = $_POST['judul_informasi'];
    $tanggal = $_POST['tanggal'];
    $nama_sumber = $_POST['nama_sumber'];
    $alamat_sumber = $_POST['alamat_sumber'];

    $sql1 = "
        UPDATE tb_informasi 
        SET 
            judul_informasi = '$judul_informasi', 
            tanggal = '$tanggal' 
        WHERE 
            id_informasi = '$id_informasi'
    ";

    $sql2 = "
        UPDATE tb_sumber_informasi 
        SET 
            nama_sumber = '$nama_sumber', 
            alamat_sumber = '$alamat_sumber' 
        WHERE 
            id_informasi = '$id_informasi'
    ";

    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        header("Location: tampil-data.php");
        exit;
    } else {
        echo "
        <div class='error-message'>
            <h3>Terjadi kesalahan!</h3>
            <p>Data gagal diperbarui. Coba lagi atau periksa koneksi.</p>
            <a href='tampil-data.php' class='btn-back'>Kembali ke Tabel</a>
        </div>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Informasi</title>
    <link rel="stylesheet" href="css/edit.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit Data Informasi</h2>
        <form action="" method="POST">
            <label for="judul_informasi">Judul Informasi:</label>
            <input type="text" id="judul_informasi" name="judul_informasi" value="<?php echo htmlspecialchars($row['judul_informasi']); ?>" required>

            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>" required>

            <label for="nama_sumber">Nama Sumber:</label>
            <input type="text" id="nama_sumber" name="nama_sumber" value="<?php echo htmlspecialchars($row['nama_sumber']); ?>" required>

            <label for="alamat_sumber">Alamat Sumber:</label>
            <input type="text" id="alamat_sumber" name="alamat_sumber" value="<?php echo htmlspecialchars($row['alamat_sumber']); ?>" required>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
