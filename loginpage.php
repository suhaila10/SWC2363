<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>llaollao natural frozen yogurt</title>
      <link rel="stylesheet" href="stylellao.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <style>
        .choose1 {
            margin: auto;
            border: 3px solid #73AD21;
            padding:5px;
        }

         .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 60px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            -webkit-transition-duration: 0.4s; /* Safari */
             transition-duration: 0.4s;
             width: 500px;
            height: 100px;
}
.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
        
        
        </style>
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
            <li><a href="location.php">Where</a>
            </li>
            <li>
               <a href="contact.php">Contact Us
               <i class="fas fa-caret-down"></i>
               </a>
            </li>
</div>  

<div class="choose1">
<p><a href="login.php"><img src="people.png" width="102.4" height="102.4" alt=""/>ADMIN LOGIN<a></p></div>
<center>
<a href="adminusermanualllaollao.pdf"><button class="button button2">CLICK HERE FOR ADMIN USER MANUAL</button></a><br><br></center>
<div class="choose1">
<p><a href="login1.php"><img src="user.png" width="102.4" height="102.4" alt=""/>USER LOGIN<a></p></div>
<center>
<a href="userusermanual.pdf"><button class="button button2">CLICK HERE FOR THE USER MANUAL</button></a></center>
   </body>
</html>