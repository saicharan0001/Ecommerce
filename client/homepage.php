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
        .categories_2 {
            margin: 10px;
            border: 2px solid gainsboro;
            display: flex;
            /* flex-wrap: wrap; */
            align-items: center;
            justify-content: space-between;
            background-color: white;
            border-radius: 0.3vh;
            overflow-x: auto;
        }

        .categories_2 img {
            height: 40%;
            width: 12vw;
            margin: 20px;
        }

        .btn_2 {
            background-color: #2874f0;
            margin-left: 10px;
            color: white;
            /* font-weight:900; */
            font-size: medium;
            font-family: 'Source Sans Pro', sans-serif;
            padding: 4px 10px;
        }

        .btn_2:hover {
            font-weight: 900;
        }

        .linkpara {
            text-align: center;
            
        }
        .cart{
            background-color:rgb(0, 123, 255);
            padding:2px;
            margin-top:5px;
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

   $sql_cursor=mysqli_query($conn,"select * from product where category='electronics';");
   
   echo "<h2 style='text-align: center; color: black;font-family:  'Source Sans Pro', sans-serif;'>electronics
   <button class='btn_2'>View All</button>
    </h2>";
    echo "<div class='categories_2'>";
   while($rows=mysqli_fetch_assoc($sql_cursor)){
       $name=$rows['name'];
       $price=$rows['price'];
       $details=$rows['details'];
       $impath=$rows['impath'];
       $pid=$rows['pid'];
   
   
      echo "<div class='item'>
      <a href='s.html'><img src='$impath'>
          <p class='linkpara'>$name<br>$price<br>
              <l style='color:green'>Min. 50% Off</l><br>
              <l><a href='addcart.php?pid=$pid'><button class ='cart'>Add cart</button><a></l>
          </p>
      </a>
  </div>";
}
echo "</div>";

   $sql_cursor=mysqli_query($conn,"select * from product where category = 'food';");
   
   echo "<h2 style='text-align: center; color: black;font-family:  'Source Sans Pro', sans-serif;'>food
   <button class='btn_2'>View All</button>
    </h2>";
    echo "<div class='categories_2'>";
   while($rows=mysqli_fetch_assoc($sql_cursor)){
       $name=$rows['name'];
       $price=$rows['price'];
       $details=$rows['details'];
       $impath=$rows['impath'];
       $pid=$rows['pid'];
   
   
      echo "<div class='item'>
      <a href='s.html'><img src='$impath'>
          <p class='linkpara'>$name<br>$price<br>
              <l style='color:green'>Min. 50% Off</l><br>
              <l><a href='addcart.php?pid=$pid'><button class ='cart'>Add cart</button><a></l>
          </p>
      </a>
  </div>";
}
echo "</div>";

   $sql_cursor=mysqli_query($conn,"select * from product where category='fashion';");
   
   echo "<h2 style='text-align: center; color: black;font-family:  'Source Sans Pro', sans-serif;'>fashion
   <button class='btn_2'>View All</button>
    </h2>";
    echo "<div class='categories_2'>";
   while($rows=mysqli_fetch_assoc($sql_cursor)){
       $name=$rows['name'];
       $price=$rows['price'];
       $details=$rows['details'];
       $impath=$rows['impath'];
       $pid=$rows['pid'];
   
   
      echo "<div class='item'>
      <a href='s.html'><img src='$impath'>
          <p class='linkpara'>$name<br>$price<br>
              <l style='color:green'>Min. 50% Off</l><br>
              <l><a href='addcart.php?pid=$pid'><button class ='cart'>Add cart</button><a></l>
          </p>
      </a>
  </div>";
}
echo "</div>";

   $sql_cursor=mysqli_query($conn,"select * from product where category='gym';");
   
   echo "<h2 style='text-align: center; color: black;font-family:  'Source Sans Pro', sans-serif;'>gym
   <button class='btn_2'>View All</button>
    </h2>";
    echo "<div class='categories_2'>";
   while($rows=mysqli_fetch_assoc($sql_cursor)){
       $name=$rows['name'];
       $price=$rows['price'];
       $details=$rows['details'];
       $impath=$rows['impath'];
       $pid=$rows['pid'];
   
   
      echo "<div class='item'>
      <a href='s.html'><img src='$impath'>
          <p class='linkpara'>$name<br>$price<br>
              <l style='color:green'>Min. 50% Off</l><br>
              <l><a href='addcart.php?pid=$pid'><button class ='cart'>Add cart</button><a></l>
          </p>
      </a>
  </div>";
}
echo "</div>";



?>






</body>

</html>