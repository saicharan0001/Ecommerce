
<?php 
session_start();
if($_SESSION['login_status_client']==false||isset($_SESSION['login_status_client'])==0){
echo "unathorized attempt";
die;
}
include '../shared/connection.php';
$userdata=$_SESSION['clientdata'];

$userid=$userdata['userid'];
$pid=$_GET['pid'];
$sql_result=mysqli_fetch_assoc(mysqli_query($conn,"select *from product where pid=$pid"));
$vendorid=$sql_result['vendorid'];
$Fullname=$_POST['Fullname'];
$Email=$_POST['Email'];
$phonenumber=$_POST['phonenumber'];
$Adress=$_POST['Adress'];
$instructions=$_POST['instructions'];
$status=mysqli_query($conn,"insert into manage_order(pid,userid,Fullname,Email,phonenumber,Adress,vendorid,instructions) values($pid,$userid,'$Fullname','$Email','$phonenumber','$Adress',$vendorid,'$instructions')");
if(!$status){
echo "database error";
die;
}
echo "succesfull<br>";
mysqli_query($conn,"delete from manage_cart where pid=$pid");
header('location:vieworder.php');
?>