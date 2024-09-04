<?php
require_once('koneksi.php');

// Mendapatkan data dari form
$judul = $_POST['judul'];
$rilis = $_POST['rilis'];
$skor = $_POST['skor'];
$sinopsis = $_POST['sinopsis'];
$serial = $_POST['serial'];
$genre = $_POST['genre'];

// Query untuk memasukkan data ke tabel movie
$stmt = $mysqli->prepare("INSERT INTO movie (judul, rilis, skor, sinopsis, serial, genre) 	VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssdsis', $judul, $rilis, $skor, $sinopsis, $serial, $genre);
// ‘'ssdsis'’ is the variable type 

/* execute prepared statement */
$stmt->execute();

$jumlah_yang_dieksekusi = $stmt->affected_rows; // optional, in case you need it
$last_id = $stmt->insert_id; // optional, in case you need it (for Auto_increment ID only)

/* close statement and connection */
$stmt->close();
$mysqli->close();

header("location: insertmovie.php");
?>

?>
?>