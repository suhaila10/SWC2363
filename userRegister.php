<html>
<head>
<title>luser register - llaollao</title>
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
<meta charset="utf-8">
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

//check for userPassword
if(empty ($_POST['userPassword']))
{
	$error [] = 'You forget to enter the password.';
}
else
{
	$password = mysqli_real_escape_string ($connect, trim ($_POST ['userPassword']));
}

//check for userName
if(empty ($_POST['userName']))
{
	$error [] = 'You forget to enter the name.';
}
else
{
	$name = mysqli_real_escape_string ($connect, trim ($_POST ['userName']));
}

//check for userPhoneNo
if(empty ($_POST['userPhoneNo']))
{
	$error [] = 'You forget to enter the phone number.';
}
else
{
	$phone = mysqli_real_escape_string ($connect, trim ($_POST ['userPhoneNo']));
}

//check for userEmail
if(empty ($_POST['userEmail']))
{
	$error []  = 'You forget to enter your email.';
}
else
{
	$email = mysqli_real_escape_string ($connect, trim ($_POST ['userEmail']));
}

//check for userAddress
if(empty ($_POST['userAddress']))
{
	$error  [] = 'You forget to enter your address.';
}
else
{
	$address = mysqli_real_escape_string ($connect, trim ($_POST ['userAddress']));
}


//register the admin in the database
//make the query:
$q = "INSERT INTO user (userID, userPassword, userName, userPhoneNo, userEmail, userAddress)
	VALUES('','$password','$name','$phone','$email','$address')";
	
$result = @mysqli_query ($connect, $q); //run the query
if($result)//if it runs
{
	echo '<h1>thank you</h1>';
	header('Location:login1.php');
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

<h2 style="color:lawngreen"> Register user </h2>
<center><img src="Llaollao-300x126.png" width="300" height="126" alt=""/></center>
<h4> *required field</h4>
<form action = "userRegister.php" method = "post">
<div class="container">
<div>
<label for = "userPassword">Password:</label>
<input type="password" id="userPassword" name="userPassword" size="15" maxLength="60"
pattern ="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title ="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required
value="<?php if(isset($_POST['userPassword'])) echo $_POST['userPassword'];?>">
</div>	

<div>
<label for = "userName"> User Name:</label>
<input type="text" id="userName" name="userName" size="30" maxlength="50" required
value = "<?php if (isset($_POST['userName'])) echo $_POST['userName'];?>">
</div>

<div>
<label for = "userPhoneNo"> Phone No.*:</label>
<input type="tel" pattern="[0-9]{3}-[0-9]{7}" id="userPhoneNo" name="userPhoneNo" size="15" maxlength="20" required
value = "<?php if (isset($_POST['userPhoneNo'])) echo $_POST['userPhoneNo'];?>">
</div>

<div>
<label for = "userEmail"> User Email*:</label>
<input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="userEmail" name="userEmail" size="30" maxlength="50" required
value = "<?php if (isset($_POST['userEmail'])) echo $_POST['userEmail'];?>">
</div>

<div>
<label for="userAddress">User Address*:</label>
<textarea id="userAddress" name="userAddress" size="30" maxlength = "100" required
value = "<?php if (isset($_POST['userAddress'])) echo $_POST['userAddress'];?>"></textarea>
</div>

<div>
<button type="submit">Register</button>
<button type="reset">Clear All</button>
</div>
</div>
</form>
</body>
</html>