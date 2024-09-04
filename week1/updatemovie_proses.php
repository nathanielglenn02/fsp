<?php
require_once('koneksi.php');

// Mendapatkan data dari form
$idmovie = $_POST['idmovie'];
$judul = $_POST['judul'];
$rilis = $_POST['rilis'];
$skor = $_POST['skor'];
$sinopsis = $_POST['sinopsis'];
$serial = $_POST['serial'];

// Query untuk mengupdate data
$stmt = $mysqli->prepare("UPDATE movie SET judul = ?, rilis = ?, skor = ?, sinopsis = ?, serial = ?, genre = ? WHERE idmovie = ?");
$stmt->bind_param('ssdsii', $judul, $rilis, $skor, $sinopsis, $serial, $idmovie);

/* Menjalankan prepared statement */
$stmt->execute();

/* Menutup statement dan koneksi */
$stmt->close();
$mysqli->close();

// Redirect kembali ke halaman daftar film atau halaman lain
header("location: daftarmovie.php");
