<?php
// Koneksi ke database
$host = 'localhost'; // ganti sesuai host Anda
$dbname = 'beasiswa_db'; // ganti sesuai nama database Anda
$username = 'root'; // ganti sesuai username Anda
$password = ''; // ganti sesuai password Anda

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$semester = $_POST['semester'];
$ipk = rand(0, 1) ? 2.9 : 3.4; // Randomize IPK
$pilihan_beasiswa = $_POST['pilihan_beasiswa'];
$berkas = $_FILES['berkas']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($berkas);

// Upload berkas
move_uploaded_file($_FILES['berkas']['tmp_name'], $target_file);

// Menyimpan data ke database
$sql = "INSERT INTO pendaftaran_beasiswa (nama, email, no_hp, semester, ipk, pilihan_beasiswa, berkas, status_ajuan)
        VALUES ('$nama', '$email', '$no_hp', '$semester', '$ipk', '$pilihan_beasiswa', '$target_file', 'Belum Diverifikasi')";

if ($conn->query($sql) === TRUE) {
    // Redirect ke halaman notifikasi setelah berhasil mendaftar
    header("Location: notifikasi.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
