<html>
<head>
<title>admin search-admin page llaollao</title>
<link rel="stylesheet" href="stylellao.css">
<link rel="stylesheet" href="adminstyle.css">
</head>
<body>
<?
//call file to connect server eleave
include ("headerllaollao.php");
?>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="userList.php">Update Visitor Details</a>
  <a href="userList.php">List of Visitor</a>
  <a href="userSearch.php">Search for the User</a>
  <a href="adminList.php">Update/Add/Delete/List of Admin Details</a>
  <a href="adminSearch.php">Search for the Admin</a>
  <a href="admin.php">Update/Add/Delete Product</a>
  <a href="locationRegister.php">Update Location</a>
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

<form action="adminFound.php" method="post">

<h1>Search admin record</h1>
<p><label class="label" for="adminName">Admin Name:</label>
<input id="adminName" type="text" name="adminName" size="30"
maxlength="50" value="<?php if(isset($_POST['adminName']))
	echo $_POST['adminName']; ?>"/></p>

<input id ="submit" type="submit" name="submit" value="search"/></p>
</form>
</body>
</html>