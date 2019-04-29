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
			echo "<img src='./Image/p1.jpg' style='width:70%;display:block;margin:0 auto;border:10px solid'></img>";
			echo "<p style='margin:20px 30px 30px 30px;text-align:justify;font-size:24px;font-weight:bold;'>The Salvation Army Recycling Centre welcomes both organisation and personal donations of clothing and goods. ";
			echo "Donated goods are sorted, distributed and sold in Family Stores in Hong Kong and Macau. The net proceeds will go to The Salvation Army for use across its invaluable community programmes.";
			echo "Some of the donated goods will be directly helping people in need, such as home alone elderly, street sleepers, ex-prisoners and CSSA recipients.</p>";

			footer();
		?>
		</div>
	</body>
</html>