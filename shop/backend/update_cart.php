<?php
session_start();
echo 'Товаров в корзине '.$_SESSION['products_incart'].' на сумму '.$_SESSION['cart_coast']; 
echo '</br>';
echo '<a href="show.php">Посмотреть корзину</a>';
?>