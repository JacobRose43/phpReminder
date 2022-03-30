<?php

$connection = mysqli_connect('localhost', 'root', '', 'itshop');
$category_id = 0;
if (isset($_GET['category_id'])) {
	$category_id = $_GET['category_id'];
}

?>
<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>ItShop</title>
	<script>
		function showCategory() {
			let category = document.querySelector('#categoryList');
			document.location = "index.php?category_id=" + category.value;
		}
	</script>
</head>

<body>


	<h2>Skrypty</h2>
	<h3>Lista Produktów</h3>

	<?php

	$query = 'SELECT * ';
	$query .= 'FROM category ';
	$query .= 'ORDER BY name';
	$result = mysqli_query($connection, $query);

	?>

	<select name="" id="categoryList" onchange="showCategory();">
		<option value="0">Wszystkie</option>

		<?php
		while ($row = mysqli_fetch_assoc($result)) {
		?>

			<option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $category_id) echo 'selected'; ?>>
				<?php echo $row['name']; ?>
			</option>

		<?php
		}
		?>

	</select>

	<br><br>
	<?php
	$query = 'SELECT g.name AS gname, c.name AS cname, g.price AS price, g.quantity AS quantity ';
	$query .= 'FROM goods AS g, category AS c ';
	$query .= 'WHERE g.category_id = c.id ';
	if ($category_id != 0)
		$query .= "AND g.category_id=$category_id ";

	$query .= 'ORDER BY g.name, c.name ';
	//zapytanie krzyżowe
	$result = mysqli_query($connection, $query);

	?>

	<table>
		<tr>
			<th>Towar</th>
			<th>Kategoria</th>
			<th>Cena</th>
			<th>Ilość</th>
			<th>Wartość</th>
		</tr>

		<?php

		while ($row = mysqli_fetch_assoc($result)) {
		?>

			<tr>
				<td><?php echo $row['gname']; ?></td>
				<td><?php echo $row['cname']; ?></td>
				<td><?php echo number_format($row['price'], 2) . " zł"; ?></td>
				<td><?php echo $row['quantity']; ?></td>
				<td><?php echo $row['price'] * $row['quantity']; ?></td>
			</tr>

		<?php
		}
		?>

	</table>


</body>

</html>