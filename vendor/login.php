<?php
session_start();
include '../shared/connection.php';

$uname=$_POST['uname'];
$upass=$_POST['upass'];

$hash=md5($upass);


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
//This contains username,userid,password(hash form),created_date
$_SESSION['login_status']=True;
header('location:vieworders.php');

?>