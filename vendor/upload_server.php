<?php

include '../shared/connection.php';
$product_name=$_POST['name'];
$product_price=$_POST['price'];
$product_details=$_POST['details'];

session_start();
$userdata=$_SESSION['userdata'];
//$_FILES is an array of files details;
// files details is an array of name,tmp_name,create time .....
$file_name="../shared/images/".date("d-y-m-i-s").$userdata['userid'].$_FILES['pdtimg']['name'];
move_uploaded_file($_FILES['pdtimg']['tmp_name'],$file_name);
$_id=$userdata['userid'];
$status=mysqli_query($conn,"insert into product(name,price,details,impath,vendorid) values('$product_name',$product_price,'$product_details','$file_name',$_id)");
if(!$status){
    echo "error in sql";
    echo mysqli_error($conn);
    die;
}
echo "insertion succesful";
header('location:viewproducts.php');
?>