<!DOCTYPE html>
<html>
	<head>
		<?php require("head.php")?>
		<link rel="stylesheet" type="text/css" href="css/indexStyle.css">
	</head>
	<body>
		<?php include("header.php")?>
		
		<div id="background">
			<div id="content">
				<table id = "hoursContainer">
					<tr>
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

								$sql = "SELECT Weekday, Open, Close, isClosed FROM openbowling WHERE Weekday = DAYNAME(CURRENT_DATE)";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									echo "<table style=\"width:100%\">";
									 // output data of each row
									 while($row = $result->fetch_assoc()) {
									 	if($row["isClosed"] == 0){
										 	echo "<tr style=\"width:100%\"><td><b style = \"text-align:center\"> Open today from " . $row["Open"]. " till " . $row["Close"]. "</b></td></tr>";
										 }else{
										 	echo "<tr style=\"width:100%\"><td><b style = \"text-align:center\"> Sorry, We are closed today. </b></td></tr>";
										 }
									 }
									 echo "</table>";
								} else {
									 echo "Error Fetching Hours";
								}

								$conn->close();
							?>  
						</tr>
						<tr>
							<p>Hours subject to change</p>
						</tr>
				</table>
				<div>
					<h1 style="font: bold italic">Bowlarama League Kick-Off Party!</h1>
					<table style="width:100%">
						<tr>
							<td style="text-align:right">When:</td>
							<td>Friday, August 12th</td>
						</tr>
						<tr>
							<td style="text-align:right">Time:</td>
							<td>6:00-8:00PM</td>
						</tr>
						<tr>
							<td style="text-align:right">For:</td>
							<td>Anyone interest in bowling ANY league</td>
						</tr>
					</table>
					<p>Come join us for a fun evening and enjoy complimentary appetizers and bowling!</p>
					<p>New bowlers, recreational bowlers, casual bowlers, avid bowlers, tournament bowlers, <span style="font: bold"> ALL BOWLERS WELCOME!</span></p>
					<p>**Prices, drawings and give-a-ways**</p>
					<p>1 Grand Prize Winner will recieve a new Bowling Ball!</p>
				</div>
				<div>
					<h1 style="font: bold italic">2016 Fall/Winter Leagues Start Soon!</h1>
					<p>Leagues start as soon as August 19th, check our league page for more information</p>
				</div>
		</div>
		<?php include("footer.php")?>
	</body>
</html>