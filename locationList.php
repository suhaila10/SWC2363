<html>
<head>
<title>location list - admin page llaollao</title>
<link rel="stylesheet" href="stylellao.css">
<link rel="stylesheet" href="adminstyle.css">
</head>
<body>
<?php
//call file to connect server llaollao
include("headerllaollao.php");
?>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="userList.php">Update Visitor Details</a>
  <a href="userList.php">List of Visitor</a>
  <a href="adminList.php">Update/Delete/List of Admin Details</a>
  <a href="admin.php">Update/Add/Delete Product</a>
  <a href="locationRegister.php">Add New Location</a>
  <a href="locationList.php">Update/Delete Location</a>
  <a href="loginpage.php">LOG OUT</a>
</div>

<h2>ADMIN PAGE</h2>
<p>Click on the element below to open the navigation menu.</p>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "30%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
<h2 style="color:lawngreen">Location</h2>

<?php
	//make the query
	$q="SELECT locationID, locationPlace, locationName, locationAddress
	FROM location
	ORDER BY locationID";
		
	//run he query and assign it to the variable $result
	$result = @mysqli_query($connect, $q);
	
	if ($result)
	{
		//Table heading
		echo '<table border = "2">
		<tr>
		<td align="center"><b>ID</b></td>
		<td align="center"><b>STATE</b></td>
		<td align="center"><b>NAME</b></td>
		<td align="center"><b>ADDRESS</b></td>
		<td align="center"><b>UPDATE</b></td>
		<td align="center"><b>DELETE</b></td>
		</tr>';
		
		//Fetch and print all the records
		while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			echo'<tr>
			<td>'.$row['locationID'].'</td>
			<td>'.$row['locationPlace'].'</td>
			<td>'.$row['locationName'].'</td>
			<td>'.$row['locationAddress'].'</td>
			<td align="center"><a href="locationUpdate.php?id='.$row['locationID'].'">Update</a></td>
			<td align="center"><a href="locationDelete.php?id='.$row['locationID'].'">Delete</a></td>
			</tr>';
		}
		
		//close the table
		echo '</table>';
		
		//free up the resources
		mysqli_free_result($result);
		//if failed to run
		}
		else
		{
			//error message
			echo '<p class ="error">The current user could not be retrieved.
			We apologize for any incovinience.</p>';
			
			//debuddign message
			echo '<p>'.mysqli_error($connect).'<br><br>Query:'.$q.'</p>';
		} //end of it ($result)
		//close the database connection
		mysqli_close($connect);
		?>
		

</body>
</html>
		
	