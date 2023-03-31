<html>
<head>
<title>eLeave Management System</title>
<link rel="stylesheet" href="stylellao.css">
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

//check for adminPassword
if(empty ($_POST['adminPassword']))
{
	$error [] = 'You forget to enter the password.';
}
else
{
	$password = mysqli_real_escape_string ($connect, trim ($_POST ['adminPassword']));
}

//check for adminName
if(empty ($_POST['adminName']))
{
	$error [] = 'You forget to enter the name.';
}
else
{
	$name = mysqli_real_escape_string ($connect, trim ($_POST ['adminName']));
}

//check for adminPhoneNo
if(empty ($_POST['adminPhoneNo']))
{
	$error [] = 'You forget to enter the phone number.';
}
else
{
	$phone = mysqli_real_escape_string ($connect, trim ($_POST ['adminPhoneNo']));
}

//check for adminEmail
if(empty ($_POST['adminEmail']))
{
	$error  = 'You forget to enter your email.';
}
else
{
	$email = mysqli_real_escape_string ($connect, trim ($_POST ['adminEmail']));
}

//register the admin in the database
//make the query:
$q = "INSERT INTO admin (adminID, adminPassword, adminName, adminPhoneNo, adminEmail)
	VALUES('','$password','$name','$phone','$email')";
	
$result = @mysqli_query ($connect, $q); //run the query
if($result)//if it runs
{
	header('Location:login.php');
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

<h2 style="color:lawngren"> Register Admin </h2>
<center><img src="Llaollao-300x126.png" width="300" height="126" alt=""/></center>
<h4> *required field</h4>
<form action = "adminRegister.php" method = "post">

<div class="container">
<div>
<label for = "adminPassword">Password:</label>
<input type="password" id="adminPassword" name="adminPassword" size="15" maxLength="60"
pattern ="(?+.\d)(?+>*[A-Z]).{8,}" title ="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required
value="<?php if(isset($_POST['adminPassword'])) echo $_POST['adminPassword'];?>">
</div>	

<div>
<label for = "adminName"> Admin Name:</label>
<input type="text" id="adminName" name="adminName" size="20" maxlength="50" required
value = "<?php if (isset($_POST['adminName'])) echo $_POST['adminName'];?>">
</div>

<div>
<label for = "adminPhoneNo"> Phone No.*:</label>
<input type="tel" pattern="[0-9]{3}-[0-9]{7}" id="adminPhoneNo" name="adminPhoneNo" size="15" maxlength="20" required
value = "<?php if (isset($_POST['adminPhoneNo'])) echo $_POST['adminPhoneNo'];?>">
</div>

<div>
<label for = "adminEmail"> Admin Email*:</label>
<input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="adminEmail" name="adminEmail" size="30" maxlength="50" required
value = "<?php if (isset($_POST['adminEmail'])) echo $_POST['adminEmail'];?>">
</div>

<div>
<button type="submit">Register</button>
<button type="reset">Clear All</button>
</div>
</div>
</form>
</body>
</html>