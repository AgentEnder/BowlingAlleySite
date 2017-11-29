<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/leagueStyle.css">
		<?php require("head.php")?>
	</head>
	<body>
		<?php include("header.php")?>
		
		<div id="background">
			<div id="content">
				<h1>Leagues</h1>
				<h3>Contact the front desk for further inqueries about leagues</h3>
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

					$sql = "SELECT * FROM   leagues ORDER BY CASE WHEN DayOfTheWeek = 'Sunday' THEN '1' WHEN DayOfTheWeek = 'Monday' THEN '2' WHEN DayOfTheWeek = 'Tuesday' THEN '3' WHEN DayOfTheWeek = 'Wednesday' THEN '4' WHEN DayOfTheWeek = 'Thursday' THEN '5' WHEN DayOfTheWeek = 'Friday' THEN '6' WHEN DayOfTheWeek = 'Saturday' THEN '7' ELSE DayOfTheWeek END ASC";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						echo "<div class=\"centerHorizontally\"><table class=\"default\"><tr class=\"default\"><th class=\"default\">League Name</th><th class=\"default\">Day of the Week</th><th class=\"default\">Start Time</th><th class=\"default\">League Info</th></tr>";
						// output data of each row
						while($row = $result->fetch_assoc()) {
						echo $row["leagueDescription"];
							echo "<tr class=\"leagueItem default\"><td class=\"default\">" . $row["LeagueName"]. "</td><td class=\"default\">" . $row["DayOfTheWeek"]. "</td><td class=\"default\">" . $row["StartTime"]. "</td><td class=\"default\"> " . $row["leagueInfo"]. "</td></tr><tr class=\"leagueDescription default\"><td colspan=\"4\">" . $row["leagueInfo"] . "</td></tr>";
						}
						echo "</table></div>";
					} else {
						echo "0 results";
					}
					$conn->close();
					
				?>
				<script>
					$('.leagueItem').click(function(){
						console.log($(this))
						$(this).next("tr").slideToggle();
					});
				</script>
			</div>
		</div>
		<?php include("footer.php")?>
	</body>
</html>