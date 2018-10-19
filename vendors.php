<!DOCTYPE html>
<html>
<body>
<head>
  <title>Vendors::Edit</title>
</head>
<h1>TFP - Telecom Frequency Planner::Vendors</h1>
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


$sql = "SELECT * from  vendors";
$result = mysqli_query($conn, $sql);
?>
<table>
	<tr>
		<th>ID</th>
		<th>NAME</th>
		<th>Updated at</th>
		<th>Actions</th>
		
	</tr>
	<?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
		?><tr>
			<td><?php echo $row["id"]; ?></td>
			<td><?php echo $row["name"]; ?></td>
			<td><?php echo $row["updated_at"]; ?></td>
			<td><a href="vendors_edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
		</tr>
		<?php
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
</table>

<a href="vendors_create.php">Add New</a>

	

</body>
</html>