<html>
<head>
<title>llaollao Management System</title>
<link rel="stylesheet" href="stylellao.css">
</head>
<body>
<?php
//call file to connect server eleave
include ("headerllaollao.php");
?>
<div class="primary_header">
<nav>
  <div class="logo">
   <img src="Llaollao-300x126.png" width="110" height="52" alt=""/></div>
   <ul>
	  <li>
		 <a href="#">About Us
		 <i class="fas fa-caret-down"></i>
		 </a>
		 <ul>
			<li><a href="frozenyogurt.html">frozen yogurt</a></li>
			<li><a href="brand.html">brand</a></li>
			<li><a href="company.html">company</a></li>
		 </ul>
	  </li>
	  <li>
		 <a href="#">Menu
		 <i class="fas fa-caret-down"></i>
		 </a>
		 <ul>
			<li>
			   <a href="#">Product
			   <i class="fas fa-caret-right"></i>
			   </a>
			   <ul>
				  <li><a href="tub.html">tub</a></li>
				  <li><a href="petitllao.html">petitllao</a></li>
				  <li><a href="sanum.html">sanum</a></li>
				  <li><a href="smoothie.html">smoothie</a></li>
				  <li><a href="smoothiep.html">smoothie premium</a></li>
			   </ul>
			</li>
			<li>
			   <a href="#">Toppings
			   <i class="fas fa-caret-right"></i>
			   </a>
			   <ul>
				  <li><a href="fruits.html">fruit
				  <i class="fas fa-caret-right"></i>
			   </a>
			   <ul>
				  <li><a href="watermelon.html">watermelon</a></li>
				  <li><a href="banana.html">banana</a></li>
				  <li><a href="pineapple.html">pineapple</a></li><!--takde-->
				  <li><a href="melon.html">melon</a></li><!--takde-->
				  <li><a href="mango.html">mango</a></li>
				  <li><a href="kiwi.html">kiwi</a></li> <!--takde-->
				  <li><a href="pomegranate.html">pomegranate</a></li> <!--takde-->
				  <li><a href="strawberry.html">strawberry</a></li>
			   </ul>
			</li>
				  </a></li>
				  <li><a href="crunch.html">crunch
				  <i class="fas fa-caret-right"></i>
			   </a>
			   <ul>
				  <li><a href="almond-crocanti.html">almond crocanti</a></li>
				  <li><a href="chips ahoy.html">chips ahoy!</a></li>
				  <li><a href="dark-conguitos.html">dark conguitos</a></li>
				  <li><a href="muesli.html">muesli with no added sugar</a></li>
				  <li><a href="lotus.html">lotus caramelised biscuit</a></li>
				  <li><a href="kitkat.html">kitkat pop choc</a></li>
				  <li><a href="lacasitos.html">lacasitos</a></li> 
				  <li><a href="walnuts.html">walnuts</a></li>
			   </ul>
			</li>
				  </a></li>
				  <li><a href="sauces.html">sauces
				  <i class="fas fa-caret-right"></i>
			   </a>
			   <ul>
				  <li><a href="white-chocorock.html">white chocorock</a></li>
				  <li><a href="dark-chocolate.html">dark chocolate</a></li>
				  <li><a href="dulche-de-leche.html">dulche de leche</a></li>
				  <li><a href="white-chocolate.html">white chocolate</a></li>
				  <li><a href="fruit-of-the-forest.html">fruit of the forest</a></li>
				  <li><a href="wild-strawberries.html">wild strawberries</a></li>
				  <li><a href="mango-sauces.html">mango</a></li>
				  <li><a href="green-apple.html">green apple</a></li>
				  <li><a href="passion-fruit.html">passion fruit</a></li>
				  <li><a href="honey.html">honey</a></li>
				  <li><a href="nocilla.html">nocilla</a></li>
			   </ul>
			</li>
				  </a></li>
			   </ul>
			</li>
		 </ul>
	  </li>
	  <li>
		 <a href="nutrition.html">Nutrition
		 <i class="fas fa-caret-down"></i>
		 </a>
		 <ul>
			<li><a href="allegens.html">allegens</a></li>
		 </ul>
	  </li>
	  <li><a href="news.html">News</a></li>
	  <li><a href="location.php">Where</a>
	  </li>
	  <li>
		 <a href="contact.php">Contact Us
		 <i class="fas fa-caret-down"></i>
		 </a>
	  </li>
	  <li>
		 <a href="products.php">order now</a></li>
   </ul>
</nav>
</div>
<h1 style="color:lawngreen">Store finder</h1>

<center><iframe src="https://www.google.com/maps/d/u/0/embed?mid=1y8_Yi5TXTulNoDQmp0CKLnOlcXrVFQk&ehbc=2E312F" width="640" height="480"></iframe></center>

<?php
	$in=$_POST['locationPlace'];
	$in= mysqli_real_escape_string($connect, $in);
	
	//make the query
	$q = "SELECT locationID, locationPlace, locationName, locationAddress
	FROM location WHERE locationPlace='$in' ORDER BY locationID";
	
	//run the query and assign it to the variable $result
	$result = @mysqli_query ($connect, $q);
	
	if ($result)
	{
		//Table heading
		echo '<table border = "2">
		<tr>
		<td align="center"><strong>ID</strong></td>
        <td align="center"><strong>PLACE</strong></td>
		<td align="center"><strong>NAME</strong></td>
		<td align="center"><strong>ADDRESS</strong></td>
		</tr>';
		
		//Fetch and print all the records
		while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			echo '<tr>
			<td>'.$row['locationID'].'</td>
            <td>'.$row['locationPlace'].'</td>
			<td>'.$row['locationName'].'</td>
			<td>'.$row['locationAddress'].'</td>
			</tr>';
		}
	
		//close the table
		echo '</table>';
	
		//free up the resources
		mysqli_free_result ($result);
		//if failed to run
	}
	else
	{
		//error message
		echo'<p class="error">If no record is shown, this s because you had
		an incorrect or missing entry in search form.<br>Click the back button
		on the browser and try again.</p>';
		
		//debugging message
		echo '<p>'.mysqli_error ($connect).'<br><br>Query:'.$q.'</p>';
	} //end of it ($result)
	//close the database connection
	mysqli_close($connect);
	?>

	<br><br>
    <div class="ending">
        <center><img src="llaollao fp3.jpg" width="711" height="122" alt=""/></center>
        <img src="straight line.png" width="1400" height="4"  alt=""/><br>
        <p>
            <a href="https://www.facebook.com/llaollao"><img src="fbaes.jpg" width="56.4" height="56.4" align="right" alt=""/></a>
            <a href="https://twitter.com/llaollao"><img src="twitteraes.jpg" width="56.4" height="56.4" align="right" alt=""/></a>
            <a href="https://www.youtube.com/user/llaollaoYogurt"><img src="ytaes.jpg" width="56.4" height="56.4" align="right" alt=""/></a>
            <a href="https://www.youtube.com/user/llaollaoYogurt">"<img src="instagramaes.jpg" width="56.4" height="56.4" align="right" alt=""/></a>
          </p>
        </div>
	
</div>
</div>
</body>
</html>