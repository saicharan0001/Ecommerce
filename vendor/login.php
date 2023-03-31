<?php
session_start();
// $_SESSION['login_status']=false;
include '../shared/connection.php';

$uname=$_POST['uname'];
$upass=$_POST['upass'];

$hash=md5($upass);

$conn=new mysqli("localhost","root","","users");

$sql_cursor=mysqli_query($conn,"select * from vendor_user where username='$uname' and password='$hash' ");

$count=mysqli_num_rows($sql_cursor);


if($count==0){
    echo "Login failed";
    die;
}
else{
    echo "Login success";
}

$row=mysqli_fetch_assoc($sql_cursor);
$_SESSION['userdata']=$row;
$_SESSION['login_status']=True;
header('location:upload.php');

?>