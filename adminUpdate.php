<head>
<title>Update Admin Details - admin page llaollao</title>
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
<center><img src="Llaollao-300x126.png" width="300" height="126" alt=""/></center>

<h2>Edit Admin Record</h2>

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
	
	//look for adminName
	if (empty($_POST['adminName']))
	{
		$error [] = 'You forgot to enter your name.';
	}
	else
	{
		$name = mysqli_real_escape_string ($connect, trim ($_POST ['adminName']));
	}
	
	//look for adminPhoneNo
	if (empty($_POST['adminPhoneNo']))
	{
		$error [] = 'You forgot to enter phone number.';
	}
	else
	{
		$phone = mysqli_real_escape_string ($connect, trim ($_POST ['adminPhoneNo']));
	}
	
	//look for adminEmail
	if (empty($_POST['adminEmail']))
	{
		$error [] = 'You forgot to enter your email.';
	}
	else
	{
		$email = mysqli_real_escape_string ($connect, trim ($_POST ['adminEmail']));
	}
	
	//if no problem occured
	if (empty($error))
	{
		$q = "SELECT adminID FROM admin WHERE adminName ='$name' AND adminID != $id";
		
		$result = @mysqli_query($connect, $q); // run the query
		
		if(mysqli_num_rows($result)==0)
		{
			$q = "UPDATE admin SET adminName = '$name', adminPhoneNo = '$phone',
			adminEmail = '$email' WHERE adminID = '$id' LIMIT 1";
			
			$result = mysqli_query ($connect, $q); //run the query
		
		if (mysqli_affected_rows($connect) == 1)
		{
			echo '<script>alert("The user has been edited");
			window.location.href="adminList.php";</script>';
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
	
	$q = "SELECT adminName, adminPhoneNo, adminEmail
		FROM admin WHERE adminID = $id";
		
	$result = @mysqli_query ($connect, $q); //run the query
	
	if (mysqli_num_rows ($result) == 1)
	{
		//get admin information
		$row = mysqli_fetch_array($result, MYSQLI_NUM);
		
		//create the form
		echo '<form action="adminUpdate.php" method = "post">
		<div class="container">
		<p><label class = "label" for ="adminName">Admin Name*:</label>
		<input type="text" id="adminName" name = "adminName" size = "30"
		maxlength="50" value="'.$row[0].'"></p>
		
		<p><br><label class = "label" for ="adminPhoneNo">Phone Number*:</label>
		<input type="tel" pattern="[0-9]{3}-[0-9]{7}" id="adminPhoneNo" name = "adminPhoneNo" size = "15"
		maxlength="20" value="'.$row[1].'"></p>
		
		<p><br><label class = "label" for ="adminEmail">Admin Email*:</label>
		<input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
		id="adminEmail" name = "adminEmail" size = "30"maxlength="50" required
		value="'.$row[2].'"></p>
		
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
		
		
		
		
		