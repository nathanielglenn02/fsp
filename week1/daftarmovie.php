<?php
require_once('koneksi.php');

if (isset($_GET['message'])) {
    if ($_GET['message'] == 'deleted') {
        echo "<p>Film berhasil dihapus.</p>";
    } elseif ($_GET['message'] == 'error') {
        echo "<p>Terjadi kesalahan saat menghapus film.</p>";
    } elseif ($_GET['message'] == 'invalid') {
        echo "<p>ID film tidak valid.</p>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 1 </title>
    <style>
        table,
        th,
        td {
            border: 1px solid;
            border-collapse: collapse;
        }
    </style>
</head>

<body>

    <?php
    $stmt = $mysqli->prepare("SELECT * FROM movie");
    $stmt->execute();
    $res = $stmt->get_result();

    echo "<table>
	<tr><th>Judul</th> <th>Tgl. Rilis</th> <th>Skor</th> <th>Sinopsis</th> <th>Serial</th> 
    <th>Genre</th><th>Update</th> <th>Delete</th></tr>";
    while ($row = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['judul'] . "</td>";
        echo "<td>" . $row['rilis'] . "</td>";
        echo "<td>" . $row['skor'] . "</td>";
        echo "<td>" . $row['sinopsis'] . "</td>";
        if ($row['serial'] == 1) {
            echo "<td>Ya</td>";
        } else {
            echo "<td>Tidak</td>";
        }
        echo "<td>" . $row['genre'] . "</td>";
        echo "<td><a href=\"updatemovie.php?idmovie=" . $row['idmovie'] . "\">Update</a></td>";
        echo "<td><a href=\"deletemovie.php?idmovie=" . $row['idmovie'] . "\">Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";

    ?>

</body>

</html>
<?php
/* close connection */
$mysqli->close();
?>