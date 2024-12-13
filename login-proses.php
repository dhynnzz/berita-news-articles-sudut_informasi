<?php
include 'koneksi.php';
session_start();

if (isset($_POST['login'])) {
    if (isset($_POST['nama_pengelola']) && isset($_POST['password'])) {
        $nama_pengelola = trim($_POST['nama_pengelola']);
        $password = trim($_POST['password']);
        $sql = "SELECT * FROM tb_pengelola WHERE nama_pengelola = ?";
        $stmt = mysqli_prepare($koneksi, $sql);
        if (!$stmt) {
            die('Query Preparation Failed: ' . mysqli_error($koneksi));
        }
        mysqli_stmt_bind_param($stmt, 's', $nama_pengelola);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                $_SESSION['nama_pengelola'] = $row['nama_pengelola'];
                $_SESSION['id_pengelola'] = $row['id_pengelola'];
                header('Location: dashboard.php'); 
                exit();
            } else {
                $error = "Username atau password salah.";
            }
        } else {
            $error = "Username atau password salah.";
        }
    }
}
?>
