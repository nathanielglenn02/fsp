<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Tambah Data Movie</h2>
    <form action="insertmovie_proses.php" method="POST" enctype="multipart/form-data">
        <label for="judul">Judul Film:</label><br>
        <input type="text" id="judul" name="judul" required><br><br>

        <label for="rilis">Tanggal Rilis:</label><br>
        <input type="date" id="rilis" name="rilis" required><br><br>

        <label for="skor">Skor:</label><br>
        <input type="number" id="skor" name="skor" step="0.1" min="0" max="10" required><br><br>

        <label for="sinopsis">Sinopsis:</label><br>
        <textarea id="sinopsis" name="sinopsis" rows="4" cols="50" required></textarea><br><br>

        <label>Serial:</label><br>
        <input type="radio" id="serial_yes" name="serial" value="1" required>
        <label for="serial_yes">Yes</label><br>
        <input type="radio" id="serial_no" name="serial" value="0" required>
        <label for="serial_no">No</label><br><br>

        <!-- <label for="genre">Genre:</label><br>
        <select id="genre" name="genre" required>
            <option value="Action">Action</option>
            <option value="Comedy">Comedy</option>
            <option value="Drama">Drama</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Horror">Horror</option>
            <option value="Romance">Romance</option>
            <option value="Sci-Fi">Sci-Fi</option>
            <option value="Thriller">Thriller</option>
        </select><br><br> -->

        <p>
            <label for="">Poster</label>
            <input type="file" name="poster">
        </p>

        <input type="submit" value="Tambah Movie">
    </form>
</body>

</html>