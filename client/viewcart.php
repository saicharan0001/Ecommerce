<html>

<head>
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
            padding: 6px;
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
        ._cart{
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
if($_SESSION['login_status_client']==false||isset($_SESSION['login_status_client'])==0){
echo "unathorized attempt";
die;
}
include '../shared/connection.php';
$userdata=$_SESSION['clientdata'];
$userid=$userdata['userid'];
include 'navbar.html';

$sql_cursor=mysqli_query($conn,"select * from manage_cart where userid=$userid");
while($rows=mysqli_fetch_assoc($sql_cursor)){
    $pid=$rows['pid'];
    $item=mysqli_fetch_assoc(mysqli_query($conn,"select * from product where pid = $pid"));
    $name=$item['name'];
    $price=$item['price'];
    $impath=$item['impath'];
    $details=$item['details'];
    $vendorid=$item['vendorid'];
    $vendordetails=mysqli_fetch_assoc(mysqli_query($conn,"select * from vendor_user where userid=$vendorid"));
    $vendorname=$vendordetails['Fullname'];
    $vendoremail=$vendordetails['username'];
    $created_date=$rows['created_date'];
    $date_str = $created_date; 
    $date = new DateTime($date_str); 
    $date->modify('+4 day');
    $delivery_date=$date->format('Y/m/d');
    echo "
    <div class='viewcart'>

    <div class='leftpart'>
        <img src='$impath' >
        <div class='name'><b>$name</b></div>
        <div class='price'><b style='color:blue;'>₹$price</b></div>
    </div>
   
    <div class='rightpart'>
        <div class='details pad'><h3 style='color:green'>Details</h3></div><hr>
        <div class='detail_product'>$details</div>
        <div class='sellername pad'><b> seller </b> : $vendorname</div>
        <div class='selleremail pad'><b>email</b> : $vendoremail</div>
        <div class=''><b>Expected Delivery Date</b> :$delivery_date</div>
        <div style='display:flex;'>
        <div class='delivered pad mar'><a href='removecart.php?pid=$pid'><button class='but'>Remove cart</button></a></div>
        <div class='delivered pad mar'><a href='orderdetails.php?pid=$pid'><button class='but' style='background-color:blue;'>order now</button></a></div>
        </div>
    </div>
    
</div>";
}

?>