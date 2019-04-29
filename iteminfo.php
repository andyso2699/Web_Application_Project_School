<html>
	<head>
		<title>Savings - SA</title>
		<link rel="stylesheet" href="./css/css1.css">

	<body style="min-width:1280px; min-height:720px;">
		
		<?php
		session_start();
		
		if (isset($_SESSION['login'])) {
			if ($_SESSION['login'] <> "TRUE") {
			echo "<script> alert ('Please Log In to see more information. :)');";
			echo "window.location.replace(\"index.php\");";
			echo "</script>";
			} else {
			$pagename=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
			
			include "function.php";
			sidebar($pagename);
			
			//<!-- !PAGE CONTENT! -->
			echo "<div class='w3-main' style='margin-left:255px;'>";
			topheader($pagename);
			
			echo "<h1 style='text-align:center;font-weight:bold;border-top:4px solid;border-bottom:4px solid;margin-bottom:0px;'>Item Information</h1>";
			 
			include("./sql.php");
			$link = GETSQLLink();
			
			$query = "select * from product where productid = '".$_GET['addbutton']."';";
			$result = mysqli_query($link, $query);
			
				if ($row = mysqli_fetch_array($result)) {
				echo "<div style='margin:0px 0px 0px 20px;font-size:24px;font-weight:bold;'>";
					echo "<br><img src='".$row['image']."' style='width:40%;' ></img><br><br>";
					echo "Product ID: ".$row['productid']."<br><br>";
					echo "Product Name: ".$row['productname']."<br><br>";
					echo "Description: ". $row['description'] ."<br><br>";
					echo "Category: ".$row['category']."<br><br>";
					echo "Quantity: ".$row['quantity']."<br><br>";
					echo "Price: ".$row['price']."<br><br>";
					echo "Status: <div style='margin:0px 0px 0px 0px;display:inline-block;".($row['status']=='Sold Out'? 'color:red;':'')."'>".$row['status']."</div><br>";				
					echo "<form action='cookie_addtocart.php'>";
						echo "<br>Numbers you want: <input type='text' name='quantity'><br>";
						echo "<br><button type='submit' name='addcart' value = '".$_GET['addbutton']."' style='margin-bottom:20px;' ".($row['status']=='Sold Out'? 'disabled':'').">Add to Cart</button>";
					echo "</form>";
				echo "</div>";
				}
			}
		} else {
		echo "<script> alert ('Please Log In to see more information. :)');";
		echo "window.location.replace(\"index.php\");";
		echo "</script>";
		}
			footer();
		?>
		</div>
	</body>
</html>