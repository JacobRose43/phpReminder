<?php

$connection = mysqli_connect('localhost', 'root', '', 'sklep');

if (isset($_POST['submit'])) {
    $nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];
    $promocja = $_POST['promocja'];
    $idDostawcy = $_POST['iddostawcy'];
    // $dostawca = $_POST['dostawca'];

    $query = "INSERT INTO towary (nazwa, cena, promocja, idDostawcy)  VALUES ('$nazwa','$cena', '$promocja', '$idDostawcy')";
    if (mysqli_query($connection, $query)) {
        echo 'Success!';
    }
}

mysqli_close($connection);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert</title>
</head>

<body>

    <a href="index.php">Back to Index!</a>

</body>

</html>