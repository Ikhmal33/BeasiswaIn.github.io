<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran Beasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Link Font Awesome -->
    <style>
        /* Custom styles */
        .navbar {
            background-color: #007bff; /* Blue background for navbar */
        }
        .navbar a {
            color: white; /* White text color for navbar links */
            font-weight: bold; /* Make the text bolder */
        }
        .navbar a:hover {
            color: #e7f1ff; /* Change hover color for better visibility */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php">
        <i class="fas fa-home"></i> <!-- Icon Home -->
    </a>
    <div class="navbar-nav">
        <a class="nav-item nav-link" href="pendaftaran.php">Daftar</a>
        <a class="nav-item nav-link" href="hasil_pendaftaran.php">Hasil</a>
    </div>
</nav>

<div class="container mt-5">
    <h2>INFOOOO!!!!!!!</h2>
    <div class="alert alert-success" role="alert">
        Pendaftaran Anda telah berhasil! Terima kasih telah mendaftar beasiswa kami.
    </div>
    <a href="hasil_pendaftaran.php" class="btn btn-primary">Lihat Hasil Pendaftaran</a>

</div>

</body>
</html>
