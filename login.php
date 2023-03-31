<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stylellao.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<?php
//call file to connect server eLeave
include("headerllaollao.php");
?>
<h2>ADMIN LOGIN FORM</h2>
<center><img src="Llaollao-300x126.png" width="300" height="126" alt=""/></center>
<?php
//This section processess submission from login form
//Check if the form has been submitted
if($_SERVER['REQUEST_METHOD']=='POST')
{

//validate the adminID
if(!empty($_POST['adminName']))
{
	$name = mysqli_real_escape_string($connect, $_POST['adminName']);
}
else
{
	$name = FALSE;
	echo'<p class = "error"> You forgot to enter your ID.</p>';
}

//validate the adminPassword
if(!empty($_POST['adminPassword']))
{
	$password = mysqli_real_escape_string($connect, $_POST['adminPassword']);
}
else 
{
	$password = FALSE;
	echo'<p class = "error"> You forgot to enter your password.</p>';
}

//if no problems
if ($name && $password)
{
	//Retrieve the adminID, adminPassword, adminName, adminPhoneNo, adminEmail
	$q = "SELECT adminID, adminPassword, adminName, adminPhoneNo, adminEmail FROM admin WHERE (adminName = '$name' AND adminPassword = '$password')";
	
	//Run the query and assign it to the variable $result
	$result = mysqli_query ($connect, $q);
	
	//Count the number of rows that match the adminID/adinPassword combination 
	//If one database row (record) matches the input:
	if(@mysqli_num_rows ($result) ==1)
	{
		//start the session, fetch the record and insert the three values in an arrays
		session_start();
		$_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
		header('Location:adminpage.html');   
		
		//cancel the rest of the script
		exit();
		
		mysqli_free_result ($result);
		mysqli_close ($connect);
		//no match was made
	}
	else 
	{
		echo '<p class = "error"> The adminID and adminPassword entered do not match our records 
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

<br><br><br>
<center><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button></center>

<div id="id01" class="modal">
  
  <form class="modal-content animate"action = "login.php" method = "POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="people.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
		<label for = "adminName"> Username:</label>
        <input type="text" id="adminID" name="adminName" size="30" maxlength="30"
        value = "<?php if (isset($_POST['adminName'])) echo $_POST['adminName'];?>">

		<label for = "userPassword">Password:</label>
        <input type="password" id="adminPassword" name="adminPassword" size="15" maxLength="60"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title ="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
        required value="<?php if(isset($_POST['adminPassword'])) echo $_POST['userPassword'];?>">
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <div>
        <label>Don't have an account?
        <a href="adminRegister.php">Sign Up</a>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
