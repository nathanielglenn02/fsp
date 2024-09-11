<?php
$mysqli = new mysqli("localhost", "root", "", "fsp");
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.7.1.js"></script>
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

        <p>
            <label>Genre</label>
            <?php
            $sql = "Select * from genre";
            $stmt = $mysqli->prepare($sql);
            $stmt->execute();
            $res = $stmt->get_result();
            while ($row = $res->fetch_assoc()) {
                echo "<input type='checkbox'
      name='genre[]' value='" . $row['idgenre'] . "'
      id='" . $row['nama'] . "'>";
                echo "<label for='" . $row['nama'] . "'>" . $row['nama'] . "</label> <br>";
            }
            ?>
        </p>

        <p>
            <label>Poster</label>
        <p>
        <div id="container-poster">
            <input type="file" name="poster[]" />
        </div>
        <div>
            <button type="button" id="tambah_poster">Tambah Poster</button>
        </div>
        </p>
        <button type="submit" name="submit" value="simpan">Simpan</button>
    </form>
    <script type="text/javascript">
    $("#tambah_poster").click(function() {
        var tambahan =
            "<div><input type='file' name='poster[]'> "
        "<button type='button' class='hapus_poster'>Hapus</button></div>";
        $("#container-poster").append(tambahan);
    });

    $('body').on('click', '.hapus_poster', function() {
        $(this).parent().remove();
    })
    </script>
</body>

</p>

<input type="submit" value="Tambah Movie">
</form>
</body>

</html>

<?php
$mysqli->close();
?>