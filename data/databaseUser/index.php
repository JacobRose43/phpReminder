<?php
session_start();
$action = 'none';
if (!empty($_POST['action']))
    $action = $_POST['action'];
if (!empty($_GET['action']))
    $action = $_GET['action'];

$conn = mysqli_connect('localhost', 'root', '', 'shop');

function msg($text, $color)
{
?>
    <div style="z-index: 99" class="alert m-2 alert-<?php echo $color ?>" role="alert"><?php echo $text; ?></div>
<?php
}

switch ($action) {
    case 'login':
        $name = $_POST['name'];
        $password = $_POST['password'];
        $result = mysqli_query($conn, "SELECT * FROM shop_user WHERE name='$name'");
        if ($user = mysqli_fetch_array($result)) {
            $result = mysqli_query($conn, "SELECT * FROM shop_user WHERE `password`='$password'");
            if ($user = mysqli_fetch_array($result)) {
                $_SESSION['user']['id'] = $user['id'];
                $_SESSION['user']['name'] = $user['name'];
                msg('Zalogowano pomyślnie', 'success');
            } else
                msg('Błędny login i/lub hasło', 'danger');
        } else
            msg('Błędny login i/lub hasło', 'danger');
        break;
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Verdana, sans-serif;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">AleShop</a>
            <div>
                <?php
                if (!empty($_SESSION['user'])) {
                ?>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            <span></span><?php echo $_SESSION['user']['name']; ?></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Moje zamówienia</a></li>
                            <li><a href="logout.php">Wyloguj się</a></li>
                        </ul>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
    <main id="main-page" class="m-5">
        <?php
        if (empty($_SESSION['user'])) {
            include('login.php');
        } else {
            switch($action){
                case 'showItem':
                    include('product.php');
                    break;
                case 'addToBasket':
                    $query = 'INSERT INTO shop_basket(user_id,goods_id,amount,sid) VALUES ';
                    $user_id = $_SESSION['user']['id'];
                    $goods_id = $_POST['itemId'];
                    $amount = $_POST['amount'];
                    $sid = session_id();
                    $query .= "($user_id, $goods_id, $amount, '$sid')";
                    if(mysqli_query($conn, $query))
                        msg('Dodano do koszyka '.$amount.' szt. produktu', 'primary');
                    else
                        msg('Blad', 'warning');
                    break;
                default:
                    include('products.php');
                    break;
            }
        }
        ?>
    </main>
</body>

</html>