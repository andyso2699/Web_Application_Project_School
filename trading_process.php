	<?php
	session_start();
	include("./sql.php");
	$link = GETSQLLink();

	$pw = md5(trim($_POST['password']));
	
	$query = "select * from user where userid = ". $_SESSION['UID'] ." and password = '". $pw ."';";
	$result = mysqli_query($link, $query);
	$getrows = mysqli_affected_rows($link);

		if ($getrows==0) {
			echo "<script> alert('Wrong Password. Please Type Again.');";
			echo "window.location.replace(\"delivery.php\");";
			echo "</script>";
		} 
		else if($_COOKIE['Shopping_List'] != "id" && $_COOKIE['Quantity'] != "amount"){
				$pid = $_COOKIE['Shopping_List'];
				$qty = $_COOKIE['Quantity'];
				$pid = explode(",",$pid);
				$qty = explode(",",$qty);
				$total = 0;
				
				for($x=0;$x<sizeof($pid)-1;$x++){
				$query = "select * from product where productid = '". $pid[$x] ."';";
				$result = mysqli_query($link, $query);
			
					if (!$row = mysqli_fetch_array($result)) {
					echo "<script> alert('System Error. :(');";
					echo "window.location.replace(\"delivery.php\");";
					echo "</script>";
					} 
					else if(($row['quantity']-$qty[$x]) < 0){
							echo "<script> alert('Product: ".$row['productname']." is not enough for you. :(');";
							echo "window.location.replace(\"delivery.php\");";
							echo "</script>";
						}
				$total = $total + ($qty[$x]*$row['price']);
				}
				
				if($_POST['d'] == 1){	
					$total = ($total*0.95);
				}
				
				if(($_SESSION['cp'] - $total) < 0){
					echo "<script> alert('You do not have enough cash point. :(');";
					echo "window.location.replace(\"delivery.php\");";
					echo "</script>";
				} 
				else {
					$query = "update user set cp = cp-".$total." where userid = '".$_SESSION['UID']."'";	
					$result = mysqli_query($link, $query);
					$row = mysqli_fetch_array($result);
					
					$query = "select * from user where userid = ".$_SESSION['UID']."";	
					$result = mysqli_query($link, $query);
					$row = mysqli_fetch_array($result);
					$_SESSION["cp"] = $row["cp"];
				}
				
				
				for($x=0;$x<sizeof($pid)-1;$x++){
				$query = "select * from product where productid = '". $pid[$x] ."';";	
				$result = mysqli_query($link, $query);
			
					if (!$row = mysqli_fetch_array($result)) {
						echo "<script> alert('System Error. :(');";
						//echo "window.location.replace(\"delivery.php\");";
						echo "</script>";
					}
					else{
						$query = "update product set quantity = quantity-1 where productid = '".$pid[$x]."'";	
						$result = mysqli_query($link, $query);
					}
				}
				$cookie_value1 = "id";
				$cookie_value2 = "amount";
				setcookie("Shopping_List", $cookie_value1, time() + (86400), "/");
				setcookie("Quantity", $cookie_value2, time() + (86400), "/");
				echo "<script> alert('Success! :D');";
				echo "window.location.replace(\"index.php\");";
				echo "</script>";
				
			}
			else{
			echo "<script> alert('No Records. Please Try Again.');";
			echo "window.location.replace(\"delivery.php\");";
			echo "</script>";
			}	
	mysqli_close($link);
	
	?>

