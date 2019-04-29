<html>
	<head>
		<title>Savings - SA</title>
		<link rel="stylesheet" href="./css/css1.css">

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
			
			echo "<div style='margin:20px 30px 30px 30px;text-align:justify;'><p style='font-size:20px;font-weight:bold;'>User's Information - ". $_SESSION['user'] ."</p>";
			echo "<p  style='font-size:18px;font-weight:bold;margin-left:20px;'>UID: ". $_SESSION['UID'];
			echo "<br><br>Username: ". $_SESSION['user'];
			echo "<br><br>Cash Point: ". $_SESSION['cp'];
			echo "<br><br>Delivery Address: ". $_SESSION['daddress'] ."</p></div>";
			echo "<button type='button' onclick='location.href=\"editinfo.php\";' style='font-weight:bold;font-size:14px;margin:0px 0px 10px 50px;'>Edit Information</button>";
			echo "<br><br><button type='button' onclick='location.href=\"order_history.php\";' style='font-weight:bold;font-size:14px;margin:0px 0px 10px 50px;'>Order History</button>";
			echo "<br><br><button type='button' onclick='location.href=\"index.php\";' style='font-weight:bold;font-size:14px;margin:0px 0px 10px 50px;'>Go Shopping!</button>";
				if($_SESSION['isadmin']==1){
				echo "<br><br><button type='button' onclick='location.href=\"admin_panel.php\";' style='font-weight:bold;font-size:14px;margin:0px 0px 10px 50px;'>Admin Panel</button>";
				}
			}
		} else {
		echo "<script> window.location.replace(\"index.php\");</script>";
		}

			footer();
		?>
		</div>
	</body>
</html>