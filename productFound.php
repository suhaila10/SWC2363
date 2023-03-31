<html>
<head>
<title>product search-llaollao</title>
<link rel="stylesheet" href="style2.css">
</head>
<body>
<?php
//call file to connect server eleave
include ("headerllaollao.php");
?>
<h2>Search Result</h2>

<?php
	$productName= $_POST['productName'];
    $in= mysqli_real_escape_string($connect, $productName);
	
	//make the query
	$q = "SELECT productID, productName, productPrice, ProductQuantity, image
	FROM product WHERE productName='$in' ORDER BY productID";
	
	//run the query and assign it to the variable $result
	$result = @mysqli_query ($connect, $q);
	
	if ($result)
	{
		//Fetch and print all the records
		while ($fetch_product=mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			?>

    <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['productName']; ?></h3>
            <div class="productPrice">RM <?php echo $fetch_product['productPrice']; ?></div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['productName']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['productPrice']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
            <a href="product.php"><input type="submit" class="btn" value="Go Back"></a>
         </div>
      </form>

      <?php
         };    
         }
         else
         {
         //error message
		echo '<p class ="error"> If no record is shown, this is because you had an incorrect or missing entry in search form.<br>Click the back button on the browser and try again.</p>';
		
		//debugging message
		echo '<p>'.mysqli_error($connect).'<br><br/>Query:'.$q.'</p>';
	}
	//close the database connection 
	mysqli_close($connect);
      ?>
    </div>

</section>

</body>
</html>