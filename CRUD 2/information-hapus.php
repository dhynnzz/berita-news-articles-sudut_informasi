<?php
include '../koneksi.php'; 

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $conn->prepare("DELETE FROM tb_kategori WHERE id_kategori = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: information.php?status=success&message=" . urlencode("Data berhasil dihapus!"));
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    header("Location: information.php?status=error&message=" . urlencode("ID tidak ditemukan!"));
    exit();
}
?>
