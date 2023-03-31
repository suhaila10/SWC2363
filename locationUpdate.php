<head>
<title>Update location - admin page llaollao</title>
<link rel="stylesheet" href="stylellao.css">
<link rel="stylesheet" href="adminstyle.css">
<style>
	input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>
<?php
//call file to connect server eleave
include ("headerllaollao.php");
?>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="userList.php">Update/Delete Visitor Details</a>
  <a href="userList">List of Visitor</a>
  <a href="adminList.php">Update/Delete/List of Admin Details</a>
  <a href="admin.php">Update/Delete Product</a>
  <a href="locationList.php">Update Location</a>
  <a href="locationRegister.php">Add new Location</a>
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
<center><img src="Llaollao-300x126.png" width="300" height="126" alt=""/></center>

<h2>Edit Location Record</h2>

<?php
//look for a valid user id, either through GET or POST
if ((isset ($_GET['id'])) && (is_numeric($_GET['id'])))
{
	$id = $_GET['id'];
}
else if ((isset ($_POST['id'])) && (is_numeric($_POST['id'])))
{
	$id = $_POST['id'];
}
else
{
	echo'<p class = "error">This page has been accessed in error.</p>';
	exit();
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$error = array (); //initialize an error array
	
	//look for locationPlace
	if (empty($_POST['locationPlace']))
	{
		$error [] = 'You forgot to enter the city.';
	}
	else
	{
		$place = mysqli_real_escape_string ($connect, trim ($_POST ['locationPlace']));
	}

	//look for locationName
	if (empty($_POST['locationName']))
	{
		$error [] = 'You forgot to enter your name.';
	}
	else
	{
		$name = mysqli_real_escape_string ($connect, trim ($_POST ['locationName']));
	}
	
	//look for adminPhoneNo
	if (empty($_POST['locationAddress']))
	{
		$error [] = 'You forgot to enter the location address.';
	}
	else
	{
		$address = mysqli_real_escape_string ($connect, trim ($_POST ['locationAddress']));
	}
	
	//if no problem occured
	if (empty($error))
	{
		$q = "SELECT locationID FROM location WHERE locationPlace ='$place' AND locationID != $id";
		
		$result = @mysqli_query($connect, $q); // run the query
		
		if(mysqli_num_rows($result)==0)
		{
			$q = "UPDATE location SET locationPlace = '$place', locationName = '$name', locationAddress = '$address' WHERE locationID = '$id' LIMIT 1";
			
			$result = mysqli_query ($connect, $q); //run the query
		
		if (mysqli_affected_rows($connect) == 1)
		{
			echo '<script>alert("The user has been edited");
			window.location.href="locationList.php";</script>';
		}
		else
		{
			echo '<p class ="error">The user has not been edited de to the system error.
			We apologize for any inconvenience.</p>';
			echo'<p'.mysqli_error($connect).'<br> query: '.$q.'</p>';
		}
	}
	else
	{
		echo '<p class = "error">The id has been registered </p>';
	}
		}
		else 
		{
			echo '<p class = "error">The following error (s) occured: <br/>';
			foreach ($error as $msg)
			{
				echo "-msg<br>\n";
			}
			echo '<p><p>Please try again.<p>';
		}
	}
	
	$q = "SELECT locationPlace, locationName, locationAddress
		FROM location WHERE locationID = $id";
		
	$result = @mysqli_query ($connect, $q); //run the query
	
	if (mysqli_num_rows ($result) == 1)
	{
		//get admin information
		$row = mysqli_fetch_array($result, MYSQLI_NUM);
		
		//create the form
		echo '<form action="locationUpdate.php" method = "post">
		<div class="container">
		<p><label class = "label" for ="locationPlace">location Place*:</label>
		<input type="text" id="locationPlace" name = "locationPlace" size = "30"
		maxlength="50" value="'.$row[0].'"></p>

		<p><br><label class = "label" for ="locationName">Location Name*:</label>
		<input type="text" id="locationName" name = "locationName" size = "30"
		maxlength="50" value="'.$row[1].'"></p>
		
		<p><br><label class = "label" for="locationAddress">Location Address:</label>
		<textarea id="locationAddress" name="locationAddress" size="150"
		maxlength="150" rows="4" cols="100" value="'.$row[2].'"></textarea></p>
		
		<br><p><input id ="submit" type="submit" name="submit" value="Update"></p>
		<br><input type="hidden" name="id" value="'.$id.'"/>
		</div>
		</form>';
	}
	else
	{
		//if it didn't run
		//message
		echo '<p class ="error">This page has been accessed in error<p>';
	} //end of it (result)
	mysqli_close($connect); //close the database connection_aborted
	?>
	</body>
	</html>
		
		
		
		
		