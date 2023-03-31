<html>
<head>
<title>contact - llaollao</title>
<link rel="stylesheet" href="stylellao.css">
<style>
   input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>
<?php
//call file to connect server eLeave
include("headerllaollao.php");
?>
<?php
//This query inserts a record in the eLeave table
//has form been submitted?
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$error = array (); //initialize an error array

//check for the lastName
if(empty ($_POST['firstname']))
{
	$error [] = 'You forget to enter the name.';
}
else
{
	$name = mysqli_real_escape_string ($connect, trim ($_POST ['firstname']));
}

//check for the lastName
if(empty ($_POST['lastname']))
{
	$error [] = 'You forget to enter the name.';
}
else
{
	$lname = mysqli_real_escape_string ($connect, trim ($_POST ['lastname']));
}

//check for userEmail
if(empty ($_POST['email']))
{
	$error []  = 'You forget to enter your email.';
}
else
{
	$mail = mysqli_real_escape_string ($connect, trim ($_POST ['email']));
}

//check for userAddress
if(empty ($_POST['message']))
{
	$error  [] = 'You forget to enter your address.';
}
else
{
	$messages = mysqli_real_escape_string ($connect, trim ($_POST ['message']));
}

//register the admin in the database
//make the query:
$q = "INSERT INTO contact (contactID, firstname, lastname, email, message)
	VALUES('','$name','$lname','$mail','$messages' )";
	
$result = @mysqli_query ($connect, $q); //run the query
if($result)//if it runs
{
	echo '<h1>Hello, good day to you..I understand how you’re feeling right now, and I’m very sorry.
    I’m sending your request to the right person immediately to make sure we correct this as soon 
    as possible. </h1>';
	exit();
}
else
{
	//if it didn't run
	//message
	echo '<h1>System error</h1>';
	
	//debugging message
	echo '<p>'.mysqli_error($connect).'<br><br>Query: '.$q.'</p>';
} //end of it (result)

mysqli_close($connect); //close the database connection_aborted
exit();
} //end of the main submit conditional
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

<h1 style="color:lawngreen"> Contact Form </h1>
<h4> *required field</h4>
<form action = "contact.php" method = "post">

<div class="container">
<div>
<label for = "firstname"> First Name:</label>
<input type="text" id="firstname" name="firstname" size="30" maxlength="50" required
value = "<?php if (isset($_POST['firstname'])) echo $_POST['firstname'];?>">
</div>

<div>
<label for = "lastname"> Last Name:</label>
<input type="text" id="lastname" name="lastname" size="30" maxlength="50" required
value = "<?php if (isset($_POST['lastname'])) echo $_POST['lastname'];?>">
</div>

<div>
<label for = "email"> Email*:</label>
<input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="email" name="email" size="30" maxlength="50" required
value = "<?php if (isset($_POST['email'])) echo $_POST['email'];?>">
</div>

<div>
<label for="message">Message*:</label>
<textarea id="message" name="message" size="80" maxlength = "50" required
value = "<?php if (isset($_POST['message'])) echo $_POST['message'];?>"></textarea>
</div>


<div>
<button type="submit">Submit</button>
<button type="reset">Clear All</button>
</div>
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
</form>
</body>
</html>