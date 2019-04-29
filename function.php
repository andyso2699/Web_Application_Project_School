<html>
	<head>
		<link rel="stylesheet" href="./css/css1.css">
		<script>
		document.getElementById("myBtn").click();

			// Accordion
			function myAccFunc() {
				var x = document.getElementById("show");
				var y = document.getElementById("category");
					if (x.className.indexOf("w3-show") == -1) {
					x.className += " w3-show";
					y.className += " w3-light-grey";
					} else {
					x.className = x.className.replace(" w3-show", "");
					y = document.getElementById("category").className.replace(" w3-light-grey","");
					}
			}
			
			function search_validation(){
			var check = [document.forms["search"]["searchbar"].value,document.forms["search"]["searchoption"].value];
			if (check[0] == '' || check[0] == null || check[1] == '' || check[1] == null) {
			alert("Something is missing!");
			return false;
			}}
			
			function quit(){
			var r = confirm("You're quitting! Are you sure?");
			if (r == true) {
			window.location.href="logout.php";}
			}
		</script>
	</head>
		<body>
			<?php
			
			if(!isset($_SESSION)) { session_start(); } 
			
			function sidebar($pagename) {
				echo "<nav class='w3-sidebar w3-bar-block w3-white w3-collapse w3-top' style='z-index:3;width:260px;border-right:1px solid;'>";
					echo "<div class='w3-padding'>";
						echo "<a href='./index.php'><img src='./Image/Logo.png' style='height: 200px;'></img></a>";
					echo "</div>";
					echo "<div class='w3-padding-24 w3-large w3-text-grey' style='font-weight:bold;'>";
						echo "<div style='border-top:2px solid;border-bottom:2px solid;padding-top:10px;color:black;'>";
						
						
						if (isset($_SESSION['login'])) {
							if ($_SESSION['login'] <> "TRUE") {
							echo "<form action='login_process.php' method='post' style='font-size:16px;'>";
							echo "&nbsp;&nbsp;Username<br>";
							echo "&nbsp;&nbsp;<input type='text' name='username' required style='width:200px;margin-top:10px;'><br><br>";
							echo "&nbsp;&nbsp;Password<br>";
							echo "&nbsp;&nbsp;<input type='password' name='password' required style='width:200px;margin-top:10px;'><br><br>";
							echo "&nbsp;&nbsp;<input type='submit' value='Log In'>";
							echo "&nbsp;&nbsp;<button type='button' onclick='location.href=\"signup.php\";' style='font-size:16px;'>Sign Up</button>";
							echo "</form>";
							} else {
							echo "<p style='font-size:14px; margin-left:10px;'>You are ".$_SESSION['user']." (UID #".$_SESSION['UID'].")<br>";
							echo "Welcome!!<br>";
							echo "You still have ".$_SESSION['cp']." Cash Points!<br>";
							echo "Delivery Address: ".$_SESSION['daddress']."<br></p>";
							echo "<button type='button' onclick='location.href=\"userinfo.php\";' style='font-size:14px;margin:0px 0px 10px 10px;'>My Info.</button>";
							echo "<button type='button' onclick='quit();' style='font-size:14px;margin:0px 0px 10px 10px;'>Log Out</button>";
							}
						} else {
							echo "<form action='login_process.php' method='post' style='font-size:16px;'>";
							echo "&nbsp;&nbsp;Username<br>";
							echo "&nbsp;&nbsp;<input type='text' name='username' required style='width:200px;margin-top:10px;'><br><br>";
							echo "&nbsp;&nbsp;Password<br>";
							echo "&nbsp;&nbsp;<input type='password' name='password' required style='width:200px;margin-top:10px;'><br><br>";
							echo "&nbsp;&nbsp;<input type='submit' value='Log In'>";
							echo "&nbsp;&nbsp;<button type='button' onclick='location.href=\"signup.php\";' style='font-size:16px;'>Sign Up</button>";
							echo "</form>";
						}
						
						echo "</div>";
						echo "<a href='index.php' class='w3-bar-item w3-button ".($pagename=='index.php'? "w3-light-grey": "")."'>Main Page</a>";
						echo "<a href='about_us.php' class='w3-bar-item w3-button ".($pagename=='about_us.php'? "w3-light-grey": "")."'>About Us</a>";
						echo "<a onclick='myAccFunc()' id='category' href='javascript:void(0)' class='w3-button w3-block  w3-left-align'>Category <img src='./Image/cart.png' style='height:20px;'></img></a>";
							echo "<div id='show' class='w3-bar-block w3-hide w3-padding w3-medium'>";
								echo "<a href='c_accessories.php' class='w3-bar-item w3-button ".($pagename=='c_accessories.php'? "w3-light-grey": "")."'>Accessories</a>";
								echo "<a href='c_appliances.php' class='w3-bar-item w3-button ".($pagename=='c_appliances.php'? "w3-light-grey": "")."'>Appliances</a>";
								echo "<a href='c_computer.php' class='w3-bar-item w3-button ".($pagename=='c_computer.php'? "w3-light-grey": "")."'>Computer</a>";
								echo "<a href='c_toysnstationaries.php' class='w3-bar-item w3-button ".($pagename=='c_toysnstationaries.php'? "w3-light-grey": "")."'>Toys & Stationaries</a>";
								echo "<a href='c_softwarencd.php' class='w3-bar-item w3-button ".($pagename=='c_softwarencd.php'? "w3-light-grey": "")."'>Software & CD</a>";
								echo "<a href='c_petgoods.php' class='w3-bar-item w3-button ".($pagename=='c_petgoods.php'? "w3-light-grey": "")."'>Pet Goods</a>";
							echo "</div>";
						echo "<a href='donation.php' class='w3-bar-item w3-button ".($pagename=='donation.php'? "w3-light-grey": "")."'>What can I donate?</a>";
						echo "<a href='location.php' class='w3-bar-item w3-button ".($pagename=='location.php'? "w3-light-grey": "")."'>Store Locations</a>";
						echo "<a href='#footer' class='w3-bar-item w3-button'>Contact Us</a>";
						echo "<a href='http://www.salvationarmy.org.hk/en/' target='_blank' class='w3-bar-item w3-button'>Salvation Army HK</a>";
					echo "</div>";
					echo "</nav>";
			}
			
			function topheader($pagename){
				$pagename1 = "";
				if($pagename == "index.php"){
					$pagename1 = "Main Page";
				} elseif ($pagename == "about_us.php"){
					$pagename1 = "About Us";
				} elseif($pagename == "c_accessories.php"){
					$pagename1 = "Accessories";
				} elseif($pagename == "c_appliances.php"){
					$pagename1 = "Appliances";
				} elseif($pagename == "c_computer.php"){
					$pagename1 = "Computer";
				} elseif($pagename == "c_petgoods.php"){
					$pagename1 = "Pet Goods";
				} elseif($pagename == "c_softwarencd.php"){
					$pagename1 = "Software & CD";
				} elseif($pagename == "c_toysnstationaries.php"){
					$pagename1 = "Toys & Stationaries";
				} elseif($pagename == "donation.php"){
					$pagename1 = "Donation";
				} elseif($pagename == "location.php"){
					$pagename1 = "Locations";
				}elseif($pagename == "search.php"){
					$pagename1 = "Search";
				}elseif($pagename == "signup.php"){
					$pagename1 = "Sign Up";
				}elseif($pagename == "userinfo.php"){
					$pagename1 = "User Info.";
				}elseif($pagename == "editinfo.php"){
					$pagename1 = "Edit Info.";
				}elseif($pagename == "admin_panel.php"){
					$pagename1 = "Admin Panel";
				}elseif($pagename == "cart.php"){
				$pagename1 = "Shopping Cart";
				}elseif($pagename == "delivery.php"){
				$pagename1 = "Delivery";
				}
				
				echo "<header class='w3-xlarge'>";
					echo "<p class='w3-left' style='font-size:32px;margin:15px 50px 15px 30px;font-weight: bold;'>". $pagename1 ."</p>";
					echo "<form action='search.php' name='search' onsubmit='return search_validation()'>";
						echo "<input type='text' name='searchbar' placeholder=' Search Bar (e.g. CD/Computer/100 to 500)' style='font-size:14px;height:40px;width:400px;margin:22px 0px 0px 120px;' required>";
						echo "<select name='searchoption' style='margin-left:10px;'>";
							echo "<option value=''>PLEASE CHOOSE</option>";				
							echo "<option value='key'>Keyword</option>";
							echo "<option value='category'>Category</option>";
							echo "<option value='cp'>Point Range</option>";						
						echo "</select>";
						echo "<input type='submit' name='search' value='Search' style='font-size:16px;margin:0px 0px 25px 25px;'>";
						echo "<p style='font-size:10px; margin: 28px 30px 0px 0px;display:inline-block;width:300px;text-align: right;position:absolute'>";
							echo "<img src='./Image/cart.png' style='height:25px;'></img>";
							echo "&nbsp;&nbsp;<a href='cart.php'>Selected Items</a>";
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='./Image/Person_Icon.png' style='height:25px;'></img>";

								if (isset($_SESSION['login'])) {
									if ($_SESSION['login'] <> "TRUE") {
									echo "Guest";
									} else {
									echo "<a href='userinfo.php'>".$_SESSION['user']."</a>";}
								} else {
								echo "Guest";}
							echo "</p>";
					echo "</form>";
				echo "</header>";
			}
			
			function footer(){
				//<!-- Footer -->
				echo "<footer class='w3-padding-64 w3-light-grey w3-small w3-center' id='footer'>";
					echo "<div class='w3-row-padding' style='width:1600px;'>";
						echo "<div class='w3-col s4' style='margin-left:30px;'>";
							echo "<h4 style='font-weight:bold;text-align:center;'>Form</h4>";
							echo "<p style='text-align:center;'>Ask here if you have any questions. :)</p>";
							echo "<form action='mailto:recycling@hkt.salvationarmy.org'>";
								echo "<p><input class='w3-input w3-border' type='text' placeholder='Name' name='Name' required='' style='left:13%;top:50%;position:relative;'></p>";
								echo "<p><input class='w3-input w3-border' type='text' placeholder='Email' name='Email' required='' style='left:13%;top:50%;position:relative;'></p>";
								echo "<p><input class='w3-input w3-border' type='text' placeholder='Subject' name='Subject' required='' style='left:13%;top:50%;position:relative;'></p>";
								echo "<p><input class='w3-input w3-border' type='text' placeholder='Message' name='Message' required='' style='left:13%;top:50%;position:relative;'></p>";
								echo "<button type='submit' class='w3-button w3-block w3-black w3-col s4' style='left:13%;top:50%;position:relative;width:410px'>Send</button>";
							echo "</form>";
						echo "</div>";

						echo "<div class='w3-col s4' style='padding:0px 0px 0px 0px;text-align:center;'>";
							echo "<h4 style='font-weight:bold;margin-bottom:30px;'>Sitemap</h4>";
							echo "<p style='margin-bottom:25px'><a href='index.php'>Main Page</a></p>";
							echo "<p style='margin-bottom:25px'><a href='about_us.php'>About Us</a></p>";
							echo "<p style='margin-bottom:25px'><a href='donation.php'>What can I donate?</a></p>";
							echo "<p style='margin-bottom:25px'><a href='location.php'>Store Location</a></p>";
						echo "</div>";

						echo "<div class='w3-col s4' style='padding:0px 0px 0px 0px;text-align:center;'>";
							echo "<h4 style='font-weight:bold'>Contact Us</h4>";
							echo "<p>The Salvation Army</p>";
							echo "<p>(852) 2332 4433</p>";
							echo "<p>sahk@sahk.edu.hk</p>";
							echo "<p style='margin:25px 0px 25px 0px;'></p>";
							echo "<h4 style='font-weight:bold'>We accept</h4>";
							echo "<p style='font-weight:bold;margin-top:30px;'>Cash Points ONLY</p>";
						echo "</div>";
					echo "</div>";
				echo "</footer>";
				echo "<div class='w3-black w3-center w3-padding-24' style='text-align:center;width:100%'>Special thanks W3School & Ejoe Tso</div>";
			}
			?>
		</body>
</html>