<html>
<head>
<title>Search Location</title>
<link rel="stylesheet" href="stylellao.css">
<link rel="stylesheet" href="adminstyle.css">

<style>

 .search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #00B4CC;
  border-right: none;
  padding: 5px;
  height: 50px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  width: 40px;
  height: 50px;
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: greenyellow;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 50%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.img1 {
  justify-content: center;
  margin-top:100px;
}

	</style>
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

<form action="locationFound.php" method="post">

<div class="wrap">
<center><img src="Llaollao-300x126.png" width="300" height="126" alt=""/><br><br></center>
   <div class="search">
   <input id="locationPlace" type="text" name="locationPlace" size="100"
   placeholder="Search llaollao stall near you"
	maxlength="150" value="<?php if(isset($_POST['locationPlace']))
	echo $_POST['locationPlace']; ?>"/></p>
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>



</form>

</body>
</html>