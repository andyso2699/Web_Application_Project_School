<html>
	<head>
	
		<title>Savings - SA</title>
		<link rel="stylesheet" href="./css/css1.css">
		<script>
		function deleterec(){		
		var r = confirm("You're deleting all the records! Are you sure?");
		if (r == true) {
		window.location.href="cookie_deleterec.php";}
		}
		</script>
	</head>

	<body style="min-width:1280px; min-height:720px;">
		
		<?php
		session_start();
		
		if (isset($_SESSION['login'])) {
			if ($_SESSION['login'] <> "TRUE") {
			echo "<script>alert ('Please Log In first. :)');";
			echo "window.location.replace(\"index.php\");</script>";
			} else {
			$pagename=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
			
			include "function.php";
			sidebar($pagename);
			
			//<!-- !PAGE CONTENT! -->
			echo "<div class='w3-main' style='margin-left:255px;'>";
			topheader($pagename);
			
			echo "<h1 style='text-align:center;font-weight:bold;border-top:4px solid;border-bottom:4px solid;margin-bottom:0px;'>Shopping Cart</h1>";
			
				if($_COOKIE['Shopping_List'] != "id" && $_COOKIE['Quantity'] != "amount"){
				$pid = $_COOKIE['Shopping_List'];
				$qty = $_COOKIE['Quantity'];
				$pid = explode(",",$pid);
				$qty = explode(",",$qty);
				
				include("./sql.php");
				$link = GETSQLLink();
				$total = 0;
				
				echo "<div class='itemline'>";
				for ($x = 0;$x < sizeof($pid)-1;$x++){

				$query = "select * from product where productid = '".$pid[$x]."';";
				$result = mysqli_query($link, $query);
				
				if (!$row = mysqli_fetch_array($result)) {
				echo "<script> alert('System Error. :(');";
				echo "window.location.replace(\"index.php\");";
				echo "</script>";
				} else {
						echo "<div class='itembox' style='text-align:left;font-weight:bold;color:black;font-size:14px;'>";
							echo "<img src='".$row['image']."' style='height:45%;display:block;margin:0 auto;'></img><br>";
							echo "Product ID :".$row['productid']."<br>";
							echo "Name :".$row['productname']."<br>";
							echo "Category :".$row['category']."<br>";
							echo "Quantity: ".$qty[$x]."/".$row['quantity']."<br>";
							echo "Price :".($qty[$x]*$row['price'])."<br>";
							$total = $total + ($qty[$x]*$row['price']);
							echo "Status :".$row['status']."<br>";echo "</form>";
						echo "</div>";
				}}
				echo "</div>";
				mysqli_close($link);
				echo "<h1 style='text-align:right;font-weight:bold;border-top:4px solid;border-bottom:4px solid;'>Total: ".$total;
				echo "<br><button onclick='location.href=\"delivery.php\";' style='font-size:24px;margin:20px 10px 20px 0px;'>Buy Now!</button>";
				echo "<button onclick='deleterec();' style='float:left;font-size:24px;margin:20px 10px 20px 20px;'>Delete All Record</button></h1>";
				}
				else {
				echo "<p style='text-align:center;font-size:28px;font-weight:bold;'>It is empty, go shopping now!";
				} 	
			}
		} else {
		echo "<script>alert ('Please Log In first. :)');";
		echo "window.location.replace(\"index.php\");</script>";
		}

			footer();
		?>
		</div>
	</body>
</html>