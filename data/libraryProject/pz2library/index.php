<?php
$action = 'nothing';

if (!empty($_POST['action']))
    $action = $_POST['action'];
if (!empty($_GET['action']))
    $action = $_GET['action'];

$connection = mysqli_connect('localhost', 'root', '', '3tp4pz2');

$authorsList = array();
$result = mysqli_query($connection, 'SELECT * FROM author ORDER BY last_name,first_name');
while ($a = mysqli_fetch_assoc($result))
    $authorsList[$a['id']] = $a['first_name'] . ' ' . $a['last_name'];
$categoryList = array();
$result = mysqli_query($connection, 'SELECT * FROM category ORDER BY name');
while ($a = mysqli_fetch_assoc($result))
    $categoryList[$a['id']] = $a['name'];
$currentBookId = 0;
if (!empty($_GET['currentBookId']))
    $currentBookId = $_GET['currentBookId'];


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Biblioteka</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        footer {
            clear: both;
        }

        header, main, footer, section {
            /*
            border: 1px solid #000;

             */
        }

        #booksList, #details {
            float: left;
            width: 50%;
            margin: 0 auto auto 0;
            bacground: #bdf;
        }

        #newBook {
            float: right;
            width: 50%;
            margin: 0 0 auto auto;
            background: #fdb;
        }

        #booksList td {
            padding: 5px;
        }

        #booksList tr {
            background: #def;
            cursor: pointer;
        }

        #booksList tr:hover {
            background: #fff;
        }

        .currentBook {
            background: #fff;
            color: #060;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        form {

        }
    </style>
    <script>
        function showBook(id) {
            document.location = '?currentBookId=' + id;
        }

        function checkForm() {
            return false;
        }
    </script>
</head>
<body>
<header>
    Library
</header>
<main>
    <section id="booksList">
        <?php include('include/bookslist.php'); ?>
    </section>
    <section id="newBook">
        <form id="newBookForm" action="?" method="get" onsubmit="return checkForm();">

            <table border="0">
                <tr>
                    <td class="right">Tytuł</td>
                    <td>
                        <input name="title" placeholder="Wpisz tytuł książki" required>
                    </td>
                </tr>
                <tr>
                    <td class="right">Autor</td>
                    <td>
                        <select name="author_id">
                            <?php
                            foreach ($authorsList as $id => $name) {
                                ?>
                                <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="right">Rok</td>
                    <td>
                        <?php
                        $currentYear = date('Y', time());
                        ?>
                        <input type="number" name="year" max="<?php echo $currentYear; ?>"
                               value="<?php echo $currentYear; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="right">Gatunek</td>
                    <td>
                        <?php
                        foreach ($categoryList as $id => $name) {
                            ?>
                            <input name="category_id[]" type="checkbox" value="<?php echo $id; ?>"><?php echo $name; ?>
                            <br>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="center" colspan="2">
                        <input type="reset" value="Wyczyść" style="margin-right:20px;">
                        <input type="submit" value="Dodaj">
                    </td>
                </tr>
            </table>
            <input type="hidden" name="action" value="addBook">
        </form>
        <?php
        ?>
    </section>
    <section id="details">
        <?php include('include/details.php'); ?>
    </section>

</main>
<footer>
    (c) 2022 Maciej Wojtaszek
</footer>
</body>
</html>