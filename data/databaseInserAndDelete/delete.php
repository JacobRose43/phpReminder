<?php

$connection = mysqli_connect('localhost', 'root', '', 'sklep');

$query = "DELETE FROM towary WHERE id='" . $_GET["id"] . "' ";

if (mysqli_query($connection, $query)) {
    echo 'Successfully deleted!';
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>
</head>

<body>

    <a href="index.php">Back to Index!</a>

</body>

</html>