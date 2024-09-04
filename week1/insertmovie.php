<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Movie</title>
</head>

<body>

    <h2>Tambah Data Movie</h2>

    <form action="insertmovie_proses.php" method="POST">
        <label for="judul">Judul Film:</label><br>
        <input type="text" id="judul" name="judul" required><br><br>

        <label for="rilis">Tanggal Rilis:</label><br>
        <input type="date" id="rilis" name="rilis" required><br><br>

        <label for="skor">Skor Film:</label><br>
        <input type="number" step="0.1" id="skor" name="skor" required><br><br>

        <label for="sinopsis">Sinopsis:</label><br>
        <textarea id="sinopsis" name="sinopsis" rows="4" cols="50" required></textarea><br><br>

        <label for="serial">Film Serial:</label><br>
        <select id="serial" name="serial" required>
            <option value="1">1</option>
            <option value="0">0</option>
        </select><br><br>

        <label for="genre">Genre:</label><br>
        <select id="genre" name="genre" required>
            <option value="Action">Action</option>
            <option value="Adventure">Adventure</option>
            <option value="Comedy">Comedy</option>
            <option value="Drama">Drama</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Horror">Horror</option>
            <option value="Romance">Romance</option>
            <option value="Sci-Fi">Sci-Fi</option>
            <option value="Thriller">Thriller</option>
        </select><br><br>

        <input type="submit" value="Tambah Movie">
    </form>

</body>

</html>