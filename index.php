<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudut Informasi - Portal Informasi Terpercaya</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar Styles */
        .navbar {
            background: #2c3e50;
            padding: 1rem 2rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .navbar .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #3498db;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('/api/placeholder/1200/600');
            height: 100vh;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 0 1rem;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .cta-button {
            background: #3498db;
            color: white;
            padding: 1rem 2rem;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .cta-button:hover {
            background: #2980b9;
        }

        /* Features Section */
        .features {
            padding: 5rem 2rem;
            background: #f9f9f9;
        }

        .features-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .features h2 {
            text-align: center;
            margin-bottom: 3rem;
            color: #2c3e50;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .feature-card h3 {
            color: #2c3e50;
            margin: 1rem 0;
        }

        /* Footer */
        .footer {
            background: #2c3e50;
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .footer p {
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-links a {
            color: white;
            text-decoration: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }

            .nav-links {
                display: none;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-content">
            <div class="logo">Sudut Informasi</div>
            <div class="nav-links">
                <a href="home.php">Beranda</a>
                <a href="#tentang">Tentang</a>
                <a href="#informasi">Informasi</a>
                <a href="login.php">login</a>
                <a href="register.php">register</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Selamat Datang di Sudut Informasi</h1>
            <p>Portal informasi terpercaya untuk semua kebutuhan Anda</p>
            <a href="#mulai" class="cta-button">Mulai Sekarang</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="features-content">
            <h2>Fitur Unggulan</h2>
            <div class="feature-grid">
                <div class="feature-card">
                    <h3>Informasi Terkini</h3>
                    <p>Dapatkan update informasi terbaru dan terpercaya setiap hari</p>
                </div>
                <div class="feature-card">
                    <h3>Kemudahan Akses</h3>
                    <p>Akses informasi kapan saja dan di mana saja dengan mudah</p>
                </div>
                <div class="feature-card">
                    <h3>Konten Berkualitas</h3>
                    <p>Informasi yang terverifikasi dan berkualitas tinggi</p>
                </div>
                <div class="feature-card">
                    <h3>Interaktif</h3>
                    <p>Berinteraksi dengan pengguna lain dan berbagi informasi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Sudut Informasi. All rights reserved.</p>
        <div class="social-links">
            <a href="#facebook">Facebook</a>
            <a href="#twitter">Twitter</a>
            <a href="#instagram">Instagram</a>
        </div>
    </footer>
</body>
</html>