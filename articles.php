<?php
session_start();
$id_pengelola = isset($_SESSION['id_pengelola']) ? $_SESSION['id_pengelola'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Informasi</title>
    <link rel="stylesheet" href="CSS/articles.css">
</head>
<body>
    <div class="form-container">
        <h2>Tambah Data Informasi</h2>
        <form action="articles-proses.php" method="POST">
            <input type="hidden" name="id_pengelola" value="<?php echo $id_pengelola; ?>">

            <label for="judul_informasi">Judul Informasi:</label>
            <input type="text" id="judul_informasi" name="judul_informasi" required>

            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <label for="nama_sumber">Nama Sumber:</label>
            <input type="text" id="nama_sumber" name="nama_sumber" required>

            <label for="alamat_sumber">Alamat Sumber:</label>
            <input type="text" id="alamat_sumber" name="alamat_sumber" required>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
