<html>
	<head>
		<title>Savings - SA</title>
		<link rel="stylesheet" href="./css/css1.css">

	<body style="min-width:1280px; min-height:720px;">
		
		<?php
		$pagename=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
		
		include "function.php";
		sidebar($pagename);
		
		//<!-- !PAGE CONTENT! -->
		echo "<div class='w3-main' style='margin-left:255px;'>";
		topheader($pagename);
		
		include("./sql.php");
		$link = GETSQLLink();
		
		$option = trim($_GET['searchoption']);
		
		if($option == 'key'){
		$query = "select * from product where description like '%".$_GET['searchbar']."%';";
		$result = mysqli_query($link, $query);
		$getrows = mysqli_affected_rows($link);
		echo "<div class='w3-text-grey'>";
		echo "<p style='color:black;font-weight:bold;font-size:18px;margin: 24px 0px 0px 25px;'>New Items</p>";
		echo "<p style='margin:0px 0px 5px 25px;'>".$getrows." item".($getrows>1? "s":"")."</p>";
		echo "<div class='itemline'>";			
		
			if (!$row = mysqli_fetch_array($result)) {
			echo "<div class='itembox' style='font-weight:bold;color:black;'>";
			echo "No items matched<br>your search";
			echo "</div>";
			} else {
				do {
					echo "<div class='itembox' style='text-align:left;font-weight:bold;color:black;font-size:14px;'>";
						echo "<img src='".$row['image']."' style='height:45%;display:block;margin:0 auto;'></img>";
						echo "Product ID: ".$row['productid']."<br>";
						echo "Name: ".$row['productname']."<br>";
						echo "Category: ".$row['category']."<br>";
						echo "Quantity: ".$row['quantity']."<br>";
						echo "Price: ".$row['price']."<br>";
						echo "Status: <div style='margin:0px 0px 0px 0px;display:inline-block;".($row['status']=='Sold Out'? 'color:red;':'')."'>".$row['status']."</div><br>";				
							echo "<form action='iteminfo.php'>";
							echo "<button type='submit' value='".$row['productid']."' class='addtocart' name='addbutton' onclick='location.href=\"iteminfo.php\"'".($row['status']=='Sold Out'? 'disabled':'').">Info.</button>";
							echo "</form>";
					echo "</div>";
				}	while ($row = mysqli_fetch_array($result));
			}

		echo "</div>";
		}
		if($option == 'category'){
		$query = "select * from product where category like '%".$_GET['searchbar']."%';";
		$result = mysqli_query($link, $query);
		$getrows = mysqli_affected_rows($link);
		echo "<div class='w3-text-grey'>";
		echo "<p style='color:black;font-weight:bold;font-size:18px;margin: 24px 0px 0px 25px;'>New Items</p>";
		echo "<p style='margin:0px 0px 5px 25px;'>".$getrows." item".($getrows>1? "s":"")."</p>";
		echo "<div class='itemline'>";			
		
			if (!$row = mysqli_fetch_array($result)) {
			echo "<div class='itembox' style='font-weight:bold;color:black;'>";
			echo "No items matched<br>your search";
			echo "</div>";
			} else {
				do {
					echo "<div class='itembox' style='text-align:left;font-weight:bold;color:black;font-size:14px;'>";
						echo "<img src='".$row['image']."' style='height:45%;display:block;margin:0 auto;'></img>";
						echo "Product ID: ".$row['productid']."<br>";
						echo "Name: ".$row['productname']."<br>";
						echo "Category: ".$row['category']."<br>";
						echo "Quantity: ".$row['quantity']."<br>";
						echo "Price: ".$row['price']."<br>";
						echo "Status: <div style='margin:0px 0px 0px 0px;display:inline-block;".($row['status']=='Sold Out'? 'color:red;':'')."'>".$row['status']."</div><br>";				
						echo "<button class='addtocart' type='button' ".($row['status']=='Sold Out'? 'disabled':'').">Add to Cart</button>";
					echo "</div>";
				}	while ($row = mysqli_fetch_array($result));
			}

		echo "</div>";
		}
		if($option == 'cp'){
		$searchoption[0] = substr($_GET['searchbar'], 0, strpos($_GET['searchbar'], ' '));
		$searchoption[1] = substr($_GET['searchbar'], strpos($_GET['searchbar'], 't')+3,strlen($_GET['searchbar']));
		$query = "select * from product where price >= '".$searchoption[0]."' and price <= '".$searchoption[1]."';";
		$result = mysqli_query($link, $query);
		$getrows = mysqli_affected_rows($link);
		echo "<div class='w3-text-grey'>";
		echo "<p style='color:black;font-weight:bold;font-size:18px;margin: 24px 0px 0px 25px;'>New Items</p>";
		echo "<p style='margin:0px 0px 5px 25px;'>".$getrows." item".($getrows>1? "s":"")."</p>";
		echo "<div class='itemline'>";			
		
			if (!$row = mysqli_fetch_array($result)) {
			echo "<div class='itembox' style='font-weight:bold;color:black;'>";
			echo "No items matched<br>your search";
			echo "</div>";
			} else {
				do {
					echo "<div class='itembox' style='text-align:left;font-weight:bold;color:black;font-size:14px;'>";
						echo "<img src='".$row['image']."' style='height:45%;display:block;margin:0 auto;'></img>";
						echo "Product ID: ".$row['productid']."<br>";
						echo "Name: ".$row['productname']."<br>";
						echo "Category: ".$row['category']."<br>";
						echo "Quantity: ".$row['quantity']."<br>";
						echo "Price: ".$row['price']."<br>";
						echo "Status: <div style='margin:0px 0px 0px 0px;display:inline-block;".($row['status']=='Sold Out'? 'color:red;':'')."'>".$row['status']."</div><br>";				
						echo "<button class='addtocart' type='button' ".($row['status']=='Sold Out'? 'disabled':'').">Add to Cart</button>";
					echo "</div>";
				}	while ($row = mysqli_fetch_array($result));
			}

		echo "</div>";
		}
		
		
			footer();
		?>
		</div>
	</body>
</html>