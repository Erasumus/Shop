<?php
	session_start();
	$connect = mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("shop");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Интернет-магазин</title>
		<script language="javascript" type="text/javascript" src="functions.js"></script>
		<script language="javascript" type="text/javascript" src="jquery-2.1.4.js"></script>
		
	</head>
	<body>
		<table cellpadding="4" border = "1px">
			<?php
				$query = mysql_query("SELECT * FROM products");
				$products = array();
				while ($product = mysql_fetch_assoc($query)){
					$products[] = $product;
				}

				foreach ($products as $product) {
				echo '<tr>';
				echo '<td>'.$product['product_name'].'</td><td>'.$product['product_price'].'</td><td><span onclick="add_to_cart('.$product['product_id'].')">В корзину</span></td>';
				echo '</tr>';
			}
			?>
		</table>
		<div id="small_cart">
			<?php
			if(empty($_SESSION['products'])){
				echo 'Ваша корзина пуста';
			}
			else {
				echo 'Товаров в корзине '.$_SESSION['products_incart'].' на сумму '.$_SESSION['cart_coast'];
				echo '</br>';
				echo '<a href="show.php">Посмотреть корзину</a>';
			}
			
			
			?>
	</body>
</html>