<?php
session_start();
if($_SESSION['login_status_client']==false||isset($_SESSION['login_status_client'])==0){
echo "unathorized attempt";
die;
}
include '../shared/connection.php';
$userdata=$_SESSION['clientdata'];
include 'navbar.html';

?>
<html>

<head>
    <link rel="stylesheet" href="homepage.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Source Sans Pro', sans-serif;
        }
        .main_item_display{
            display: flex;
            margin:1vw;
           height:fit-content;
           overflow-x: auto;
          background-color: white;
        }

        .item_display {
            display: flex;
            flex-direction: column;
            /* overflow:hidden; */
            justify-content: space-between;
            padding:30px 50px;
            border-right: 2px solid rgba(220, 220, 220, 0.47);
        }

        .textdetails {
            display: flex;
            flex-direction: column;
        }

        .img img {
            width: 200px;
        }
        .textdetails{
            align-items: center;
        }
        .name,.price,.free_delivery{
            padding: 3px;
        }
        .cart{
            padding:10px;
            color:white;
            background-color: blue;
            border:none;
            border-radius: 2px;
        }
      .btn_2{
        border:none;
        border-radius:2px;
      }


        ._home{
            background-color: red; height:100%;display: flex;align-items: center;
        }
        
    </style>
</head>

<body>
    <div class="categories">
        <div class="item">
            <a href="viewcategories.php?cat=grocery"><img src="images/Grocery.webp">
                <p class="linkpara"> Grocery </p>
            </a>
        </div>
        <div class="item">
            <a href="viewcategories.php?cat=mobiles"><img src="images/Mobiles.webp">
                <p class="linkpara"> Mobiles </p>
            </a>
        </div>
        <div class="item">
            <a href="viewcategories.php?cat=fashion"><img src="images/Fashion.webp">
                <p class="linkpara"> Fashion </p>
            </a>
        </div>
        <div class="item">
            <a href="viewcategories.php?cat=electronics"><img src="images/Electronics.webp">
                <p class="linkpara"> Electronics </p>
            </a>
        </div>
        <div class="item">
            <a href="viewcategories.php?cat=home"><img src="images/Home.webp">
                <p class="linkpara"> Home </p>
            </a>
        </div>
        <div class="item">
            <a href="viewcategories.php?cat=appliances"><img src="images/Appliances.webp">
                <p class="linkpara"> Appliances </p>
            </a>
        </div>
        <div class="item">
            <a href="viewcategories.php?cat=travel"><img src="images/Travel.webp">
                <p class="linkpara"> Travel </p>
            </a>
        </div>
        <div class="item">
            <a href="viewcategories.php?cat=topoffers"><img src="images/Top Offers.webp">
                <p class="linkpara"> Top Offers </p>
            </a>
        </div>
        <div class="item">
            <a href="viewcategories.php?cat=beauty"><img src="images/Beauty.webp">
                <p class="linkpara"> Beauty,Toys<br>and More</p>
            </a>
        </div>
        <div class="item">
            <a href="viewcategories.php?cat=twowheelers"><img src="images/Twowheelers.webp">
                <p class="linkpara"> Twowheelers </p>
            </a>
        </div>
    </div>
    <div class="slider">
        <img src="images/slider.png" style="width: 98vw;">
    </div>

    <?php

   $sql_cursor=mysqli_query($conn,"select * from product where category='electronics' limit 10;");
   
   echo "<h2 style='text-align: center; color: black;font-family:  'Source Sans Pro', sans-serif;'>electronics
   <a href='viewcategories.php?cat=electronics'><button class='btn_2'>View All</button></a>
    </h2>";
    echo "<div class='main_item_display'>";
   while($rows=mysqli_fetch_assoc($sql_cursor)){
       $name=$rows['name'];
       $price=$rows['price'];
       $details=$rows['details'];
       $impath=$rows['impath'];
       $pid=$rows['pid'];
   
   
      echo "<div class='item_display'>
      <div class='img'><img src='$impath'></div>
      <div class='textdetails' style='font-weight:bold;'>
          <div class='name' >$name</div>
          <div class='price' style='color:red;'>₹1$price</div>
          <div class='free_delivery' style='color:green;'>Free delivery</div>
          <a href='addcart.php?pid=$pid'><button class='cart' style='padding: 10px;'>Add cart</button><a></a>
      </div>
  </div>";
}
echo "</div>";

   $sql_cursor=mysqli_query($conn,"select * from product where category = 'food' limit 10;");
   
   echo "<h2 style='text-align: center; color: black;font-family:  'Source Sans Pro', sans-serif;'>food
   <a href='viewcategories.php?cat=food'><button class='btn_2'>View All</button></a>
    </h2>";
    echo "<div class='main_item_display'>";
   while($rows=mysqli_fetch_assoc($sql_cursor)){
       $name=$rows['name'];
       $price=$rows['price'];
       $details=$rows['details'];
       $impath=$rows['impath'];
       $pid=$rows['pid'];
   
   
       echo "<div class='item_display'>
       <div class='img'><img src='$impath'></div>
       <div class='textdetails' style='font-weight:bold;'>
           <div class='name' >$name</div>
           <div class='price' style='color:red;'>₹1$price</div>
           <div class='free_delivery' style='color:green;'>Free delivery</div>
           <a href='addcart.php?pid=$pid'><button class='cart' style='padding: 10px;'>Add cart</button><a></a>
       </div>
   </div>";
 }
 echo "</div>";

   $sql_cursor=mysqli_query($conn,"select * from product where category='fashion' limit 10;");
   
   echo "<h2 style='text-align: center; color: black;font-family:  'Source Sans Pro', sans-serif;'>fashion
   <a href='viewcategories.php?cat=fashion'><button class='btn_2'>View All</button></a>
    </h2>";
    echo "<div class='main_item_display'>";
   while($rows=mysqli_fetch_assoc($sql_cursor)){
       $name=$rows['name'];
       $price=$rows['price'];
       $details=$rows['details'];
       $impath=$rows['impath'];
       $pid=$rows['pid'];
   
   
       echo "<div class='item_display'>
       <div class='img'><img src='$impath'></div>
       <div class='textdetails' style='font-weight:bold;'>
           <div class='name' >$name</div>
           <div class='price' style='color:red;'>₹1$price</div>
           <div class='free_delivery' style='color:green;'>Free delivery</div>
           <a href='addcart.php?pid=$pid'><button class='cart' style='padding: 10px;'>Add cart</button><a></a>
       </div>
   </div>";
 }
 echo "</div>";
   $sql_cursor=mysqli_query($conn,"select * from product where category='gym' limit 10");
   
   echo "<h2 style='text-align: center; color: black;font-family:  'Source Sans Pro', sans-serif;'>gym
   <a href='viewcategories.php?cat=gym'><button class='btn_2'>View All</button></a>
    </h2>";
    echo "<div class='main_item_display'>";
   while($rows=mysqli_fetch_assoc($sql_cursor)){
       $name=$rows['name'];
       $price=$rows['price'];
       $details=$rows['details'];
       $impath=$rows['impath'];
       $pid=$rows['pid'];
   
   
       echo "<div class='item_display'>
       <div class='img'><img src='$impath'></div>
       <div class='textdetails' style='font-weight:bold;'>
           <div class='name' >$name</div>
           <div class='price' style='color:red;'>₹1$price</div>
           <div class='free_delivery' style='color:green;'>Free delivery</div>
           <a href='addcart.php?pid=$pid'><button class='cart' style='padding: 10px;'>Add cart</button><a></a>
       </div>
   </div>";
 }
 echo "</div>";


?>






</body>

</html>