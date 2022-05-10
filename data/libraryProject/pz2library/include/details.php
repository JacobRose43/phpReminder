<?php
$result = mysqli_query($connection, 'SELECT * FROM book WHERE id=' . $currentBookId);
$book = mysqli_fetch_assoc($result);
?>
<h2>Szczegóły książki</h2>
Tytuł: <strong><?php echo $book['title']; ?></strong><br>
Autor: <strong><?php echo $authorsList[$book['author_id']];; ?></strong><br>
Rok: <strong><?php echo $book['year_of_release']; ?></strong> Gatunki:
<strong>
    <?php
    $result = mysqli_query($connection, 'SELECT category_id FROM book_category WHERE book_id=' . $currentBookId);
    while ($category = mysqli_fetch_assoc($result))
        echo $categoryList[$category['category_id']] . ' | ';
    ?>
</strong>