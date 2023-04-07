<?php 

session_start();
if($_SESSION['login_status_client']==false||isset($_SESSION['login_status_client'])==0){
echo "unathorized attempt";
die;
}
include '../shared/connection.php';
$userdata=$_SESSION['clientdata'];
$userid=$userdata['userid'];
$orderid=$_GET['orderid'];
// echo $userid,"<br>";
// echo $pid,"<br>";
$status=mysqli_query($conn,"delete from manage_order where userid =$userid and orderid=$orderid");
if(!$status){
    echo "error in database";
    echo mysqli_error($conn);
    die;
}
header('location:vieworder.php');

?>