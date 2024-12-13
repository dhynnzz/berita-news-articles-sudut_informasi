<?php
session_start();  // Memulai sesi

// Hancurkan sesi
session_unset();  // Menghapus semua variabel sesi
session_destroy();  // Menghancurkan sesi

// Opsi: Menghapus cookie sesi (untuk langkah lebih aman)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]
    );
}

// Arahkan pengguna ke halaman login setelah logout
header("Location: login.php");
exit();
?>
