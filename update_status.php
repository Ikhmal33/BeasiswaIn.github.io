<?php
$host = 'localhost';
$dbname = 'beasiswa_db';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$sql = "UPDATE pendaftaran_beasiswa SET status_ajuan='Sudah Diverifikasi' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: hasil_pendaftaran.php");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
