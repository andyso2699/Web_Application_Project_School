<html>
	<body>
	
		<?php
		function GetSQLLink() {
		$link = mysqli_connect("localhost", "root", "");
		if ($link == false) {
		echo('Cannot connect to database server! Please check the connection.');
		exit();
		}
		mysqli_select_db($link, "sahk_savings");
		mysqli_set_charset($link, "utf8");
		return $link;
		}
		?>

	</body>
</html>
