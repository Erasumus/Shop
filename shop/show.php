<?php
	session_start();

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Интернет-магазин</title>
</head>
<body>
	<table cellpadding="4" border = "1px">
		<?php
			echo '<tr>';
			echo '<td>Товар</td><td>Кол-во</td><td>Сумма</td>';
			echo '</tr>';
			foreach ($_SESSION['products'] as $product) {
				echo '<tr>';
				echo '<td>'.$product['product_name'].'</td><td>'.$product['count'].'</td><td>'.$product['count']*$product['coast'].'</td>';
				echo '</tr>';
			}
			echo '<tr>';
			echo '<td colspan="2">Общая стоимость</td><td>'.$_SESSION['cart_coast'].'</td>';
			echo '</tr>';
		?>
	</table>
	<a href="index.php">Вернутся в магазин</a>
</body>
</html>