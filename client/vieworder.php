<html>
<head>
<style>
        * {
            margin: 0;
            padding: 0;
        }
        body{
            background-color: white;
        }

        .container {
            margin: 5vw;
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
            font-family: 'Source Sans Pro', sans-serif;
        }
        
        .box {
            cursor: pointer;
            padding: 14px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .box img {
            width: 220px;
        }

        .name,
        .price,
        .delivery {
            padding: 4px;
        }

        .delivery {
            color: green;
        }

        .price {
            font-size: large;
        }

        .name {
            color: blue;
            font-size: large;
        }

        .btns {
            display: flex;
            justify-content: space-around;
            padding: 4px;
        }

        .btns .remove {
            cursor: pointer;
            background-color: blue;
            padding: 10px;
            color: white;
            border-radius: 2px;
            border: none;
        }

        .btns .order {
            cursor: pointer;
            background-color: red;
            padding: 10px;
            color: white;
            border-radius: 2px;
            border: none;
        }
        ._order{
            background-color: red;
             height:100%;
             display: flex;
             align-items: center;
        }
    </style>
</head>
<body>  
</body>
</html>


<?php 

session_start();
if($_SESSION['login_status_client']==false||isset($_SESSION['login_status_client'])==0){
echo "unathorized attempt";
die;
}
include '../shared/connection.php';
$userdata=$_SESSION['clientdata'];
include 'navbar.html';
$userid=$userdata['userid'];

$sql_cursor=mysqli_query($conn,"select * from manage_order where userid=$userid");
echo "<div class='container'>";
while($rows=mysqli_fetch_assoc($sql_cursor)){
    $pid=$rows['pid'];
    $item=mysqli_fetch_assoc(mysqli_query($conn,"select * from product where pid = $pid"));
    $name=$item['name'];
    $price=$item['price'];
    $impath=$item['impath'];
    echo "
    <div class='box'>
            <img src='$impath'>
            <div class='name'>$name</div>
            <div class='price'>$$price </div>
            <div class='btns'>
                <a href=cancelorder.php?pid=$pid><button class='remove'>cancel order</button></a>
            </div>
            </div>";
}
echo "</div>";

?>
