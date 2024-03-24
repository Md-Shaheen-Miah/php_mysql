
<?php
// Include the database connection file
require_once("connect.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM student_detail ORDER BY id ASC");
// or
// $user = $mysqli->query("select * from user");

?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
	<h2>Homepage</h2>
	<p>
		<a href="add.php">Add New Data</a>
	</p>
	<table width='80%' border=0>
		<tr bgcolor='#DDDDDD'>
			<td><strong>id</strong></td>
			<td><strong>Name</strong></td>
			<td><strong>Email</strong></td>
			<td><strong>phone</strong></td>
			<td><strong>age</strong></td>
			<td><strong>Action</strong></td>
		</tr>
		<?php
		// Fetch the next row of a result set as an associative array
		while ($res = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$res['id']."</td>";
				echo "<td>".$res['name']."</td>";
				echo "<td>".$res['email']."</td>";
				echo "<td>".$res['phone']."</td>";
				echo "<td>".$res['age']."</td>";

				echo "<td><a>Edit</a> | 
				<a>Delete</a></td>";
				echo "</tr>";
		}
		?>

	
	</table>
</body>
</html>
