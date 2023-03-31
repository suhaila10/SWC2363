<?php

@include 'headerllaollao.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($connect, "UPDATE `cart` SET cartQuantity = '$update_value' WHERE cartID = '$update_id'");
   if($update_quantity_query){
      header('location:cart2.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($connect, "DELETE FROM `cart` WHERE cartID = '$remove_id'");
   header('location:cart2.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($connect, "DELETE FROM `cart`");
   header('location:cart2.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

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

<section class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($connect, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $fetch_cart['cartImage']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['cartName']; ?></td>
            <td>RM<?php echo number_format($fetch_cart['cartPrice']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['cartID']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['cartQuantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>RM<?php echo $sub_total = number_format($fetch_cart['cartPrice'] * $fetch_cart['cartQuantity']); ?>/-</td>
            <td><a href="cart2.php?remove=<?php echo $fetch_cart['cartID']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>RM<?php echo $grand_total; ?>/-</td>
            <td><a href="cart2.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>

</section>

</div>
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
   
<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>