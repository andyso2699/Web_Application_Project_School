<html>
	<body>
	
	<?php
	session_start();
	include("./sql.php");
	$link = GETSQLLink();

	$user =trim( $_POST['username']);
	$pass = md5(trim($_POST['password']));

	$query = "select * from user where username = '$user' and password = '$pass';";
	$result = mysqli_query($link, $query);

	if (!$row = mysqli_fetch_array($result)) {
	echo "<script> alert('You have typed wrong password. Please Type Again.');";
	echo "window.location.replace(\"index.php\");";
	echo "</script>";
	$_SESSION['login'] = "FALSE";
	} else {
	$_SESSION['login'] = "TRUE";
	$_SESSION['user'] = $user;
	$_SESSION['UID'] = $row["userid"];
	$_SESSION['cp'] = $row["cp"];
	$_SESSION['daddress'] = $row["daddress"];
	$_SESSION['isadmin'] = $row["isadmin"];
	mysqli_close($link);
	
	include("./cookie_signin.php");
	cookie();
	}
	?>
	</body>
</html>
