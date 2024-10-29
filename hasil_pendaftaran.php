<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran Beasiswa</title>
    
    <!-- Menyertakan Bootstrap untuk styling dan Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Gaya khusus untuk navbar */
        .navbar {
            background: linear-gradient(to right, #007bff, #6cb2eb); /* Warna biru untuk latar belakang navbar */
        }
        .navbar a {
            color: white; /* Warna putih untuk teks navbar */
            font-weight: bold; /* Membuat teks lebih tebal */
        }
        .navbar a:hover {
            color: #e7f1ff; /* Mengubah warna saat hover */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php">
        <i class="fas fa-home"></i> <!-- Ikon Home -->
    </a>
    <div class="navbar-nav">
        <!-- Link untuk halaman pendaftaran dan hasil -->
        <a class="nav-item nav-link" href="pendaftaran.php">Daftar</a>
        <a class="nav-item nav-link" href="hasil_pendaftaran.php">Hasil</a>
    </div>
</nav>

<div class="container mt-5">
    <h2>Hasil Pendaftaran Beasiswa</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- Menyusun kolom tabel untuk menampilkan informasi pendaftar -->
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Semester</th>
                <th>IPK</th>
                <th>Pilihan Beasiswa</th>
                <th>Berkas</th>
                <th>Status Ajuan</th>
                <th>Ubah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Koneksi ke database MySQL
            $host = 'localhost';
            $dbname = 'beasiswa_db';
            $username = 'root';
            $password = '';
            $conn = new mysqli($host, $username, $password, $dbname);
            
            // Periksa koneksi
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error); // Menampilkan pesan jika koneksi gagal
            }

            // Mengambil data dari tabel pendaftaran_beasiswa
            $sql = "SELECT * FROM pendaftaran_beasiswa";
            $result = $conn->query($sql);

            // Memeriksa apakah ada data dalam tabel
            if ($result->num_rows > 0) {
                // Menampilkan setiap data dalam baris tabel
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nama']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['no_hp']}</td>
                            <td>{$row['semester']}</td>
                            <td>{$row['ipk']}</td>
                            <td>{$row['pilihan_beasiswa']}</td>
                            <td><a href='{$row['berkas']}' target='_blank'>Lihat Berkas</a></td>
                            <td>{$row['status_ajuan']}</td>
                            <td>";
                            
                    // Menampilkan tombol verifikasi hanya jika status ajuan adalah "Belum Diverifikasi"
                    if ($row['status_ajuan'] == 'Belum Diverifikasi') {
                        echo "<form action='update_status.php' method='POST'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <button type='submit' class='btn btn-success'>Verifikasi</button> </form>";
                    }
                    
                    echo "</td></tr>";
                }
            } else {
                // Menampilkan pesan jika tidak ada data yang ditemukan
                echo "<tr><td colspan='9' class='text-center'>Tidak ada data</td></tr>";
            }

            // Menutup koneksi database
            $conn->close();
            ?>
        </tbody>
    </table>

    <!-- Tombol untuk menampilkan atau menyembunyikan grafik pendaftar -->
    <button class="btn btn-info" onclick="toggleGraph()" id="toggleGraphBtn">Tampilkan Grafik Pendaftar</button>
    
    <!-- Kontainer untuk grafik Chart.js -->
    <div id="chartContainer" style="height: 400px; width: 100%; display: none;">
        <canvas id="myChart"></canvas>
    </div>
</div>

<!-- Menyertakan library Chart.js untuk membuat grafik -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Fungsi untuk menampilkan atau menyembunyikan grafik
function toggleGraph() {
    const chartContainer = document.getElementById('chartContainer');
    const toggleButton = document.getElementById('toggleGraphBtn');

    if (chartContainer.style.display === 'none') {
        chartContainer.style.display = 'block';
        toggleButton.innerText = 'Sembunyikan Grafik Pendaftar';
        loadGraph(); // Memanggil fungsi untuk membuat grafik jika belum ada
    } else {
        chartContainer.style.display = 'none';
        toggleButton.innerText = 'Tampilkan Grafik Pendaftar';
    }
}

// Fungsi untuk memuat grafik (dijalankan satu kali)
function loadGraph() {
    // Data yang digunakan untuk grafik (simulasi sementara)
    const dataLabels = ['Akademik', 'Non-Akademik'];
    const dataValues = [0, 0]; // Jumlah pendaftar untuk masing-masing pilihan

    // Mengambil data dari file PHP untuk mengupdate nilai grafik
    fetch('get_data.php') // Memanggil file PHP untuk mendapatkan data secara asinkron
        .then(response => response.json())
        .then(data => {
            // Memproses data yang diperoleh dari PHP
            data.forEach(item => {
                if (item.pilihan_beasiswa === 'Akademik') {
                    dataValues[0]++; // Menambah nilai jika pilihan beasiswa adalah Akademik
                } else if (item.pilihan_beasiswa === 'Non-Akademik') {
                    dataValues[1]++; // Menambah nilai jika pilihan beasiswa adalah Non-Akademik
                }
            });

            // Menginisialisasi objek Chart.js untuk menampilkan grafik batang
            const ctx = document.getElementById('myChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar', // Jenis grafik batang
                data: {
                    labels: dataLabels,
                    datasets: [{
                        label: '# Pendaftar',
                        data: dataValues,
                        backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)'],
                        borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true // Menetapkan skala y grafik dimulai dari 0
                        }
                    }
                }
            });
        });
}
</script>
</body>
</html>
