<!DOCTYPE html>
<html>
<body>
<head>
  <title>Site - Types :: List</title>
</head>
<h1>TFP - Telecom Frequency Planner::Site Types</h1>
<ul>
  <li><a href="vendors.php">Vendors</a></li>
  <li><a href="site-types.php">Site Types</a></li>
  <li><a href="sites.php">Sites</a></li>
</ul>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tfp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM site_types";
$result = mysqli_query($conn, $sql);
?>
<table>
	<tr>
		<th>ID</th>
		<th>NAME</th>
		<th>Created at</th>
		<th></th>
	</tr>
	<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"];
		//echo "";
		?><tr>
			<td><?php echo $row["id"]; ?></td>
			<td><?php echo $row["name"]; ?></td>
			<td><?php echo $row["created_at"]; ?></td>
			<td></td>
		  </tr>
		<?php
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
</table>



	

</body>
</html>