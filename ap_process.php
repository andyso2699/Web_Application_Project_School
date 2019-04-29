<html>
	<body>
	
	<?php
	session_start();
	include("./sql.php");
	$link = GETSQLLink();
	
	if ($_POST['ap'] == '1'){
	$uid =trim( $_POST['uid']);
	$adminpw = md5(trim($_POST['adminpw']));
	$cp = trim($_POST['cp']);

	$query = "select * from user where userid = ". $_SESSION['UID'] ." and password = '". $adminpw ."';";
	$result = mysqli_query($link, $query);
	$getrows = mysqli_affected_rows($link);

		if ($getrows==0) {
		echo "<script> alert('Wrong Admin Password or wrong uid. Please Type Again.');";
		echo "window.location.replace(\"admin_panel.php\");";
		echo "</script>";
		} else {
		$query = "UPDATE user SET cp = cp + ". $cp ." WHERE userid = ". $uid .";";
		$result = mysqli_query($link, $query);	
		$getrows = mysqli_affected_rows($link);
			if ($getrows==0) {
			echo "<script> alert('Update failed.');";
			echo "window.location.replace(\"admin_panel.php\");";
			echo "</script>";
			}else{
			echo "<script> alert('Update Success.');";
			echo "window.location.replace(\"admin_panel.php\");";
			echo "</script>";
			}
		mysqli_close($link);
		}
	}

	if ($_POST['ap'] == '2'){
		
		if ($_POST['item'] != '1'){
		$productid =trim( $_POST['productid']);
		}
		if ($_POST['item'] != '3'){
		$productname =trim( $_POST['productname']);
		$description = trim($_POST['description']);
		$category = trim($_POST['category']);
		$price = trim($_POST['price']);
		$quantity = trim($_POST['quantity']);
		$image = trim($_POST['image']);
		}
		if ($_POST['item'] == '2'){
		$status =trim( $_POST['status']);
		}
		$adminpw = md5(trim($_POST['adminpw']));

	$query = "select * from user where userid = ". $_SESSION['UID'] ." and password = '". $adminpw ."';";
	$result = mysqli_query($link, $query);
	$getrows = mysqli_affected_rows($link);
	
		if ($getrows==0) {
			echo "<script> alert('Wrong Admin Password or wrong uid. Please Type Again.');";
			echo "window.location.replace(\"admin_panel.php\");";
			echo "</script>";
			
		} elseif ($_POST['item'] == '1'){

			$query = "INSERT INTO product (productname,description,category,price,quantity,image,status) VALUES('$productname', '$description', '$category', '$price','$quantity','$image','On Sale')";
			$result = mysqli_query($link, $query); 
			mysqli_close($link);
			If ($result){
			echo "<script> alert('Create Item Success!');";
			echo "window.location.replace(\"admin_panel.php\");";
			echo "</script>";}
			else{
			echo "<script> alert('Create Item Failure!');";
			echo "window.location.replace(\"admin_panel.php\");";
			echo "</script>";}
			
			} elseif ($_POST['item'] == '2'){
				
				$query = "UPDATE product SET productname = '". $productname ."', description = '".$description."', category = '".$category."', price = '".$price."', quantity = '".$quantity."', status = '".$status."' WHERE productid = ". $productid .";";
				$result = mysqli_query($link, $query); 
				mysqli_close($link);
				If ($result){
				echo "<script> alert('Modify Item Success!');";
				echo "window.location.replace(\"admin_panel.php\");";
				echo "</script>";}
				else{
				echo "<script> alert('Modify Item Failure!');";
				echo "window.location.replace(\"admin_panel.php\");";
				echo "</script>";}
		} elseif ($_POST['item'] == '3'){
			
			
			$query = "DELETE FROM product WHERE productid = ". $productid .";";
			$result = mysqli_query($link, $query); 
			mysqli_close($link);
			If ($result){
			echo "<script> alert('Delete Item Success!');";
			echo "window.location.replace(\"admin_panel.php\");";
			echo "</script>";}
			else{
			echo "<script> alert('Delete Item Failure!');";
			echo "window.location.replace(\"admin_panel.php\");";
			echo "</script>";}
		}
	} 
	
	if ($_POST['ap'] == '3'){
		
	}



	?>
	</body>
</html>
