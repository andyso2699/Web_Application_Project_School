<html>
	<head>
		<title>Savings - SA</title>
		<link rel="stylesheet" href="./css/css1.css">
		<script>
		function validation(){
			var x = document.forms["register"]["username"].value;
			var y = document.forms["register"]["password"].value;
			var z = document.forms["register"]["cpassword"].value;
			var a = document.forms["register"]["a"].value;
			
			if (x == "") {
			alert("Please type your name.");
			return false;}
			if (y != z){
			alert("Password is not the same with the confirmed one!\nPlease type again!."); 
			return false;}
			if (a == "") {
			alert("Please type your delivery address!");
			return false;}
			
		}
		</script>
	</head>
	<body style="min-width:1280px; min-height:720px;">
		
		<?php
		$pagename=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
		
		include "function.php";
		sidebar($pagename);
		
		//<!-- !PAGE CONTENT! -->
		echo "<div class='w3-main' style='margin-left:255px;'>";
		topheader($pagename);

			echo "<form name='register' action='signup_process.php'  onsubmit='return validation()' method='post'style='left:30%;position:relative;font-size:20px;font-weight:bold;'>";
				echo "&nbsp;&nbsp;It is really simple! Only 4 Steps!<br><br>";
				echo "&nbsp;&nbsp;Username<br>";
				echo "&nbsp;&nbsp;<input type='text' name='username' style='width:400px;margin-top:10px;'><br><br>";
				echo "&nbsp;&nbsp;Password<br>";
				echo "&nbsp;&nbsp;<input type='password' name='password' style='width:400px;margin-top:10px;'><br><br>";
				echo "&nbsp;&nbsp;Confirmed Password<br>";
				echo "&nbsp;&nbsp;<input type='password' name='cpassword' style='width:400px;margin-top:10px;'><br><br>";
				echo "&nbsp;&nbsp;Delivery Address<br>";
				echo "&nbsp;&nbsp;<input type='text' name='a' style='width:400px;margin-top:10px;'><br><br>";
				echo "&nbsp;&nbsp;<input type='submit' value='Sign Up'>";
				echo "&nbsp;&nbsp;<input type='reset' value='Reset'>";
			echo "</form>";

		footer();
		?>
		</div>
	</body>
</html>