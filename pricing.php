<!DOCTYPE html>
<html>
	<head>
		<?php require("head.php")?>
	</head>
	<body>
		<?php include("header.php")?>
		
		<div id="background">
			<div id="content">
				<h1 style="text-align:center">Normal Rates</h1>
				<?php
				$servername = "localhost";
				$username = "danville2070_webUser";
				$password = "iew,hmsk8sDG";
				$dbname = "danville2070_main";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					 die("Connection failed: " . $conn->connect_error);
				} 

				$sql = "SELECT rateName, FORMAT(rate,2) AS rate, rateDescription FROM rates WHERE isSpecial = 0";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					 echo "<div class=\"centerHorizontally\"><table class=\"default\"><tr class=\"default\"><th class=\"default\">Price</th><th class=\"default\">Item</th><th class=\"default\">Description</th></tr>";
					 // output data of each row
					 while($row = $result->fetch_assoc()) {
						 echo "<tr class=\"default\"><td class=\"default\">$" . $row["rate"]. "</td><td class=\"default\">" . $row["rateName"]. "</td><td class=\"default\"> " . $row["rateDescription"]. "</td></tr>";
					 }
					 echo "</table></div>";
				} else {
					 echo "0 results";
				}

				$conn->close();
				?>  
				<h1 style="text-align:center">Special Rates</h1>
				<?php
				$servername = "localhost";
				$username = "danville2070_webUser";
				$password = "iew,hmsk8sDG";
				$dbname = "danville2070_main";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					 die("Connection failed: " . $conn->connect_error);
				} 

				$sql = "SELECT rateName, FORMAT(rate,2) AS rate, rateDescription FROM rates WHERE isSpecial = 1";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					 echo "<div class=\"centerHorizontally\"><table class=\"default\"><tr class=\"default\"><th class=\"default\">Price</th><th class=\"default\">Item</th><th class=\"default\">Description</th></tr>";
					 // output data of each row
					 while($row = $result->fetch_assoc()) {
						 echo "<tr class=\"default\"><td class=\"default\">$" . $row["rate"]. "</td><td class=\"default\">" . $row["rateName"]. "</td><td class=\"default\"> " . $row["rateDescription"]. "</td></tr>";
					 }
					 echo "</table></div>";
				} else {
					 echo "0 results";
				}

				$conn->close();
				?>  
			
				<div>
					<h1>Party Rates!</h1>
					$12 per bowler, 5 bowler minimum<br>
					$60 deposit due within 3 days of booking<br>
					Includes 2 hours of bowling and shoe rental for each bowler, as well as use of the party room. Paper products for the bowlers are provided and outside food and drinkare permittted, but it must stay inside of the party room.<br><br>
					Times:<br>
					Weekdays:5PM<br>
					Fridays:6PM<br>
					Saturdays:12PM,3PM,6PM<br>
					Sundays:2PM,5PM
				</div>
			</div>
		</div>	
	<?php include("footer.php")?>
	</body>
</html>