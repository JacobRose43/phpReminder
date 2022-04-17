<?php

$conn = mysqli_connect('localhost', 'root', '', 'znajomi');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Znajomi</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
</head>

<body>
    <div class="container1">
        <?php

        $query = "SELECT * FROM ludzie";
        $result = mysqli_query($conn, $query);

        ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Imie</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Dzien urodzin</th>
                    <th scope="col">Dzien imienin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['fetch_assoc'])) {
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>

                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></td>
                            <td><?php echo $row['imie']; ?></td>
                            <td><?php echo $row['nazwisko']; ?></td>
                            <td><?php echo $row['dzien_urodzin']; ?></td>
                            <td><?php echo $row['dzien_imienin']; ?></td>
                        </tr>

                    <?php
                    }
                } else if (isset($_POST['fetch_array'])) {
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></td>
                            <td><?php echo $row['imie']; ?></td>
                            <td><?php echo $row['nazwisko']; ?></td>
                            <td><?php echo $row['dzien_urodzin']; ?></td>
                            <td><?php echo $row['dzien_imienin']; ?></td>
                        </tr>

                        <?php
                    }
                } else {
                    while ($row = mysqli_fetch_row($result)) {
                        if (isset($_POST['only_birthday_db'])) {
                        ?>

                            <tr>
                                <th scope="row"><?php echo $row[0]; ?></td>
                                <td></td>
                                <td></td>
                                <td><?php echo $row[3]; ?></td>
                                <td></td>
                            </tr>

                        <?php
                        } else if (isset($_POST['only_nameday_db'])) {
                        ?>

                            <tr>
                                <th scope="row"><?php echo $row[0]; ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?php echo $row[4]; ?></td>
                            </tr>

                        <?php
                        } else {
                        ?>

                            <tr>
                                <th scope="row"><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?></td>
                                <td><?php echo $row[3]; ?></td>
                                <td><?php echo $row[4]; ?></td>
                            </tr>

                <?php
                        }
                    }
                }
                ?>


            </tbody>
        </table>
    </div>
    <div class="container2">
        <!-- <div class="container d-flex"> -->
        <form action="" method="post" class="m-3">
            <?php
            if (isset($_POST['fetch_assoc'])) {
            ?>
                <input type="submit" value="Fetch_Assoc" class="btn btn-info" name="fetch_assoc">
            <?php
            } else {
            ?>
                <input type="submit" value="Fetch_Assoc" class="btn btn-outline-info" name="fetch_assoc">
            <?php
            }
            ?>
        </form>

        <form action="" method="post" class="m-3">
            <?php
            if (isset($_POST['fetch_array'])) {
            ?>
                <input type="submit" value="Fetch_array" class="btn btn-info" name="fetch_array">
            <?php
            } else {
            ?>
                <input type="submit" value="Fetch_array" class="btn btn-outline-info" name="fetch_array">
            <?php
            }
            ?>
        </form>

        <form action="" method="post" class="m-3">
            <?php
            if (isset($_POST['fetch_row']) || (!isset($_POST['fetch_assoc']) && !isset($_POST['fetch_array']))) {
            ?>
                <input type="submit" value="Fetch_row" class="btn btn-info" name="fetch_row">
            <?php
            } else {
            ?>
                <input type="submit" value="Fetch_row" class="btn btn-outline-info" name="fetch_row">
            <?php
            }
            ?>
        </form>

        <!--  -->

        <div class="m-5"></div>

        <!--  -->

        <form action="" method="post" class="m-3">
            <?php
            if (isset($_POST['only_birthday_db'])) {
            ?>
                <input type="submit" value="Only_birthday_db" class="btn btn-info" name="only_birthday_db">
            <?php
            } else {
            ?>
                <input type="submit" value="Only_birthday_db" class="btn btn-outline-info" name="only_birthday_db">
            <?php
            }
            ?>
        </form>
        <form action="" method="post" class="m-3">
            <?php
            if (isset($_POST['only_nameday_db'])) {
            ?>
                <input type="submit" value="Only_nameday_db" class="btn btn-info" name="only_nameday_db">
            <?php
            } else {
            ?>
                <input type="submit" value="Only_nameday_db" class="btn btn-outline-info" name="only_nameday_db">
            <?php
            }
            ?>
        </form>
        <form action="" method="post" class="m-3">
            <?php
            if (isset($_POST['full_db']) || (!isset($_POST['only_birthday_db']) && !isset($_POST['only_nameday_db']))) {
            ?>
                <input type="submit" value="Full_db" class="btn btn-info" name="full_db">
            <?php
            } else {
            ?>
                <input type="submit" value="Full_db" class="btn btn-outline-info" name="full_db">
            <?php
            }
            ?>
        </form>
        <!-- </div> -->

    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
</body>

</html>