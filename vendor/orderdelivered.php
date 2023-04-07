<?php 
include '../shared/connection.php';
session_start();
if($_SESSION['login_status']==false||isset($_SESSION['login_status'])==0){
echo "unathorized attempt";
die;
}
$userdata=$_SESSION['userdata'];
$userid=$userdata['userid'];
$orderid=$_GET['orderid'];
mysqli_query($conn,"delete from manage_order where orderid=$orderid");
header('location:vieworders.php');

?>