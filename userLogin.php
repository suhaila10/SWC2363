<html>
<head>
<title>eLeave Management System</title>
</head>
<body>
<?php
//call file to connect server eLeave
include("headerllaollao.php");
?>

<?php
//This section processess submission from login form
//Check if the form has been submitted
if($_SERVER['REQUEST_METHOD']=='POST')
{

//validate the userID
if(!empty($_POST['userName']))
{
	$name = mysqli_real_escape_string($connect, $_POST['userName']);
}
else
{
	$id = FALSE;
	echo'<p class = "error"> You forgot to enter your ID.</p>';
}

//validate the userPassword
if(!empty($_POST['userPassword']))
{
	$password = mysqli_real_escape_string($connect, $_POST['userPassword']);
}
else 
{
	$password = FALSE;
	echo'<p class = "error"> You forgot to enter your password.</p>';
}

//if no problems
if ($id && $password)
{
	//Retrieve the userID, userPassword, userName, userPhoneNo, userEmail
	//userAddress, userPosition, userTotalLeave, leaveID
	$q = "SELECT userID, userPassword, userName, userPhoneNo, userEmail, userAddress
	 FROM user WHERE (userName = '$name' AND userPassword = '$password')";
	
	//Run the query and assign it to the variable $result
	$result = mysqli_query ($connect, $q);
	
	//Count the number of rows that match the userID/userPassword combination 
	//If one database row (record) matches the input:
	if(@mysqli_num_rows ($result) ==1)
	{
		//start the session, fetch the record and insert the three values in an arrays
		session_start();
		$_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
		//echo '<p> Welcome to eLeave System<p>';
		header('Location:llaollaofy.php');
		//cancel the rest of the script
		exit();
		
		mysqli_free_result ($result);
		mysqli_close ($connect);
		//no match was made
	}
	else 
	{
		echo '<p class = "error"> The userID and userPassword entered do not match our records 
		<br> perhaps you need to register, just click the Register button</p>';
	}
	
	//if there was a problems
}
else 
{
	echo '<p class "error"> Please try again. </p>';
}
mysqli_close($connect);
}
//end of submit conditional

?>

<h2 align = "center">USER LOGIN</h2>
<center><img src="Llaollao-300x126.png" width="300" height="126" alt=""/></center>

<form action = "userLogin.php" method = "POST">
<div>
<label for = "userName"> Username:</label>
<input type="text" id="userID" name="userName" size="4" maxlength="30"
value = "<?php if (isset($_POST['userName'])) echo $_POST['userName'];?>">
</div>

<div>
<label for = "userPassword">Password:</label>
<input type="password" id="userPassword" name="userPassword" size="15" maxLength="60"
pattern="(?=.*\d)(?=.*[a-z]).{8,}" title ="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
required value="<?php if(isset($_POST['userPassword'])) echo $_POST['userPassword'];?>">
</div>

<div>
<button type="submit">Login</button>
<button type="reset">Reset</button>
</div>

<div>
<label>Don't have an account?
<a href="userRegister.php">Sign Up</a>
</label>
</div>
</form>
</body>
</html>