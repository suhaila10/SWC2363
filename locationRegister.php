<html>
<head>
<title>Add New Location - admin page llaollao</title>
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
//call file to connect server eLeave
include("headerllaollao.php");
?>
<?php
//This query inserts a record in the eLeave table
//has form been submitted?
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$error = array (); //initialize an error array

//check for userName
if(empty ($_POST['locationPlace']))
{
	$error [] = 'You forget to enter the city.';
}
else
{
	$place = mysqli_real_escape_string ($connect, trim ($_POST ['locationPlace']));
}

//check for locationName
if(empty ($_POST['locationName']))
{
	$error [] = 'You forget to enter the name.';
}
else
{
	$name = mysqli_real_escape_string ($connect, trim ($_POST ['locationName']));
}

//check for locationAddress
if(empty ($_POST['locationAddress']))
{
	$error [] = 'You forget to enter the location addess.';
}
else
{
	$address = mysqli_real_escape_string ($connect, trim ($_POST ['locationAddress']));
}


//register the admin in the database
//make the query:
$q = "INSERT INTO location (locationID, locationPlace, locationName, locationAddress)
	VALUES('','$place','$name','$address' )";
	
$result = @mysqli_query ($connect, $q); //run the query
if($result)//if it runs
{
	echo '<h1>thank you</h1>';
	exit();
}
else
{
	//if it didn't run
	//message
	echo '<h1>System error</h1>';
	
	//debugging message
	echo '<p>'.mysqli_error($connect).'<br><br>Query: '.$q.'</p>';
} //end of it (result)

mysqli_close($connect); //close the database connection_aborted
exit();
} //end of the main submit conditional
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

<h2 style="color:lawngreen"> Add New location </h2>
<h4> *required field</h4>
<form action = "locationRegister.php" method = "post">

<div class="container">
<div>
<label for = "locationPlace"> State:</label>
<input type="text" id="locationPlace" name="locationPlace" size="30" maxlength="50" required
value = "<?php if (isset($_POST['locationPlace'])) echo $_POST['locationPlace'];?>">
</div>

<div>
<label for = "locationName"> Location Name:</label>
<input type="text" id="locationName" name="locationName" size="30" maxlength="50" required
value = "<?php if (isset($_POST['locationName'])) echo $_POST['locationName'];?>">
</div>

<div>
<label for="locationAddress">Location Address*:</label>
<textarea id="locationAddress" name="locationAddress" size="150" maxlength = "150" required
value = "<?php if (isset($_POST['locationAddress'])) echo $_POST['locationAddress'];?>"></textarea>
</div>


<div>
<button type="submit">Register</button>
<button type="reset">Clear All</button>
</div>
</div>
</form>
</body>
</html>