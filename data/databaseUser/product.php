<?php

$query = 'SELECT * FROM shop_goods WHERE id='.$_GET['itemId'];
$goods = mysqli_query($conn, $query);
$item = mysqli_fetch_array($goods);

?>

<form action="?" method="post">
    <h2><?php echo $item['name'] ?></h2>
    <input type="number" name="amount" placeholder="ilość produktu">
    <input type="hidden" name="itemId" value="<?php echo $item['id'] ?>">
    <input type="hidden" name="action" value="addToBasket">
    <input type="submit" value="Dodaj do koszyka">
</form>