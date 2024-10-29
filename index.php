<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Beranda - Sistem Pendaftaran Beasiswa</title>

    <!-- Memuat stylesheet Bootstrap untuk styling responsif dan elemen UI -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Custom styles untuk bagian header beranda (hero section) */
        .hero-section {
            background: linear-gradient(to right, #007bff, #6cb2eb); /* Background gradient */
            color: white;
            padding: 50px 0; /* Padding untuk menambah ruang di atas dan bawah */
        }
        /* Custom styles untuk elemen kartu (card) */
        .card {
            border: none; /* Menghilangkan border default */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan pada card */
        }
        /* Custom styles untuk tombol utama */
        .btn-primary {
            background-color: #007bff; /* Warna biru sesuai branding */
            border: none;
        }
    </style>
</head>
<body>
    <!-- Bagian utama atau hero section untuk menyambut pengguna di halaman beranda -->
    <div class="hero-section text-center">
        <div class="container">
            <h1 class="display-4">Selamat Datang Di Beasiswa In Aja</h1>
            <p class="lead">Daftarkan diri anda untuk mendapatkan beasiswa di kampus kami!</p>
        </div>
    </div>

    <!-- Kontainer utama untuk menampilkan informasi beasiswa -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Card untuk menampilkan informasi beasiswa -->
                <div class="card p-4">
                    <h2 class="card-title text-center">Informasi In Beasiswa Aja</h2>
                    <p class="card-text text-center">Kami menawarkan berbagai jenis beasiswa untuk membantu meringankan biaya pendidikan.</p>
                    <p class="card-text text-center">Pastikan Anda memenuhi syarat yang ditetapkan untuk mendaftar.</p>
                    <div class="text-center">
                        <!-- Tombol menuju halaman pendaftaran -->
                        <a href="pendaftaran.php" class="btn btn-primary btn-lg">Daftar Beasiswa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Memuat library JavaScript yang diperlukan untuk fungsi-fungsi Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
