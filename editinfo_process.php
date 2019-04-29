<html>
	<body>
	
	<?php
	session_start();
	include("./sql.php");
	$link = GETSQLLink();

	$username =trim( $_POST['username']);
	$password = md5(trim($_POST['password']));
	$daddress = trim($_POST['daddress']);

	$query = "select * from user where username = '". $username ."';";
	$result = mysqli_query($link, $query);
	$getrows = mysqli_affected_rows($link);

	if ($getrows>0) {
	echo "<script> alert('Username has been using. Please Type Again.');";
	echo "window.location.replace(\"editinfo.php\");";
	echo "</script>";
	} else {
	$query = "UPDATE user SET username = '". $username ."', password = '".$password."', daddress = '".$daddress."' WHERE userid = ". $_SESSION['UID'] .";";
	$result = mysqli_query($link, $query);	
	$getrows = mysqli_affected_rows($link);
	
		if ($getrows==0) {
		echo "<script> alert('Update failed.');";
		echo "window.location.replace(\"editinfo.php\");";
		echo "</script>";
		}else{	
			
		$query = "select * from user where userid = '". $_SESSION['UID'] ."';";
		$result = mysqli_query($link, $query);	
			if (!$row = mysqli_fetch_array($result)) {
			echo "<script> alert('Update Success, but cannot retrieve data.');";
			echo "window.location.replace(\"editinfo.php\");";
			echo "</script>";
			} else {
			$_SESSION['user'] = $row["username"];
			$_SESSION['UID'] = $row["userid"];
			$_SESSION['cp'] = $row["cp"];
			$_SESSION['daddress'] = $row["daddress"];
			mysqli_close($link);
			echo "<script> alert('Update Success.');";
			echo "window.location.replace(\"userinfo.php\");";
			echo "</script>";
			}}

	}
	?>
	</body>
</html>
