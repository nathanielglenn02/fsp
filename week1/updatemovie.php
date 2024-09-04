<?php
require_once('koneksi.php');

// Mendapatkan idmovie dari parameter URL
$idmovie = $_GET['idmovie'];

// Mendapatkan data film berdasarkan idmovie
$stmt = $mysqli->prepare("SELECT judul, rilis, skor, sinopsis, serial, genre FROM movie WHERE idmovie = ?");
$stmt->bind_param('i', $idmovie);
$stmt->execute();
$stmt->bind_result($judul, $rilis, $skor, $sinopsis, $serial, $genre);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Movie</title>
</head>

<body>

    <h2>Update Data Movie</h2>

    <form action="updatemovie_proses.php" method="POST">
        <input type="hidden" name="idmovie" value="<?php echo $idmovie; ?>">

        <label for="judul">Judul Film:</label><br>
        <input type="text" id="judul" name="judul" value="<?php echo $judul; ?>" required><br><br>

        <label for="rilis">Tanggal Rilis:</label><br>
        <input type="date" id="rilis" name="rilis" value="<?php echo $rilis; ?>" required><br><br>

        <label for="skor">Skor Film:</label><br>
        <input type="number" step="0.1" id="skor" name="skor" value="<?php echo $skor; ?>" required><br><br>

        <label for="sinopsis">Sinopsis:</label><br>
        <textarea id="sinopsis" name="sinopsis" rows="4" cols="50" required><?php echo $sinopsis; ?></textarea><br><br>

        <label for="serial">Film Serial:</label><br>
        <select id="serial" name="serial" required>
            <option value="1" <?php if($serial == 1) echo 'selected'; ?>>Ya</option>
            <option value="0" <?php if($serial == 0) echo 'selected'; ?>>Tidak</option>
        </select><br><br>

        <label for="genre">Genre:</label><br>
        <select id="genre" name="genre" required>
            <option value="Action" <?php if($genre == 'Action') echo 'selected'; ?>>Action</option>
            <option value="Adventure" <?php if($genre == 'Adventure') echo 'selected'; ?>>Adventure</option>
            <option value="Comedy" <?php if($genre == 'Comedy') echo 'selected'; ?>>Comedy</option>
            <option value="Drama" <?php if($genre == 'Drama') echo 'selected'; ?>>Drama</option>
            <option value="Fantasy" <?php if($genre == 'Fantasy') echo 'selected'; ?>>Fantasy</option>
            <option value="Horror" <?php if($genre == 'Horror') echo 'selected'; ?>>Horror</option>
            <option value="Romance" <?php if($genre == 'Romance') echo 'selected'; ?>>Romance</option>
            <option value="Sci-Fi" <?php if($genre == 'Sci-Fi') echo 'selected'; ?>>Sci-Fi</option>
            <option value="Thriller" <?php if($genre == 'Thriller') echo 'selected'; ?>>Thriller</option>
        </select><br><br>

        <input type="submit" value="Update Movie">
    </form>

</body>

</html>