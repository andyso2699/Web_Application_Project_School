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
			
			echo "<div>";
				echo "<p style='font-size:16px;font-weight:bold;margin-left:20px;'>Hong Kong Island</p>";
				echo "<b style='margin-left:20px;font-size:14px;'>Aberdeen Family Store (Mon-Sat 9:30am-7:30pm; Sun 2pm-7:30pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>No. 218, Aberdeen Main Road, Aberdeen, Hong Kong<br>";
				echo "TEL: (852) 2873 4666</p>";
				
				echo "<b style='margin-left:20px;font-size:14px;'>Wanchai Hennessy Road Family Store (Mon-Sat 10:30am-8:30pm; Sun 2pm-8:30pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>G/F., Luen Wo Building, 337 Hennessy Road, Wanchai, Hong Kong<br>";
				echo "TEL: (852) 2836 6246</p>";
				
				echo "<b style='margin-left:20px;font-size:14px;'>Yue Wan Family Store (Mon-Sat 10:30am-7pm; Sun 2pm-7pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>Shop 29-30, Yue On House, Yue Wan Estate, Chai Wan, Hong Kong<br>";
				echo "TEL: (852) 2558 8655</p>";
				
				echo "<b style='margin-left:20px;font-size:14px;'>Shaukeiwan Family Store (Mon-Sat 9:30am-8:30pm; Sun 2:00pm-8:30pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>G/F Tung Hong Building, 139 Shau Kei Wan Main Street East, Shau Kei Wan, Hong Kong<br>";
				echo "TEL: (852) 2535 8113</p>";
				
				echo "<b style='margin-left:20px;font-size:14px;'>Tin Hau Family Store (Mon-Sat 11am-7:30pm; Sun 2pm-7:30pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>G/F. 29-31 Wing Hing Street, Causeway Bay, Hong Kong<br>";
				echo "TEL: (852) 2887 5577</p>";
				
				echo "<b style='margin-left:20px;font-size:14px;'>Sai Wan Ho Family Store (Mon-Sat 9:30am-7:30pm; Sun 2pm-7:30pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>G/F, Shop 1, i-UniQ Grand, 147-157 Shau Kei Wan Road, Sai Wan Ho<br>";
				echo "TEL: (852) 2348 5218</p>";
				
				echo "<b style='margin-left:20px;font-size:14px;'>Western District Belchers Street Family Store (Mon-Sat 10am-8:30pm; Sun 2pm-8:30pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>G/F., 26 Belcher's Street, Western District, Hong Kong<br>";
				echo "TEL: (852) 2974 0882</p>";
				
				echo "<b style='margin-left:20px;font-size:14px;'>North Point Family Store (Mon-Sat 9:30am-8:30pm; Sun 2pm-8:30pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>G/F., Fok Ying Building, 379-381 King's Road, North Point, Hong Kong<br>";
				echo "TEL: (852) 2570 0138</p>";
			
				echo "<p style='font-size:16px;font-weight:bold;margin-left:20px;'>Kowloon</p>";
				echo "<b style='margin-left:20px;font-size:14px;'>Kwun Tong Family Store (Mon-Sat 10:30am-7pm; Sun 2pm-7pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>Shop 233 & 237, G/F., Hay Cheuk Lau, Garden Estate, Ngau Tau Kok, Kwun Tong, Kowloon, Hong Kong<br>";
				echo "TEL: (852) 2331 2577</p>";
				
				echo "<b style='margin-left:20px;font-size:14px;'>Whampoa Family Store (Mon-Sat:10:30am-8:30pm; Sun:2pm-8:30pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>Shop C2, Wing Wing Building (Whampoa Estate), No. 41, Man Tai Street, Hung Hom, Kowloon, Hong Kong<br>";
				echo "TEL: (852) 2773 1182</p>";
				
				echo "<b style='margin-left:20px;font-size:14px;'>Nam Cheong Family Store (Mon-Sat 11:30am-8pm; Sun 2pm-7pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>Shop 3-4, Nam Cheong West Rail Station, Kowloon, Hong Kong<br>";
				echo "TEL: (852) 2387 4933</p>";
				
				echo "<b style='margin-left:20px;font-size:14px;'>Yaumatei Family Store (Mon-Sat 10:30am-7pm; Sun 2pm-7pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>G/F., 1A Cliff Road, Yaumatei, Kowloon, Hong Kong<br>";
				echo "TEL: (852) 2332 4448</p>";
				
				echo "<b style='margin-left:20px;font-size:14px;'>To Kwa Wan Family Store (Mon - Sat 10:30am-7:00pm; Sun 2pm-7:00pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>G/F, No. 7 To Kwa Wan Road, To Kwa Wan, Kowloon, Hong Kong<br>";
				echo "TEL: (852) 2618 9962</p>";
				
				echo "<b style='margin-left:20px;font-size:14px;'>Prince Edward Family Store (Mon-Sat 10:30am-8:30pm; Sun 2pm-8:30pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>Shop A, G/F, Lee Tat Building, 785-787A Nathan Road, Prince Edward, Kowloon, Hong Kong<br>";
				echo "TEL: (852) 3422 3205</p>";
	

				echo "<p style='font-size:16px;font-weight:bold;margin-left:20px;'>New Territories</p>";
				echo "<b style='margin-left:20px;font-size:14px;'>Shatin Family Store (Mon-Sat 10:30am-7pm; Sun 2:00pm-7pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>G/F., 70-72 Min Yiu Lau, Jat Min Chuen, Shatin, New Territories, Hong Kong<br>";
				echo "TEL: (852) 2636 6113</p>";
				
				echo "<b style='margin-left:20px;font-size:14px;'>Tuen Mun Family Store (Consignment store under The Salvation Army Social Services Departments supervision) (Mon-Sun 10am-6:45pm)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>Shop 41-42, Chi Lok Fa Yuen, Tuen Mun, New Territories, Hong Kong<br>";
				echo "TEL: (852) 2618 2241</p>";
				
				
				echo "<p style='font-size:16px;font-weight:bold;margin-left:20px;'>Macau</p>";
				echo "<b style='margin-left:20px;font-size:14px;'>Macau Family Store (Mon-Sat 10am-7pm; Sun & Public Holiday: Closed)</b><br>";
				echo "<p style='margin-left:20px;font-size:12px;'>Av. Artur Tamag. Barbosa, BL. 9, Fl. R/C, Flat CF, Ed. Jardim Cidade - Man Seng Kok, Macau<br>";
				echo "TEL: (853) 2843 2888</p>";
				
			echo "</div>";	
			footer();
		?>
		</div>
	</body>
</html>