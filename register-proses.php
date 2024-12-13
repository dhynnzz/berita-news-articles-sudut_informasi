<?php
$conn = new mysqli("localhost", "root", "", "db_si");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama_pengelola = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql_check = "SELECT * FROM tb_pengelola WHERE email = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $email);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    echo "<script>
        alert('Email sudah terdaftar!');
        window.location = 'register.php';
    </script>";
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tb_pengelola (nama_pengelola, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nama_pengelola, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "<script>
            alert('Registrasi berhasil!');
            window.location = 'login.php';
        </script>";
    } else {
        echo "<script>
            alert('Terjadi kesalahan saat menyimpan data!');
            window.location = 'register.php';
        </script>";
    }
}

$conn->close();
?>
