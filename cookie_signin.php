<?php
if(!isset($_SESSION)) { session_start(); } 

function cookie(){
		setcookie("Shopping_List", "id", time() + (86400), "/");
		setcookie("Quantity", "amount", time() + (86400), "/");
}
?>
<html>
	<body>
	<?php
	echo "<script> alert('You have successfully login the page.');";
	echo "window.location.replace(\"index.php\");";
	echo "</script>";
	?>
	</body>
</html>