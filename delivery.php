<html>
	<head>
		<title>Savings - SA</title>
		<link rel="stylesheet" href="./css/css1.css">
		<script>
		function delivery(act){
			if (act.value == "self"){
			document.getElementById('self').style.display = 'none';
			document.getElementById('da').style.display = 'none';
			document.getElementById(act.value).style.display = 'block';
			}
			if (act.value == "da"){
			document.getElementById('self').style.display = 'none';
			document.getElementById('da').style.display = 'none';
			document.getElementById(act.value).style.display = 'block';
			}
		};
		
		function check(a){
			if (a.name == 'sp'){
			var check = [document.forms["sp"]["location"].value,document.forms["sp"]["date"].value,document.forms["sp"]["password"].value];
				for (var i = 0; i<check.length;i++){
					if (check[i] == '' || check[i] == null ) {
					alert("Something is missing!");
					return false;
					}}
			}
			else if (a.name == 'da'){
				var check = document.forms["da"]["password"].value;
				if (check == '' || check == null ) {
				alert("Something is missing!");
				return false;
				}
			}
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
			} 
			else {
				$pagename=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
				
				include "function.php";
				sidebar($pagename);
				
				//<!-- !PAGE CONTENT! -->
				echo "<div class='w3-main' style='margin-left:255px;'>";
					topheader($pagename);
					echo "<h1 style='text-align:center;font-weight:bold;border-top:4px solid;border-bottom:4px solid;margin-bottom:0px;'>Delivery</h1>";
				
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
										} 
										else {
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
										}
								}
							echo "</div>";

							echo "<h1 style='margin-bottom:0px;margin-top:0px;text-align:right;font-weight:bold;border-top:4px solid;border-bottom:4px solid;'>";
								echo "<p style='text-align:left;margin-left:20px;margin-top:10px;font-size:24px;'>Choose Delivery Option</p>";
							
								echo "<select onChange='delivery(this)' style='float:left;margin-left:20px;'>";
									echo "<option value=''>PLEASE CHOOSE</option>";				
									echo "<option value='self'>Self-Pickup</option>";
									echo "<option value='da'>Deliver To Your Address</option>";
								echo "</select><br>";
					
								echo "<div id='self' style='margin-left:20px;display:none;text-align:left;'><p style='margin:0px 0px 0px 0px;'>Self-Pickup (5% Discount!)";
									echo "<form action='trading_process.php' method='post' name='sp' onsubmit='return check(this)'>";
										echo "<br><p style='font-size:24px;margin:0px 0px 10px 0px;'>Choose The Store</p>";
										echo "<select name='location' style='float:left;'>";
											echo "<option value=''>PLEASE CHOOSE</option>";				
											echo "<option value='ABD'>Aberdeen</option>";
											echo "<option value='WAC'>Wan Chai</option>";
											echo "<option value='CHW'>Chai Wan</option>";
											echo "<option value='SKW'>Shau Kei Wan</option>";
											echo "<option value='TIH'>Tin Hau</option>";
											echo "<option value='SWH'>Sai Wan Ho</option>";
											echo "<option value='WED'>Western District</option>";
											echo "<option value='NOP'>North Point</option>";
											echo "<option value='KWT'>Kwun Tong</option>";
											echo "<option value='WHP'>Whampoa</option>";
											echo "<option value='NAC'>Nam Cheong</option>";
											echo "<option value='YMT'>Yau Ma Tei</option>";
											echo "<option value='TKW'>To Kwa Wan</option>";
											echo "<option value='PRE'>Prince Edward</option>";
											echo "<option value='SHT'>Shatin</option>";
											echo "<option value='TUM'>Tuen Mun</option>";
											echo "<option value='MAC'>Macau</option>";
										echo "</select><br>";
										echo "<p style='font-size:24px;margin:-20px 0px 10px 0px;'>Type The Date</p>";
										echo "<input type='text' name='date' style='font-size:12px;width:25%;' placeholder='DD/MM/YYYY, e.g. type \"01/04/2017\"' required>";
										echo "<p style='font-size:24px;margin:20px 0px 10px 0px;' required>Confirmed Password</p>";
										echo "<input type='password' name='password' style='font-size:12px;width:20%;' required>";
										echo "<input type='hidden' name='d' value='1'>";
									echo "<p style='text-align:right;margin-right:50px;'>Total: ".round($total*0.95);
									echo "<br><button type='submit' onclick='location.href=\"delivery.php\";' style='font-size:24px;margin:20px 10px 20px 0px;'>Buy Now!</button></p>";
									echo "</form>";
								echo "</div>";

								echo "<div id='da' style='margin-left:20px;display:none;text-align:left;'>Delivery To Your Address";
									echo "<form action='trading_process.php' method='post' name='da' onsubmit='return check(this)'>";
										echo "<br><p style='font-size:24px;margin:-20px 0px 10px 0px;'>The Delivery Needs 4 Days</p>";
										echo "<input type='text' name='date' style='text-align:center;font-size:12px;width:10%;' value=".(date("d")+4)."/".date("m/Y")." disabled>";
										echo "<p style='font-size:24px;margin:20px 0px 10px 0px;'>Confirmed Password</p>";
										echo "<input type='password' name='password' style='font-size:12px;width:20%;'>";
										echo "<input type='hidden' name='d' value='2'>";
									echo "<p style='text-align:right;margin-right:50px;'>Total: ".$total;
									echo "<br><button onclick='location.href=\"delivery.php\";' style='font-size:24px;margin:20px 10px 20px 0px;'>Buy Now!</button></p>";
									echo "</form>";
								echo "</div>";
								
							echo "</h1>";
						}
						else {
							echo "<p style='text-align:center;font-size:28px;font-weight:bold;'>It is empty, go shopping now!";
						}
			}
		}
		else {
			echo "<script>alert ('Please Log In first. :)');";
			echo "window.location.replace(\"index.php\");</script>";
		}
		
		mysqli_close($link);
		footer();
		?>
		</div>
	</body>
</html>