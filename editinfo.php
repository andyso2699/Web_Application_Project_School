<html>
	<head>
		<title>Savings - SA</title>
		<link rel="stylesheet" href="./css/css1.css">
		<script>
		function validation(){
			var y = document.forms["editinfo"]["password"].value;
			var z = document.forms["editinfo"]["cpassword"].value;
			
			if (y != z){
			alert("Password is not the same with the confirmed one!\nPlease type again!."); 
			return false;}
			
		}
		</script>
	</head>
	<body style="min-width:1280px; min-height:720px;">
		
		<?php
		session_start();
		if (isset($_SESSION['login'])) {
			if ($_SESSION['login'] <> "TRUE") {
			echo "<script> window.location.replace(\"index.php\");</script>";
			} else {
			$pagename=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
			
			include "function.php";
			sidebar($pagename);
			
			//<!-- !PAGE CONTENT! -->
			echo "<div class='w3-main' style='margin-left:255px;'>";
			topheader($pagename);
			
			echo "<h1 style='text-align:center;font-weight:bold;border-top:4px solid;border-bottom:4px solid;margin-bottom:0px;'>Edit Information</h1>";
			echo "<h2 style='font-weight:bold;margin-left:20px;'>Please Fill ALL the blanks, even the field is unchanged.</h2>";
			echo "<div style='margin:10px 0px 0px 40px;'>";
			echo "<form action='editinfo_process.php' onSubmit='return validation()' name='editinfo' method='post' style='font-size:20px;font-weight:bold;'>";
			echo "<br>Username: <input type='text' name='username' required>";
			echo "<br><br>Delivery Address: <input type='text' name='daddress' required>";
			echo "<br><br>Password: <input type='password' name='password' required>";
			echo "<br><br>Confirmed Password: <input type='password' name='cpassword' required>";
			echo "<br><br><input type='submit' value='Submit'>";
			echo "<input style='margin-left:20px;' type='reset' value='Reset'>";
			echo "</form>";
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