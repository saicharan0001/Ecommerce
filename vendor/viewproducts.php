
<html>
    <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Signika+Negative&family=Source+Sans+Pro:wght@200;400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="homepage.css">
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
        .box:hover{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .box {
            cursor: pointer;
            padding: 14px;
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

        .btns .edit {
            cursor: pointer;
            background-color: blue;
            padding: 6px;
            color: white;
            border-radius: 2px;
            border: none;
        }

        .btns .delete {
            cursor: pointer;
            background-color: red;
            padding: 6px;
            color: white;
            border-radius: 2px;
            border: none;
        }
    </style>
    </head>
    <body>

    </body>
</html>


<?php
include '../shared/connection.php';
session_start();
if($_SESSION['login_status']==false||isset($_SESSION['login_status'])==0){
echo "unathorized attempt";
die;
}
$userdata=$_SESSION['userdata'];
$id=$userdata['userid'];
include 'navigation.html';
$sql_cursor=mysqli_query($conn,"select * from product where vendorid=$id");
echo "<div class='container'>";
while($rows=mysqli_fetch_assoc($sql_cursor)){
    $name=$rows['name'];
    $price=$rows['price'];
    $details=$rows['details'];
    $impath=$rows['impath'];
    $pid=$rows['pid'];
    echo "
    <div class='box'>
            <img src='$impath'>
            <div class='name'>$name</div>
            <div class='price'>$$price </div>
            <div class='btns'>
                <a href='edit.php?pid=$pid'><button class='edit'><i class='material-icons'>edit</i></button></a>
                <a href='delete.php?pid=$pid'><button class='delete'><i class='material-icons'>delete</i></button></a>
            </div>
            </div>
    ";
}
echo "</div>";
?>