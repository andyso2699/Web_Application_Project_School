<?php
	
	if(isset($_COOKIE['Shopping_List']) && isset($_COOKIE['Quantity'])){
	
		if ($_COOKIE['Shopping_List'] == 'id' || $_COOKIE['Quantity'] == 'amount'){
			$cookie_value1 = $_GET['addcart'].",";
			$cookie_value2 = $_GET['quantity'].",";
			setcookie("Shopping_List", $cookie_value1, time() + (86400), "/");
			setcookie("Quantity", $cookie_value2, time() + (86400), "/");
			echo "<script>";
			echo "alert('Added in your cart! ;)');";
			echo "window.location.replace(\"index.php\");";
			echo "</script>";
		}
		else{
			$cookie_value1 = $_COOKIE['Shopping_List'].$_GET['addcart'].",";
			$cookie_value2 = $_COOKIE['Quantity'].$_GET['quantity'].",";
			setcookie("Shopping_List", $cookie_value1, time() + (86400), "/");
			setcookie("Quantity", $cookie_value2, time() + (86400), "/");
			echo "<script>";
			echo "alert('Added in your cart! ;)');";
			echo "window.location.replace(\"index.php\");";
			echo "</script>";
		}
	}
	else{
		echo "alert('Sorry! System Error. :( Please Try Again.')";	
	}
	
?>