<?php
require_once('koneksi.php');

// Mendapatkan idmovie dari parameter URL
$idmovie = $_GET['idmovie'];

// Mengecek apakah idmovie ada
if (isset($idmovie) && is_numeric($idmovie)) {
    // Query untuk menghapus data berdasarkan idmovie
    $stmt = $mysqli->prepare("DELETE FROM movie WHERE idmovie = ?");
    $stmt->bind_param('i', $idmovie);

    // Menjalankan prepared statement
    if ($stmt->execute()) {
        // Jika berhasil menghapus, arahkan ke halaman daftar film dengan pesan sukses
        header("location: daftarmovie.php?message=deleted");
    } else {
        // Jika gagal, arahkan kembali dengan pesan error
        header("location: daftarmovie.php?message=error");
    }

    // Menutup statement dan koneksi
    $stmt->close();
} else {
    // Jika idmovie tidak valid, arahkan kembali ke halaman daftar film
    header("location: daftarmovie.php?message=invalid");
}

// Menutup koneksi database
$mysqli->close();
