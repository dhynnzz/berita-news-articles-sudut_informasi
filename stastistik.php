<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudut Informasi - Statistik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            text-align: center;
        }

        main {
            padding: 20px;
        }

        .section-title {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .stat-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .stat-card {
            flex: 1 1 calc(33% - 20px);
            background: #fff;
            margin: 10px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .stat-card h3 {
            margin: 0;
            color: #4CAF50;
            font-size: 28px;
        }

        .stat-card p {
            margin: 5px 0;
            color: #555;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }

        canvas {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <header>
        <h1>Sudut Informasi</h1>
        <p>Statistik dan Data Terbaru</p>
    </header>

    <main>
        <section>
            <h2 class="section-title">Data Utama</h2>
            <div class="stat-container">
                <div class="stat-card">
                    <h3>5,432</h3>
                    <p>Pengunjung Bulan Ini</p>
                </div>
                <div class="stat-card">
                    <h3>1,234</h3>
                    <p>Artikel Terbaca</p>
                </div>
                <div class="stat-card">
                    <h3>98%</h3>
                    <p>Tingkat Kepuasan</p>
                </div>
            </div>
        </section>

        <section>
            <h2 class="section-title">Grafik Kunjungan</h2>
            <div class="card">
                <canvas id="chart"></canvas>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sudut Informasi - Semua Hak Dilindungi</p>
    </footer>

    <!-- Tambahkan library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('chart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    data: [1200, 1900, 3000, 5000, 2300, 4000],
                    backgroundColor: 'rgba(76, 175, 80, 0.6)',
                    borderColor: 'rgba(76, 175, 80, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
