<?php
	session_start();
	$connect = mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("shop");

	function add_to_cart($product_id, $count=1)
	{
		if(!empty($_SESSION['products'][$product_id])){
			$_SESSION['products'][$product_id]['count']++;
			
		}
		else {
			$_SESSION['products'][$product_id]=array();
			$q=mysql_query("SELECT * FROM products WHERE product_id='$product_id'");
			$add_product=mysql_fetch_assoc($q);
			$_SESSION['products'][$product_id]['coast']=$add_product['product_price'];
			$_SESSION['products'][$product_id]['count']=$count;
			$_SESSION['products'][$product_id]['product_name'] = $add_product['product_name'];

		}
		update_cart();
	}

	function update_cart(){
		$_SESSION['products_incart']=count($_SESSION['products']);
		$_SESSION['cart_coast']=0;
		foreach ($_SESSION['products'] as $key => $value) {
			$_SESSION['cart_coast']+=$_SESSION['products'][$key]['coast']*$_SESSION['products'][$key]['count'];
		}
	}

	function update_product_count($product_id,$count){
		$_SESSION['products'][$product_id]['count']=$count;
		update_cart();
	}

	function remove_from_cart($product_id){
		unset($_SESSION['products'][$product_id]);
		update_cart();
	}

?>
