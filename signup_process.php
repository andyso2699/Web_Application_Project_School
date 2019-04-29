<html>
	<body>
	
		<?php
		 include("./sql.php");
		$link = GETSQLLink();
		
		$username = trim($_POST["username"]); 
		$password = md5(trim($_POST["password"]));
		$da = trim($_POST["a"]);
		
		$check = mysqli_query($link, "SELECT * FROM user where username='$username'");
		$getrows = mysqli_affected_rows($link);
		
		if ($getrows==0){
		$query = "INSERT INTO USER (username,password,daddress,cp,isadmin) VALUES('$username', '$password', '$da', '10',false)";
		$result = mysqli_query($link, $query); 
		mysqli_close($link);
		If ($result){
		echo "<script> alert('User Registration Success!');";
		echo "window.location.replace(\"index.php\");";
		echo "</script>";}
		else{
		echo "<script> alert('User Registration Failure!');";
		echo "window.location.replace(\"index.php\");";
		echo "</script>";}}
		else{
		echo "<script> alert('User Name has been using!');";
		echo "window.location.replace(\"index.php\");";
		echo "</script>";}
		?>
	</body>
</html>
