<!DOCTYPE html>
<html>
<body>
<head>
  <title>Sites::List</title>
</head>
<h1>TFP - Telecom Frequency Planner::Sites</h1>
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

$sql = "select sites.id, sites.lat, sites.lon, sites.created_at, ";
$sql.= "sites.updated_at, vendors.name as v_name, site_types.name as st_name from sites ";
$sql.= "JOIN vendors ON sites.vendor_id = vendors.id JOIN site_types ON sites.site_type_id = site_types.id";

$result = mysqli_query($conn, $sql);
?>
<table style="text-align: center" border="1">
	<tr>
		<th>ID</th>
		<th>Lattitude</th>
		<th>Longitude</th>
		<th>Vendor NAME</th>
		<th>Sie Type</th>
	</tr>
	<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["name"];
		//echo "";
		?><tr>
			<td><?php echo $row["id"]; ?></td>
			<td><?php echo $row["lat"]; ?></td>
			<td><?php echo $row["lon"]; ?></td>
			<td><?php echo $row["v_name"]; ?></td>
			<td><?php echo $row["st_name"]; ?></td>
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