<?php
$localhost = "localhost";
$user = "root";
$password = "";
$database = "sakila";


$mysqli =  new mysqli($localhost, $user, $password, $database);
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 1</title>
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
    $res = mysqli_query($mysqli, "SELECT * From film");
    echo "<table class=\"table\"> <tr> <th>Judul</th> <th>Deskripsi</th> </tr>";
    while ($row = $res->fetch_assoc()) {
        echo "<tr> <td>" . $row['title'] . "</td>";
        echo "<td>" . $row['description'] . "</td> </tr>";
    }
    echo "<table>";
    ?>

</body>

</html>