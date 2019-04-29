<?php
	
	if(isset($_COOKIE['Shopping_List']) && isset($_COOKIE['Quantity'])){
	
			$cookie_value1 = "id";
			$cookie_value2 = "amount";
			setcookie("Shopping_List", $cookie_value1, time() + (86400), "/");
			setcookie("Quantity", $cookie_value2, time() + (86400), "/");
			echo "<script>";
			echo "alert('Record Deleted. :)');";
			echo "window.location.replace(\"index.php\");";
			echo "</script>";
		}
	else{
		echo "alert('Sorry! System Error. :( Please Try Again.')";	
	}
	
?>