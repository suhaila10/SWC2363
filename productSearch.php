<html>
<head>
<title>Search Location</title>
<link rel="stylesheet" href="stylellao.css">

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


<form action="productFound.php" method="post">

<div class="wrap">
<center><img src="Llaollao-300x126.png" width="300" height="126" alt=""/><br><br></center>
   <div class="search">
   <input id="productName" type="text" name="productName" size="100"
   placeholder="Search llaollao stall near you"
	maxlength="50" value="<?php if(isset($_POST['productName']))
	echo $_POST['productName']; ?>"/></p>
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>
</div>
</form>
</body>
</html>