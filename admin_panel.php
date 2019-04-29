<html>
	<head>
		<title>Savings - SA</title>
		<link rel="stylesheet" href="./css/css1.css">
		<script>
		var button = document.getElementById('button');
		var button1 = document.getElementById('button1');
		var button2 = document.getElementById('button2');
		
		function itemd(act){
		document.getElementById('create').style.display = 'none';
		document.getElementById('modify').style.display = 'none';
		document.getElementById('delete').style.display = 'none';
		document.getElementById(act.value).style.display = 'block';
		};

		function showdiv() {
		var div = document.getElementById('cprefill');
			if (div.style.display !== 'none') {
			div.style.display = 'none';
			}
			else {
			div.style.display = 'block';
			}};
		
		function showdiv1() {
		var div1 = document.getElementById('itemdetail');
			if (div1.style.display !== 'none') {
			div1.style.display = 'none';
			}
			else {
			div1.style.display = 'block';
			}};
			
		function showdiv2() {
		var div2 = document.getElementById('orderdetail');
			if (div2.style.display !== 'none') {
			div2.style.display = 'none';
			}
			else {
			div2.style.display = 'block';
			}};
			
		function validation_cp() {
			
		var cpcheck = [document.forms["cprefill"]["uid"].value,document.forms["cprefill"]["cp"].value,document.forms["cprefill"]["adminpw"].value];
		
			if (isNaN(cpcheck[0])) {
			alert("Please type in numbers!");
			return false;}
			else if(isNaN(cpcheck[1])){
			alert("Please type in numbers!");
			return false;
			}};
			
		function validation_item(a) {
		if (a.name == 'createitem'){
		var itemcheck = [document.forms["createitem"]["productname"].value,document.forms["createitem"]["description"].value,document.forms["createitem"]["category"].value,document.forms["createitem"]["price"].value,document.forms["createitem"]["quantity"].value,document.forms["createitem"]["image"].value,document.forms["createitem"]["adminpw"].value];
		for (var i = 0; i<itemcheck.length;i++){
			if (itemcheck[i] == '' || itemcheck[i] == null ) {
			alert("Something is missing!");
			return false;
			}
			if (i==3 || i==4){{
				if (isNaN(itemcheck[i])){
				alert ("Wrong Type!");
				return false;}}}	
		}}
		else if (a.name == 'modifyitem'){
		var itemcheck = [document.forms["modifyitem"]["productid"].value,document.forms["modifyitem"]["productname"].value,document.forms["modifyitem"]["description"].value,document.forms["modifyitem"]["category"].value,document.forms["modifyitem"]["price"].value,document.forms["modifyitem"]["quantity"].value,document.forms["modifyitem"]["image"].value,document.forms["modifyitem"]["status"].value,document.forms["modifyitem"]["adminpw"].value];
		for (var i = 0; i<itemcheck.length;i++){
			if (itemcheck[i] == '' || itemcheck[i] == null ) {
			alert("Something is missing!");
			return false;
			}
			if (i==0 || i==4 || i==5){
				if (isNaN(itemcheck[i])){
				alert ("Wrong Type!");
				return false;
				}}}
		} else if (a.name == 'deleteitem'){
			var itemcheck = [document.forms["deleteitem"]["productid"].value,document.forms["deleteitem"]["adminpw"].value];
			
			if (itemcheck[0] == '' || itemcheck[0] == null || itemcheck[1] == '' || itemcheck[1] == null) {
			alert("Something is missing!");
			return false;
			}
			var r = confirm("Are you sure?");
			if (r != true) {
			return false;
			}}};
		</script>
	</head>
	<body style="min-width:1280px; min-height:720px;">
		
		<?php
		session_start();
		if (isset($_SESSION['login'])) {
			if ($_SESSION['login'] <> "TRUE" || $_SESSION['isadmin'] == 0) {
			echo "<script> window.location.replace(\"index.php\");</script>";
			} else {
			$pagename=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
			
			include "function.php";
			sidebar($pagename);
			
			//<!-- !PAGE CONTENT! -->
			echo "<div class='w3-main' style='margin-left:255px;'>";
			topheader($pagename);
				
			echo "<h1 style='text-align:center;font-weight:bold;border-top:4px solid;border-bottom:4px solid;margin-bottom:0px;'>Admin Panel</h1>";
			echo "<h2 style='margin-top:0px;text-align:center;font-weight:bold;border-bottom:4px solid black;color:white;background-color:red;';>THIS IS A RESTRICTED AREA.</h2>";
			echo "<h2 style='text-align:center;font-weight:bold;'>OPTION</h2>";
			echo "<button onclick='showdiv()' style='font-size:18px;font-weight:bold;margin:0px 0px 0px 20px;'>Cash Point Refill</button>";
			echo "<button onclick='showdiv1()' style='font-size:18px;font-weight:bold;margin:0px 0px 0px 20px;'>Item Details</button>";
			echo "<button onclick='showdiv2()' style='font-size:18px;font-weight:bold;margin:0px 0px 0px 20px;'>Order Details</button>";
			echo "<p style='border:3px solid;width:100%;margin:0px 0px 0px 0px;'></p>";
			
			echo "<div id='cprefill' style='display:none;margin:20px 0px 0px 40px;'>";
				echo "<h2 style='font-weight:bold;'>Cash Point Refill</h2>";
				echo "<form action='ap_process.php' name='cprefill' method='post' onsubmit='return validation_cp()' style='font-size:20px;font-weight:bold;'>";
				echo "<br>UID: <input type='text' name='uid' required>";
				echo "<br><br>Cash Point Refill: <input type='text' name='cp' required>";
				echo "<br><br>Admin Password: <input type='password' name='adminpw' required>";
				echo "<input type='hidden' name='ap' value='1'>";
				echo "<br><br><input type='submit' value='Refill' required>";
				echo "<input style='margin-left:20px;' type='reset' value='Reset' required>";
				echo "</form>";
			echo "</div>";
			
			echo "<div id='itemdetail' style='display:none;margin:20px 0px 0px 40px;'>";
				echo "<h2 style='font-weight:bold;'>Item Details</h2>";
				
				echo "<select onChange='itemd(this)'>";
					echo "<option value=''>PLEASE CHOOSE</option>";				
					echo "<option value='create'>CREATE ITEMS</option>";
					echo "<option value='modify'>MODIFY ITEMS</option>";
					echo "<option value='delete'>DELETE ITEMS</option>";
				echo "</select><br>";
		
				echo "<div id='create' style='display:none;margin:20px 0px 0px 40px;'>";
					echo "<form action='ap_process.php' name='createitem' method='post' onsubmit='return validation_item(this)' style='font-size:20px;font-weight:bold;'>";
					echo "<p style='font-size:24px;margin-bottom:0px;'>Create Item</p>";
					echo "<br>Product Name: <input type='text' name='productname' required>";
					echo "<br><br>Description: <input type='text' name='description' required>";
					echo "<br><br>Category: ";
					echo "<select name='category'>";
						echo "<option value=''>PLEASE CHOOSE</option>";				
						echo "<option value='Accessories'>Accessory</option>";
						echo "<option value='Applications'>Application</option>";
						echo "<option value='Computer'>Computer</option>";
						echo "<option value='Toys'>Toy</option>";
						echo "<option value='Stationaries'>Stationary</option>";
						echo "<option value='Software'>Software</option>";
						echo "<option value='CD'>CD</option>";
						echo "<option value='Pet Goods'>Pet Goods</option>";						
					echo "</select>";
					echo "<br><br>Price: <input type='text' name='price' required>";
					echo "<br><br>Quantity: <input type='text' name='quantity' required>";
					echo "<br><br>Image Path: <input type='text' name='image' required>";
					echo "<br><br>Admin Password: <input type='password' name='adminpw' required>";
					echo "<input type='hidden' name='ap' value='2'>";
					echo "<input type='hidden' name='item' value='1'>";
					echo "<br><br><input type='submit' value='Submit' required>";
					echo "<input style='margin-left:20px;' type='reset' value='Reset' required>";
					echo "</form>";
				echo "</div>";
				
				echo "<div id='modify' style='display:none;margin:20px 0px 0px 40px;'>";
					echo "<form action='ap_process.php' name='modifyitem' method='post' onsubmit='return validation_item(this)' style='font-size:20px;font-weight:bold;'>";
					echo "<p style='font-size:24px;margin-bottom:0px;'>Modify Item</p>";
					echo "<br>Product ID: <input type='text' name='productid' required>";
					echo "<br><br>Product Name: <input type='text' name='productname' required>";
					echo "<br><br>Description: <input type='text' name='description' required>";
					echo "<br><br>Category: ";
					echo "<select name='category'>";
						echo "<option value=''>PLEASE CHOOSE</option>";				
						echo "<option value='Accessories'>Accessory</option>";
						echo "<option value='Applications'>Application</option>";
						echo "<option value='Computer'>Computer</option>";
						echo "<option value='Toys'>Toy</option>";
						echo "<option value='Stationaries'>Stationary</option>";
						echo "<option value='Software'>Software</option>";
						echo "<option value='CD'>CD</option>";
						echo "<option value='Pet Goods'>Pet Goods</option>";						
					echo "</select>";
					echo "<br><br>Price: <input type='text' name='price' required>";
					echo "<br><br>Quantity: <input type='text' name='quantity' required>";
					echo "<br><br>Image Path: <input type='text' name='image' required>";
					echo "<br><br>Status: <select name='status'>";
						echo "<option value=''>PLEASE CHOOSE</option>";				
						echo "<option value='On Sale'>On Sale</option>";
						echo "<option value='Sold Out'>Sold Out</option>";					
					echo "</select>";
					echo "<br><br>Admin Password: <input type='password' name='adminpw' required>";
					echo "<input type='hidden' name='ap' value='2'>";
					echo "<input type='hidden' name='item' value='2'>";
					echo "<br><br><input type='submit' value='Submit' required>";
					echo "<input style='margin-left:20px;' type='reset' value='Reset' required>";
					echo "</form>";
				echo "</div>";
				
				echo "<div id='delete' style='display:none;margin:20px 0px 0px 40px;'>";
					echo "<form action='ap_process.php' name='deleteitem' method='post' onsubmit='return validation_item(this)' style='font-size:20px;font-weight:bold;'>";
					echo "<p style='font-size:24px;margin-bottom:0px;'>Delete Item</p>";
					echo "<br>Product ID: <input type='text' name='productid' required>";
					echo "<br><br>Admin Password: <input type='password' name='adminpw' required>";
					echo "<input type='hidden' name='ap' value='2'>";
					echo "<input type='hidden' name='item' value='3'>";
					echo "<br><br><input type='submit' value='Submit' required>";
					echo "<input style='margin-left:20px;' type='reset' value='Reset' required>";
					echo "</form>";
				echo "</div>";
				
			echo "</div>";

			
			echo "<div id='orderdetail' style='display:none;margin:20px 0px 0px 40px;'>";
				echo "<h2 style='font-weight:bold;'>Order Details</h2>";
			echo "</div>";
			}
		} else {
		echo "<script> window.location.replace(\"index.php\");</script>";
		}
		footer();
		?>
		</div>
	</body>
</html>