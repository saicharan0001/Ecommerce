<?php 
include '../shared/connection.php';
session_start();
if($_SESSION['login_status']==false||isset($_SESSION['login_status'])==0){
echo "unathorized attempt";
die;
}
$userdata=$_SESSION['userdata'];
$userid=$userdata['userid'];
$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];
$pid=$_GET['pid'];
mysqli_query($conn,"UPDATE product
SET name = '$name', price= '$price',details='$details'
WHERE pid = $pid;");
header('location:viewproducts.php');

?>