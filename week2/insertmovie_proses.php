<?php
$mysqli = new mysqli("localhost", "root", "", "fsp");
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

$judul = $_POST['judul'];
$rilis = date('Y-m-d', strtotime($_POST['rilis']));
$skor = $_POST['skor'];
$sinopsis = $_POST['sinopsis'];
$serial = $_POST['serial'];
// $genre = $_POST['genre'];
$poster = $_FILES['poster'];

$sql = "INSERT INTO movie (judul, rilis, skor, sinopsis, serial, ) VALUES (?, ?, ?, ?, ?, )";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssdsi", $judul, $rilis, $skor, $sinopsis, $serial);
// ‘'ssdsis'’ is the variable type 

/* execute prepared statement */
$stmt->execute();

$jumlah_yang_dieksekusi = $stmt->affected_rows; // optional, in case you need it
$last_id = $stmt->insert_id; // optional, in case you need it (for Auto_increment ID only)

if ($poster['tmp_name']) {
    $ext = pathinfo($poster['name'], PATHINFO_EXTENSION);
    move_uploaded_file($poster['tmp_name'], "image/" . $last_id . "." . $ext);

    $sql = "update movie set extention=? where idmovie=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", $ext, $last_id);
    $stmt->execute();
}

/* close statement and connection */
$stmt->close();
$mysqli->close();

// header("location: utama.php");