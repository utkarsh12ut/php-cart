<?php
include('header.php');
include('config.php');
include_once('function.php');
?>

<!DOCTYPE html>
<html>

<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
	<div id="header">
		<h1 id="logo">Logo</h1>
		<nav>
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
	</div>
	<div id="main">
		<div id="products">
			<?php
			foreach ($products as $key => $value) {
				echo '<form action="function.php" method="POST"><div id="product-' . $value['id'] . '" class="product">
					<img src="images/' . $value['image'] . '">
					<h3 class="title"><a href="#">' . $value['name'] . '</a></h3>
					<span>Price: $' . $value['price'] . '</span>
					<button class="add-to-cart" id="' . $value['id'] . '" href="#" type="submit" name="addCart">Add To Cart</button>
					<input type="text" hidden name="Val" value="' . $value['id'] . '">
					</div>
					</form>';
			}
			?>
		</div>
		<div> <?php echo Display(); ?> </div>
	</div>
	<div id="footer">
		<nav>
			<ul id="footer-links">
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Declaimers</a></li>
			</ul>
		</nav>
	</div>
</body>

</html>
