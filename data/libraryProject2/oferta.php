<?php include './boilerplate1.php' ?>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'biblioteka')
?>

<?php

if (isset($_POST['showAll'])) {
    unset($_POST['searching_title']);
}

if (isset($_POST['searching_title'])) {
    $stitle = $_POST['searching_title'];
    $query = "SELECT * FROM ksiazki WHERE tytul LIKE '%$stitle%'";
} else {
    $query = "SELECT * FROM ksiazki";
}

$books = mysqli_query($conn, $query);

?>


<?php
if (isset($_POST['showData']) || isset($_POST['showAll']) || isset($_POST['searching_title'])) { ?>

    <div class="content-section">
        <div class="forms-container">
            <form action="" method="post">
                <input type="text" placeholder="Searching title..." name="searching_title">
                <input type="submit" value="Wyszukaj">
            </form>
            <form action="" method="post">
                <input type="submit" name="showAll" value="Pokaż Wszystko">
            </form>
        </div>

        <div class="books-container">

            <?php while ($book = mysqli_fetch_assoc($books)) { ?>


                <div class="book-container">
                    <img src="./book.png" alt="bookimage">
                    <div class="book-details">
                        <span class="title"><?php echo $book['tytul']; ?></span>
                        <span class="name"><?php echo $book['autor_imie'] . ' ' . $book['autor_nazwisko']; ?></span>
                        <span class="year"><?php echo $book['rok_wydania']; ?></span>
                        <span class="genre"><?php echo $book['gatunek']; ?></span>
                    </div>

                </div>

            <?php } ?>

        </div>
    </div>


<?php } else { ?>

    <div class="content-section">
        <form action="" method="post">
            <input type="submit" name="showData" value="Pokaż książki!">
        </form>
    </div>

<?php } ?>

<?php include './boilerplate2.php' ?>