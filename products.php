<?php

@include 'headerllaollao.php';


if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($connect, "SELECT * FROM `cart` WHERE cartName = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($connect, "INSERT INTO `cart`(cartName, cartPrice, cartImage, cartQuantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style2.css">

   <style>
      .cart {
         float: right;
         padding-right: 30px;
         padding-top: 15px;
      }

	  /*navbar*/
nav{
	height: 70px;
	background-color: floralwhite;;
	box-shadow: 0 0 0 rgba(0,0,0,.4);
  }
  nav ul{
	float: right;
	margin-right: 30px;
  }
  nav ul li{
	display: inline-block;
  }
  nav ul li a{
	color:black;
	display: block;
	padding: 0 20px;
	line-height: 70px;
	font-size: 20px;
	background-color: floralwhite;
	transition: .5s;
  }
  nav ul li a:hover,
  nav ul li a.active{
	color: whitesmoke;
  }
  nav ul ul{
	position: absolute;
	top: 85px;
	border-top: 3px solid lawngreen;
	opacity: 0;
	visibility: hidden;
  }
  nav ul li:hover > ul{
	top: 70px;
	opacity: 1;
	visibility: visible;
	transition: .3s linear;
  }
  nav ul ul li{
	width: auto;
	display: list-item;
	position: relative;
	border: 1px solid lawngreen;
	border-top: none;
  }
  nav ul ul li a{
	line-height: 50px;
  }
  nav ul ul ul{
	border-top: none;
  }
  nav ul ul ul li{
	position: relative;
	top: -70px;
	left: 150px;
  }
  nav ul ul li a i{
	margin-left: 45px;
  }
  section{
	background: url(bg.jpeg);
	background-position: center;
	background-size: cover;
	height: 100vh;
  }

  .logo img {
    position:absolute;
    margin-top: 20px;
    margin-left: 20px;
  }

  .logologin img {
    justify-content: center;
  }

  .logologin .tooltiptext {
    
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
  
    /* Position the tooltip */
    justify-content: center;
  }
      </style>
</head>
<body>
<div class="cart">
<a href="cart2.php"><img src="cart.png" width="51.2" height="51.2" alt=""/></a></div>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

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
				  <li><a href="white-chococrock.html">white chocorock</a></li>
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

<center><img src="Llaollao-300x126.png" width="300" height="126" alt=""/></center>

<div class="container">

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($connect, "SELECT * FROM `product`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['productName']; ?></h3>
            <div class="price">RM<?php echo $fetch_product['productPrice']; ?></div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['productName']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['productPrice']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>
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

</section>
</div>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>