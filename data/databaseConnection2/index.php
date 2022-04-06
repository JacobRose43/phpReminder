<?php

$connection = mysqli_connect('localhost', 'root', '', 'itshop')

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practise2</title>
</head>

<body>

    <?php

    $query = "SELECT g.id AS id, c.name AS cname, g.name AS gname, g.price AS price, g.quantity AS quantity ";
    $query .= "FROM goods AS g, category AS c ";
    $query .= "WHERE g.category_id = c.id";

    $result = mysqli_query($connection, $query);



    ?>

    <h1>IT SHOP TABLE</h1>s

    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Category</td>
                <td>Name</td>
                <td>Price</td>
                <td>Quantity</td>
            </tr>
        </thead>
        <tbody>

            <?php

            while ($row = $result->fetch_array()) {
            ?>
                <tr>
                    <td> <?php echo $row['id']; ?> </td>
                    <td> <?php echo $row['cname']; ?> </td>
                    <td> <?php echo $row['gname']; ?> </td>
                    <td> <?php echo $row['price']; ?> </td>
                    <td> <?php echo $row['quantity']; ?> </td>
                </tr>

            <?php
            }
            ?>

        </tbody>
    </table>

</body>

</html>