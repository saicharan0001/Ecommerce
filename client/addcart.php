<?php 

$pid=$_GET['pid'];
include '../shared/connection.php';

session_start();
if($_SESSION['login_status_client']==false||isset($_SESSION['login_status_client'])==0){
echo "unathorized attempt";
die;
}
include '../shared/connection.php';
$userdata=$_SESSION['clientdata'];
$userid=$userdata['userid'];
// echo $pid;
// echo "pid";
// echo $userdata['userid'];
$status=mysqli_query($conn,"insert into manage_cart(pid,userid) values($pid,$userid)");
if(!$status){
echo "database error";
die;
}
header('location:viewcart.php');
?>