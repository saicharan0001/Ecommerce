<?php 
session_start();
if($_SESSION['login_status_client']==false||isset($_SESSION['login_status'])==0){
echo "unathorized attempt";
die;
}
include '../shared/connection.php';
$userdata=$_SESSION['clientdata'];

$pid=$_GET['pid'];
$userid=$userdata['userid'];
$status=mysqli_query($conn,"insert into manage_order(pid,userid) values($pid,$userid)");
if(!$status){
echo "database error";
die;
}
echo "succesfull<br>";
mysqli_query($conn,"delete from manage_cart where pid=$pid");
header('location:vieworder.php');
?>