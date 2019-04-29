<html>
	<head>
		<title>Savings - SA</title>
		<link rel="stylesheet" href="./css/css1.css">
	</head>
	<body style="min-width:1280px; min-height:720px;">
		
		<?php
		$pagename=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
		
		include "function.php";
		sidebar($pagename);
		
		//<!-- !PAGE CONTENT! -->
		echo "<div class='w3-main' style='margin-left:255px;'>";
		topheader($pagename);

			echo "<div style='margin:20px 30px 30px 30px;text-align:justify;'><p style='font-size:20px;font-weight:bold;'>What to donate?</p>";
				echo "<p  style='font-size:18px;font-weight:bold;margin-left:20px;'>Do Accept</p>";
				echo "<ul>";
					echo "<li>Clothing, footwear, handbags and accessories, either brand new or used in clean condition</li>";
					echo "<li>Electrical home appliances, computers and monitors in working order</li>";
					echo "<li>Toys, stationery, books, gifts and premiums, etc</li>";
					echo "<li>Software / DVD / VCD / CD with copyright</li>";
					echo "<li>Clean Pet Goods</li>";
				echo "</ul>";
			
				echo "<p  style='font-size:18px;font-weight:bold;margin-left:20px;'>Do Not Accept</p>";
				echo "<ul>";
					echo "<li>Furniture, used bed mattresses or bedding</li>";
					echo "<li>Medicine</li>";
					echo "<li>Food</li>";
					echo "<li>Worn-out or broken items</li>";
					echo "<li>Used kitchenware</li>";
					echo "<li>Used underwear or towels</li>";
					echo "<li>Books containing pornography, violence or evil spirit content</li>";
					echo "<li>Textbooks and magazines</li>";
					echo "<li>Fur products</li>";
				echo "</ul>";
			echo "</div>";

			echo "<div style='margin:20px 30px 30px 30px;text-align:justify;'><p style='font-size:20px;font-weight:bold;'>Where to donate?</p>";
				echo "You can donate at any of our Family Stores during opening hours or deposit them into The Salvation Army Recycling Bins located across Hong Kong and Macau.<br>";
				echo "If the donation quantity is 5 large bags or more, please send them to any of our collection centres below.";
			echo "</div>";

			echo "<div style='margin:20px 30px 30px 30px;text-align:justify;'><p style='font-size:20px;font-weight:bold;'>Family Stores Locations</p>";
				echo "If you would like to donate goods in Family Stores, please pass the items to our staff during the opening hours.<br>";
				echo "Do not put the donations outside the Family Stores. Thank you for your cooperation. ";


				echo "<p  style='font-size:18px;font-weight:bold;margin-left:10px;'>Collection Centres</p>";
				echo "<p  style='font-size:16px;font-weight:bold;margin-left:20px;'>Hong Kong Island:</p>";
				echo "<b style='margin-left:20px;font-size:14px;'>Wanchai Collection Centre</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>G/F, 31 Wood Road (opposite to the PCCW Telephone Exchange)<br>";
				echo "Service hours: Mon to Sun 9am-7pm<br>";
				echo "Tel: 2572 2879</p>";

				echo "<p  style='font-size:16px;font-weight:bold;margin-left:20px;'>Kowloon:</p>";
				echo "<b style='margin-left:20px;font-size:14px;'>The Salvation Army Command Headquarters Collection Centre:</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>11 Wing Sing Lane, Yaumatei<br>";
				echo "Service hours: Mon to Sun 8:30am - 8:00pm<br>";
				echo "Tel: 2332 4448 (enquiry service hours: Mon to Sat 10:30am-7pm, Sun 2pm-7pm)</p>";

				echo "<b style='margin-left:20px;font-size:14px;'>Tai Hang Tung Collection Centre:</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>G/F, No. 1 Lung Chu Street, Tai Hang Tung<br>";
				echo "Service hours: Mon -Sat 9:00pm- 6:00 pm, Sun 12:30 pm- 6:00pm<br>";
				echo "Tel: 2784 0689</p>";

				echo "<p  style='font-size:16px;font-weight:bold;margin-left:20px;'>New Territories:</p>";
				echo "<b style='margin-left:20px;font-size:14px;'>The Salvation Army Recycling Programme Logistics Centre</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>7/F, Tat Ming Industrial Building, No. 44-52 Ta Chuen Ping Street, Kwai Chung<br>";
				echo "Service hours: Mon- Fri 9:00am- 5:30pm, Sat 9:00 am - 5:00pm<br>";
				echo "Tel: 2332 4433</p>";
			echo "</div>";
				
				
			footer();
		?>
		</div>
	</body>
</html>