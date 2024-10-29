<?php
// Menentukan nilai IPK secara acak antara 2.9 dan 3.4 untuk simulasi
$ipk = rand(0, 1) ? 2.9 : 3.4;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran Beasiswa</title>
    
    <!-- Menghubungkan ke pustaka Bootstrap untuk gaya tampilan -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Menghubungkan ke pustaka Font Awesome untuk ikon tambahan -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Link Font Awesome -->
    
    <style>
        /* Kustomisasi gaya navbar */
        .navbar {
            background: linear-gradient(to right, #007bff, #6cb2eb); /* Warna latar belakang navbar biru */
        }
        .navbar a {
            color: white; /* Warna teks pada tautan navbar */
            font-weight: bold; /* Menebalkan teks */
        }
        .navbar a:hover {
            color: #e7f1ff; /* Warna teks saat kursor hover */
        }
        .required:after {
            content: " *"; /* Menambahkan tanda asterisk setelah label untuk kolom wajib */
            color: red; /* Warna asterisk */
        }
    </style>
</head>
<body>

<!-- Navigasi Utama -->
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php">
        <i class="fas fa-home"></i> <!-- Ikon Home -->
    </a>
    <div class="navbar-nav">
        <a class="nav-item nav-link" href="pendaftaran.php">Daftar</a> <!-- Tautan ke halaman pendaftaran -->
        <a class="nav-item nav-link" href="hasil_pendaftaran.php">Hasil</a> <!-- Tautan ke halaman hasil -->
    </div>
</nav>

<div class="container mt-5">
    <h2>Formulir Pendaftaran Beasiswa</h2>
    <p>Silakan isi formulir di bawah ini untuk mendaftar beasiswa.</p>

    <!-- Formulir Pendaftaran -->
    <form action="submit_pendaftaran.php" method="POST" enctype="multipart/form-data">
        
        <!-- Input Nama -->
        <div class="form-group">
            <label class="required">Nama:</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        
        <!-- Input Email -->
        <div class="form-group">
            <label class="required">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        
        <!-- Input Nomor HP dengan validasi hanya angka -->
        <div class="form-group">
            <label class="required">Nomor HP:</label>
            <input type="text" class="form-control" name="no_hp" pattern="\d+" required>
        </div>
        
        <!-- Dropdown Pilihan Semester (1 - 8) -->
        <div class="form-group">
            <label class="required">Semester:</label>
            <select class="form-control" name="semester" required>
                <?php for ($i = 1; $i <= 8; $i++): ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>
        
        <!-- Menampilkan IPK (readonly, tidak dapat diubah) -->
        <div class="form-group">
            <label>IPK:</label>
            <input type="text" class="form-control" value="<?= $ipk ?>" readonly>
        </div>
        
        <!-- Dropdown Pilihan Beasiswa, dinonaktifkan jika IPK kurang dari 3.0 -->
        <div class="form-group">
            <label class="required">Pilihan Beasiswa:</label>
            <select class="form-control" name="pilihan_beasiswa" <?= $ipk < 3.0 ? 'disabled' : '' ?> required>
                <option value="Akademik">Akademik</option>
                <option value="Non-Akademik">Non-Akademik</option>
            </select>
        </div>
        
        <!-- Input untuk unggah berkas, dinonaktifkan jika IPK kurang dari 3.0 -->
        <div class="form-group">
            <label class="required">Upload Berkas (PDF/JPG/ZIP):</label>
            <input type="file" class="form-control-file" name="berkas" <?= $ipk < 3.0 ? 'disabled' : '' ?> required>
        </div>
        
        <!-- Pesan peringatan sebelum pengiriman formulir -->
        <div class="alert alert-info" role="alert">
            Harap pastikan semua kolom diisi sebelum menekan tombol "Daftar".
        </div>
        
        <!-- Tombol kirim formulir (daftar), dinonaktifkan jika IPK kurang dari 3.0 -->
        <button type="submit" class="btn btn-primary" <?= $ipk < 3.0 ? 'disabled' : '' ?>>Daftar</button>
    </form>
</div>
</body>
</html>
