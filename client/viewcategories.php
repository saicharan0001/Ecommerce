
<html>
    <head>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Signika+Negative&family=Source+Sans+Pro:wght@200;400&display=swap">
        <link rel="stylesheet" href="homepage.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Source Sans Pro', sans-serif;
        }
        .main_item_display{
            display: flex;
            flex-wrap: wrap;
            margin:1vw;
           height:fit-content;
           overflow-x: auto;
          background-color: white;
        }

        .item_display {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding:30px 50px;
            border-right: 2px solid rgba(220, 220, 220, 0.47);
            border-bottom: 2px solid rgba(220, 220, 220, 0.47);
        }

        .textdetails {
            display: flex;
            flex-direction: column;
        }

        .img img {
            width: 175px;
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
        .categoryheader{
            text-align: center;
            color:red;
        }
    </head>
</html>

<?php

$cat=$_GET['cat'];
session_start();
if($_SESSION['login_status_client']==false||isset($_SESSION['login_status_client'])==0){
echo "unathorized attempt";
die;
}
include '../shared/connection.php';
$userdata=$_SESSION['clientdata'];
include 'navbar.html';

$sql_cursor=mysqli_query($conn,"select *from product where category='$cat'");
echo "    <div class='categoryheader' >
<h2>$cat</h2>
</div>";
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