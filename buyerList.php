<html>
<head>
<title>customer</title>
<link rel="stylesheet" href="stylellao.css">
<link rel="stylesheet" href="adminstyle.css">
</head>
<body>
<?php
//call file to connect server eLeave
include("headerllaollao.php");
?>
<h2 style="color:lawngreen">List Of Buyer</h2>

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
<?php
include('headerllaollao.php');

$q = "SELECT id, name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price FROM `order` ORDER BY id";
$result = @mysqli_query($connect, $q);
?>



<table border="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>name</th>
    <th>number</th>
    <th>email</th>
    <th>method</th>
    <th>flat</th>
    <th>street</th>
    <th>City</th>
    <th>State </th>
	<th>COUNTRY</th>
    <th>POSTCODE</th>
    <th>total product</th>
    <th>total price</th>
  </tr>
<?php
if ($result->num_rows > 0) {
  $sn=1;
  while($data = $result->fetch_assoc()) {
 ?>
 <tr>
   <td><?php echo $data['name']; ?> </td>
   <td><?php echo $data['number']; ?> </td>
   <td><?php echo $data['email']; ?> </td>
   <td><?php echo $data['method']; ?> </td>
   <td><?php echo $data['flat']; ?> </td>
   <td><?php echo $data['street']; ?> </td>
   <td><?php echo $data['city']; ?> </td>
   <td><?php echo $data['state']; ?> </td>
   <td><?php echo $data['country']; ?> </td>
   <td><?php echo $data['pin_code']; ?> </td>
   <td><?php echo $data['total_products']; ?> </td>
   <td><?php echo $data['total_price']; ?> </td>
 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>

 <?php } ?>
  </table>
  </body>
  </table>