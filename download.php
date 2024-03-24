<?php
include "koneksi.php";

// Pastikan fotoid yang ingin diunduh telah diberikan
if(isset($_GET['fotoid'])) {
    $fotoid = $_GET['fotoid'];

    // Ambil informasi gambar dari database
    $query = "SELECT * FROM foto WHERE fotoid = '$fotoid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Path gambar
    $imagePath = "gambar/" . $row['lokasifile'];

    // Set header untuk menyertakan nama file yang diunduh
    header('Content-Disposition: attachment; filename="' . basename($imagePath) . '"');

    // Baca file dan kirim ke output
    readfile($imagePath);
    exit;
} else {
    // Jika fotoid tidak diberikan, redirect ke halaman sebelumnya
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}
?>
