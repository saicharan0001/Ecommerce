<?php

include '../shared/connection.php';
$product_name=$_POST['name'];
$product_price=$_POST['price'];
$product_details=$_POST['details'];

session_start();
$userdata=$_SESSION['userdata'];
// print_r($userdata);

 echo "<br><br><br>";
echo "<br>";
// print_r($_FILES);
$file_name="../shared/images/".date("d-y-m-i-s").$userdata['userid'].$_FILES['pdtimg']['name'];
 echo "<br><br>";
move_uploaded_file($_FILES['pdtimg']['tmp_name'],$file_name);

$status=mysqli_query($conn,"insert into product(name,price,details,impath) values('$product_name',$product_price,'$product_details','$file_name');");
if(!$status){
    echo "error in sql";
    echo mysqli_error($conn);
    die;
}
echo "insertion succesful";
?>