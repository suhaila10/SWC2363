<?php

@include 'headerllaollao.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($connect, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['cartName'] .' ('. $product_item['cartQuantity'] .') ';
         $product_price = number_format($product_item['cartPrice'] * $product_item['cartQuantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($connect, "INSERT INTO `order`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style2.css">
   <link rel="stylesheet" href="stylellao.css">

</head>
<body>

<div class="container">
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
             </a>
          </li>
          <li>
             <a href="products.php">order now</a></li>
       </ul>
    </nav>
 </div>

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($connect, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['cartPrice'] * $fetch_cart['cartQuantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['cartName']; ?>(<?= $fetch_cart['cartQuantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : RM<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. flat no." name="flat" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name" name="street" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. Klang" name="city" required>
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" placeholder="e.g. Selangor" name="state" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. Malaysia" name="country" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>
   <div class="ending">
            <br><br>
              <center><img src="llaollao fp3.jpg" width="711" height="122" alt=""/></center>
              <img src="straight line.png" width="1400" height="4"  alt=""/><br>
              <p>
                  <a href="https://www.facebook.com/llaollao"><img src="fbaes.jpg" width="56.4" height="56.4" align="right" alt=""/></a>
                  <a href="https://twitter.com/llaollao"><img src="twitteraes.jpg" width="56.4" height="56.4" align="right" alt=""/></a>
                  <a href="https://www.youtube.com/user/llaollaoYogurt"><img src="ytaes.jpg" width="56.4" height="56.4" align="right" alt=""/></a>
                  <a href="https://www.instagram.com/llaollao_my/?hl=en">"<img src="instagramaes.jpg" width="56.4" height="56.4" align="right" alt=""/></a>
                </p>
              </div>

</section>

</div>

<!-- custom js file link  -->
<script src="script.js"></script>
   
</body>
</html>