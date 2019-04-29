<html>
	<body>
	
	<?php
	session_start();
	session_regenerate_id();
	session_destroy();

	$cookie_name1 = 'Shopping_List';
	$cookie_name2 = 'Quantity';
	unset($_COOKIE[$cookie_name1]);
	unset($_COOKIE[$cookie_name2]);
	$res = setcookie($cookie_name1, '', time() - (86400));
	$res = setcookie($cookie_name2, '', time() - (86400));
	
	echo "<script> alert('You have logged out.');";
	echo "window.location.replace(\"index.php\");";
	echo "</script>";
	?>
	</body>
</html>
