<?php
$servername = "";
$username = "";
$password = "";
$database = "";
$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "select * from Loved_Gifts";
$result = mysqli_query($conn,$sql);
	
		if (mysqli_num_rows($result) > 0) {
			echo "<table border=\"1\" style=\"width: 100%\">\n
					<tr>\n
						<th>Gift ID</th>\n
						<th>Villager Name</th>\n
						<th>Item Name</th>\n
						<th>Recipe Name</th>\n
					</tr>";
			// output data of each row
				while($row = mysqli_fetch_row($result)) {
					echo "<tr>\n";
						for ($i = 0; $i < mysqli_num_fields($result); $i++) {
						echo "<td>" . $row[$i] . "</td>\n";
						}
					echo "</tr>\n";
				}
				echo "</table>\n";
				} else {
			echo "0 results";
			}

mysqli_close($conn);
?>

