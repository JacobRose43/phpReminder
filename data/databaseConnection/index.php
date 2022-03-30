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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script>
		function showCategory() {
			let category = document.querySelector('#categoryList');
			document.location = "index.php?category_id=" + category.value;
		}
	</script>
</head>

<body>
	<div class="container my-5">
		<h3 class="display-4">Lista Produktów</h3>
	</div>
	<?php

	$query = 'SELECT * ';
	$query .= 'FROM category ';
	$query .= 'ORDER BY name';
	$result = mysqli_query($connection, $query);

	?>
	<div class="container">
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
	</div>
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

	<div class="container">
		<table class="table table-borderless">
			<thead class="table-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Towar</th>
					<th scope="col">Kategoria</th>
					<th scope="col">Cena</th>
					<th scope="col">Ilość</th>
					<th scope="col">Wartość</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$id = 1;
				while ($row = mysqli_fetch_assoc($result)) {
				?>

					<tr>
						<th scope="row"><?php echo $id; ?></th>
						<td><?php echo $row['gname']; ?></td>
						<td><?php echo $row['cname']; ?></td>
						<td><?php echo number_format($row['price'], 2) . " zł"; ?></td>
						<td><?php echo $row['quantity']; ?></td>
						<td><?php echo $row['price'] * $row['quantity']; ?></td>
					</tr>

				<?php
					$id++;
				}
				?>
			</tbody>
		</table>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>