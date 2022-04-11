<table class="table shadow-sm mt-5 rounded-5">
    <tr>
        <th>Nazwa</th>
    </tr>
    <?php
    $query = 'SELECT * FROM shop_goods';
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><a href="?action=showItem&itemId=<?php echo $row['id']; ?>"><?php echo $row['name']; ?> </a></td>
        </tr>
    <?php
    }
    ?>
</table>