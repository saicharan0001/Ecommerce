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

        .vieworder {
            display: flex;
            justify-content: space-around;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin:5vw;
            padding:2vw;
            height:fit-content;
        }
        .vieworder:hover{
            box-shadow: 0 0 10px 10px rgba(226, 231, 232, 1);
        }
        .leftpart{
            width: 50%;
            margin:20px 0px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
        }
        .leftpart img{
            width:200px ;
        }
        .rightpart{
            width: 50%;
            
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }
        .name,.price{
            margin: 10px;
        }
        .delivered .btn{
            color:white;
            padding: 6px;
            border: none;
            border-radius: 2px;
            background-color: rgb(217, 83, 79);
        }
      @media screen and (max-width:600px){
     .leftpart .name,.price{
        margin:2px 0px;
     }
     .leftpart img{
        border:2px solid red;
        width:175px;
     }
.vieworder{
    flex-direction: column;
    align-items: center;
}
.leftpart{
    width:90%;
    margin:10px 0px;
}
.rightpart{
    width:90%;
}
.pad{
    padding:2px 0px;
}
}
._vieworders{
            background-color: red;
             height:100%;
             display: flex;
             align-items: center;
        }
    </style>
    </head>

</html>

<?php
include '../shared/connection.php';
session_start();
if($_SESSION['login_status']==false||isset($_SESSION['login_status'])==0){
echo "unathorized attempt";
die;
}
$userdata=$_SESSION['userdata'];
$userid=$userdata['userid'];
include 'navigation.html';
$sql_cursor=mysqli_query($conn,"SELECT * FROM manage_order where vendorid=$userid");
// print_r($sql_cursor);
while($rows=mysqli_fetch_assoc($sql_cursor)){
    $orderid=$rows['orderid'];
    $Fullname=$rows['Fullname'];
    $phonenumber=$rows['phonenumber'];
    $Email=$rows['Email'];
    $Adress=$rows['Adress'];
    $instructions=$rows['instructions'];
    $pid=$rows['pid'];
    $pname=mysqli_fetch_assoc(mysqli_query($conn,"select * from product where pid=$pid"))['name'];
    $pimpath=mysqli_fetch_assoc(mysqli_query($conn,"select * from product where pid=$pid"))['impath'];
    $pprice=mysqli_fetch_assoc(mysqli_query($conn,"select * from product where pid=$pid"))['price'];
    
    echo "<div class='vieworder'>

    <div class='leftpart'>
        <img src='$pimpath' >
        <div class='name'><b>$pname</b></div>
        <div class='price'><b style='color:blue;'>₹$pprice</b></div>
    </div>
   
    <div class='rightpart'>
        <div class='details pad'><h3 style='color:red'>Details</h3></div><hr>
        <div class='customername pad'><b> name</b> : $Fullname</div>
        <div class='customerphonenumber pad'><b> phonenumber </b>:$phonenumber</div>
        <div class='customeremail pad'><b>email</b> : $Email</div>
        <div class='customeradress pad'><b>Adress</b> : $Adress</div>
        <div class='customerinstructions pad'><b>Instructions </b>: $instructions</div>
        <div class='delivered pad'><a href='orderdelivered.php?orderid=$orderid'><button class='btn'>order delivered</button></a></div>
    </div>
</div>";
    
}
?>
<html>
    <body>
       
    </body>
</html>