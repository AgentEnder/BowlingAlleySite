<!DOCTYPE html>
<html>
	<head>
		<?php require("head.php")?>
	</head>
	<body>
		<?php include("header.php")?>
		
		<div id="background">
			<div id="content">
				<h1>Bowlarama Lanes Restaurant</h1>
				<p>You can reach the restaurant by calling us at 859-236-0740</p>
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
				$sectionSql = "SELECT DISTINCT(menuSection) as menuSection from restaurantMenu";
				$sectionResult = $conn->query($sectionSql);
				if($sectionResult->num_rows > 0){
					while($row = $sectionResult->fetch_assoc()){
						echo "<h1>" . $row['menuSection'] . "</h1>";
						$sql = "SELECT itemName AS item, FORMAT(itemPrice,2) AS price FROM restaurantMenu WHERE menuSection = \"" . $row['menuSection'] . "\"";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							 echo "<div class=\"centerHorizontally\"><table class=\"default\"><tr class=\"default\"><th class=\"default\">Menu Item</th><th class=\"default\">Price</th></tr>";
							 // output data of each row
							 while($row = $result->fetch_assoc()) {
								 echo "<tr class=\"default\"><td class=\"default\">" . $row["item"]. "</td><td class=\"default\">" . $row["price"]. "</td></tr>";
							 }
							 echo "</table></div>";
						} else {
							 echo "error getching menu items";
						}
					}
					
				}else{
					echo "Error fetching menu sections";
				}
					

				$conn->close();
				?>  
			</div>
		</div>	
	<?php include("footer.php")?>
	</body>
</html>