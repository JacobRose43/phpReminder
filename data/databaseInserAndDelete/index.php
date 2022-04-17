<?php

$connection = mysqli_connect('localhost', 'root', '', 'sklep');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practise1</title>
</head>

<body>

    <?php

    $query = "SELECT t.id AS tid, t.nazwa AS tnazwa, t.cena AS tcena, d.nazwa AS dnazwa ";
    $query .= "FROM towary AS t, dostawcy AS d ";
    $query .= "WHERE t.idDostawcy = d.id ";

    $result = mysqli_query($connection, $query);

    ?>


    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>nazwa</td>
                <td>cena</td>
                <td>dostawca</td>
                <td>action</td>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_array()) {
            ?>
                <tr>
                    <td><?php echo $row['tid']; ?></td>
                    <td><?php echo $row['tnazwa']; ?></td>
                    <td><?php echo $row['tcena']; ?></td>
                    <td><?php echo $row['dnazwa']; ?></td>
                    <td><a href="delete.php?id=<?php echo $row["tid"]; ?>">Delete</a></td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>

    <br><br><br><br>

    <form action="insert.php" method="post">
        <label for="nazwa">Nazwa Produktu</label>
        <input type="text" id="nazwa" name="nazwa">
        <label for="cena">Cena</label>
        <input type="number" id="cena" name="cena" step="0.01">
        <label for="promocja">Promocja</label>
        <input type="number" id="promocja" name="promocja" min="0" max="1">
        <label for="iddostawcy">idDostawcy</label>
        <input type="number" id="iddostawcy" name="iddostawcy" min="1" max="3">
        <input type="submit" name="submit">
    </form>



</body>

</html>