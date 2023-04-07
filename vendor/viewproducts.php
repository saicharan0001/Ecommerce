
<html>
    <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Signika+Negative&family=Source+Sans+Pro:wght@200;400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="homepage.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Signika+Negative&family=Source+Sans+Pro:wght@200;400&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .viewcart {
            display: flex;
            justify-content: space-around;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin: 5vw;
            padding: 2vw;
            height: fit-content;
        }

        .viewcart:hover {
            box-shadow: 0 0 10px 10px rgba(226, 231, 232, 1);
        }
        .mar{
            margin-right:10px;
        }

        .leftpart {
            width: 50%;
            margin: 20px 0px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
        }

        .leftpart img {
            width: 175px;
        }

        .rightpart {
            width: 50%;

            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .name,
        .price {
            margin: 10px;
        }

        .delivered .but {
            color: white;
            padding: 5px 20px;
            border: none;
            border-radius: 2px;
            background-color: rgb(217, 83, 79);
        }

        @media screen and (max-width:600px) {

            .leftpart .name,
            .price {
                margin: 2px 0px;
            }

            .leftpart img {
                border: 2px solid red;
                width: 175px;
            }

            .viewcart {
                flex-direction: column;
                align-items: center;
            }

            .leftpart {
                width: 90%;
                margin: 10px 0px;
            }

            .rightpart {
                width: 90%;
            }

            .pad {
                padding: 2px 0px;
            }
        }
        ._products{
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
// echo "<div class='container'>";
while($rows=mysqli_fetch_assoc($sql_cursor)){
    $name=$rows['name'];
    $price=$rows['price'];
    $details=$rows['details'];
    $impath=$rows['impath'];
    $created_date=$rows['created_date'];
    $date = new DateTime($created_date); 
    $uploaded_date=$date->format('Y/m/d');
    $pid=$rows['pid'];
    // echo "
    // <div class='box'>
    //         <img src='$impath'>
    //         <div class='name'>$name</div>
    //         <div class='price'>$$price </div>
    //         <div class='btns'>
    //             <a href='edit.php?pid=$pid'><button class='edit'><i class='material-icons'>edit</i></button></a>
    //             <a href='delete.php?pid=$pid'><button class='delete'><i class='material-icons'>delete</i></button></a>
    //         </div>
    //         </div>
    // ";

    echo "
    <div class='viewcart'>

    <div class='leftpart'>
        <img src='$impath' >
        <div class='name'><b>$name</b></div>
        <div class='price'><b style='color:blue;'>₹$price</b></div>
    </div>
   
    <div class='rightpart'>
        <div class='details pad'><h3 style='color:green'>Details</h3></div><hr>
        <div class='detail_product'><b>Description of the product &nbsp;: </b> &nbsp;$details</div>
        <div class='detail_product'><b>Uploaded Date:&nbsp; </b>&nbsp;$uploaded_date</div>
        <div style='display:flex;'>
        <div class='delivered pad mar'><a href='edit.php?pid=$pid'><button class='but'><i class='material-icons'>edit</i></button></a></div>
        <div class='delivered pad mar'><a href='delete.php?pid=$pid'><button class='but' style='background-color:blue;'><i class='material-icons'>delete</i> </button></a></div>
        </div>
    </div>
    
</div>";
}
// echo "</div>";
?>