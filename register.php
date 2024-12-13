<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="container">
        <h1>SUDUT</h1>
        <h2>INFORMASI</h2>
        
        <!-- Form dimulai -->
        <form id="registrationForm" action="register-proses.php" method="post">
            <!-- Input untuk username -->
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username" required>

            <!-- Input untuk email -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" class="full-width" required>

            <!-- Input untuk password -->
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" class="full-width" required>

            <!-- Tombol Register -->
            <button type="submit" name="register">Register</button>
        </form>

        <!-- Pilihan login dengan media sosial -->
        <p>Sign In With</p>
        <div class="social-icons">
            <img src="gambar/twitter.png" alt="Twitter">
            <img src="gambar/instagram.png" alt="Instagram">
            <img src="gambar/facebook.png" alt="Facebook">
        </div>
    </div>
</body>
</html>
