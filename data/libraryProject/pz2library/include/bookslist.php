<table>
    <tr>
        <th>Tytuł</th>
        <th>Autor</th>
    </tr>
    <?php
    $booksList = mysqli_query($connection, 'SELECT * FROM book ORDER BY title');
    if ($currentBookId == 0) {
        $book = mysqli_fetch_assoc($booksList);
        $currentBookId = $book['id'];
        mysqli_data_seek($booksList, 0);
    }
    while ($book = mysqli_fetch_assoc($booksList)) {
        $currentBookClassName = '';
        if ($book['id'] == $currentBookId)
            $currentBookClassName = 'currentBook';
        ?>
        <tr class="<?php echo $currentBookClassName; ?>" onclick="showBook(<?php echo $book['id']; ?>);">
            <td><?php echo $book['title']; ?></td>
            <td><?php echo $authorsList[$book['author_id']]; ?></td>
        </tr>
        <?php
    }
    ?>
</table>
