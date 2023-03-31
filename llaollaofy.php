<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>llaollao natural frozen yogurt</title>
      <link rel="stylesheet" href="stylellao.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <?php
//call file to connect server eLeave
include("headerllaollao.php");
?>
   <body>
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
                        <li><a href="smoothiep">smoothie premium</a></li>
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
               <a href="allegens.html">Nutrition
               <i class="fas fa-caret-down"></i>
               </a>
               <ul>
                  <li><a href="#">allegens</a></li>
               </ul>
            </li>
            <li><a href="#">News</a></li>
            <li><a href="location.php">Where</a>
            </li>
            <li>
               <a href="#">Contact Us
               <i class="fas fa-caret-down"></i>
               </a>
            </li>
            <li>
               <a href="products.php">order now</a></li>
         </ul>
      </nav>
   </div>
      <section></section>

      <div class="slideshow-container">

        <div class="mySlides fade">
          <div class="numbertext">1 / 2</div>
          <img src="llaollao fp1.jpg" width="" height="" alt=""/>
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">2 / 2</div>
          <img src="llaollao fp2.jpg" width="" height="" alt=""/>
        </div>
        
        
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
        
        </div>
        <br>
        
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
        </div>

        <center>
        <video width="727" height="540" controls>
         <source src="llaollaovid.mp4" type="video/mp4">
        <source src="llaollaovid.ogg" type="video/ogg">
         Your browser does not support the video tag.
         </video></center>

        <script>
            let slideIndex = 1;
            showSlides(slideIndex);
            
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
              let i;
              let slides = document.getElementsByClassName("mySlides");
              let dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1}    
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
            }
            </script>

        <div class="ending">
            <center><img src="llaollao fp3.jpg" width="711" height="122" alt=""/></center>
            <img src="straight line.png" width="1400" height="4"  alt=""/><br>
            © Copyright 2020 llaollao, Inc
            <p>
                <a href="https://www.facebook.com/llaollao"><img src="fbaes.jpg" width="56.4" height="56.4" align="right" alt=""/></a>
                <a href="https://twitter.com/llaollao"><img src="twitteraes.jpg" width="56.4" height="56.4" align="right" alt=""/></a>
                <a href="https://www.youtube.com/user/llaollaoYogurt"><img src="ytaes.jpg" width="56.4" height="56.4" align="right" alt=""/></a>
                <a href="https://www.instagram.com/llaollao_my/?hl=en">"<img src="instagramaes.jpg" width="56.4" height="56.4" align="right" alt=""/></a>
              </p>
            </div>
   </body>
</html>