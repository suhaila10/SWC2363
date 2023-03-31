<html>
<head>
<title>Cart - llaollao</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

:root{
   --green:#27ae60;
   --black:#333;
   --white:#fff;
   --bg-color:#eee;
   --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
   --border:.1rem solid var(--black);
}

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
   text-transform: capitalize;
}

html{
   font-size: 62.5%;
   overflow-x: hidden;
}

.btn{
   display: block;
   width: 100%;
   cursor: pointer;
   border-radius: .5rem;
   margin-top: 1rem;
   font-size: 1.7rem;
   padding:1rem 3rem;
   background: var(--green);
   color:var(--white);
   text-align: center;
}

.btn:hover{
   background: var(--black);
}

.message{
   display: block;
   background: var(--bg-color);
   padding:1.5rem 1rem;
   font-size: 2rem;
   color:var(--black);
   margin-bottom: 2rem;
   text-align: center;
}

.container{
   max-width: 1200px;
   padding:2rem;
   margin:0 auto;
}

.admin-product-form-container.centered{
   display: flex;
   align-items: center;
   justify-content: center;
   min-height: 100vh;
   
}

.admin-product-form-container form{
   max-width: 50rem;
   margin:0 auto;
   padding:2rem;
   border-radius: .5rem;
   background: var(--bg-color);
}

.admin-product-form-container form h3{
   text-transform: uppercase;
   color:var(--black);
   margin-bottom: 1rem;
   text-align: center;
   font-size: 2.5rem;
}

.admin-product-form-container form .box{
   width: 100%;
   border-radius: .5rem;
   padding:1.2rem 1.5rem;
   font-size: 1.7rem;
   margin:1rem 0;
   background: var(--white);
   text-transform: none;
}

.product-display{
   margin:2rem 0;
}

.product-display .product-display-table{
   width: 100%;
   text-align: center;
}

.product-display .product-display-table thead{
   background: var(--bg-color);
}

.product-display .product-display-table th{
   padding:1rem;
   font-size: 2rem;
}


.product-display .product-display-table td{
   padding:1rem;
   font-size: 2rem;
   border-bottom: var(--border);
}

.product-display .product-display-table .btn:first-child{
   margin-top: 60;
}

.product-display .product-display-table .btn:last-child{
   background: crimson;
}

.product-display .product-display-table .btn:last-child:hover{
   background: var(--black);
}









@media (max-width:991px){

   html{
      font-size: 55%;
   }

}

@media (max-width:768px){

   .product-display{
      overflow-y:scroll;
   }

   .product-display .product-display-table{
      width: 80rem;
   }

}

@media (max-width:450px){

   html{
      font-size: 50%;
   }

}
    }
    </style>
</head>
<?php
//call file to connect server eLeave
include("headerllaollao.php");
?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST') {
    if(empty ($_POST['productName']))
    {
	    $error  = 'You forget to enter the product name.';
    }
    else
    {
	    $name = mysqli_real_escape_string ($connect, trim ($_POST ['productName']));
    }

    if(empty ($_POST['productPrice']))
    {
	    $error  = 'You forget to enter the product price.';
    }
    else
    {
	    $price = mysqli_real_escape_string ($connect, trim ($_POST ['productPrice']));
    }

    if(empty ($_POST['productQuantity']))
    {
	    $error  = 'You forget to enter the product quantity.';
    }
    else
    {
	    $quantity = mysqli_real_escape_string ($connect, trim ($_POST ['productName']));
    }

    if(empty ($_POST['image']))
    {
	    $error  = 'You forget to enter the product image.';
    }
    else 
    {
        $img = mysqli_real_escape_string ($connect, trim ($_POST ['image']));
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
    }

    if(empty ($_POST['productDesc']))
    {
	    $error  = 'You forget to enter the product image.';
    }
    else 
    {
        $desc = mysqli_real_escape_string ($connect, trim ($_POST ['productDesc']));
    }
   
    //register the admin in the database
//make the query:
$q = "INSERT INTO product (productID, productName, productPrice, productQuantity, image, productDesc)
VALUES('','$name','$price','$quantity', '$img', '$desc' )";

$result = @mysqli_query ($connect, $q); //run the query
if($result)//if it runs
{
header('Location:login.php');
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
<body>
    <div class="container">
        <div class="admin-product-form-container">
    <form class="" action="" method="post" autocomplete="off" enctype="mutipart/form-data">
       <label for ="productName">Name : </label>
       <input type="text" name="productName" id="productName" value="<?php if (isset($_POST['productName'])) echo $_POST['productName'];?>"> <br><br>
       <label for ="productPrice">Price : RM </label>
       <input type="text" name="productPrice" id="productPrice" value="<?php if (isset($_POST['productPrice'])) echo $_POST['productPrice'];?>"> <br><br>
       <label for ="productQuantity">Quantity : </label>
       <input type="text" name="productQuantity" id="productQuantity" value="<?php if (isset($_POST['productQuantity'])) echo $_POST['productQuantity'];?>"> <br><br>
        <!-- upload image-->
       <label for="image">Image: </label>
       <input type="file" name="image" id ="image" accept =".jpg, .jpeg, .png" value="<?php if (isset($_POST['image'])) echo $_POST['image'];?>"> <br><br>
       <label for="productDesc">Product Description: </label>
       <input type="textarea" name="productDesc" id ="productDesc"  value="<?php if (isset($_POST['productDesc'])) echo $_POST['productDesc'];?>"> <br><br>

       <button type="submit" name="submit">Submit</button><br>
       <button><a href="order1.php">CHECK RESULT</a></button>
       </div>
</form>
</div>
</body>
</html>