<?php

include "../shared/connection.php";
session_start();
$_SESSION['login_status']=false;
$uname=$_POST['uname'];
$upass=$_POST['upass1'];
$Fullname=$_POST['Fullname'];
$hash=md5($upass);

$sql_cursor=mysqli_query($conn,"select * from vendor_user where username='$uname' ");

$count=mysqli_num_rows($sql_cursor);
if($count>0){
    echo "This user is already registered try login";
    die;
}

$status=mysqli_query($conn,"insert into vendor_user(username,password,Fullname) values('$uname','$hash','$Fullname')");

if($status){
    echo "Registration succesfull";
    header('location:vendorlogin.html');
}
else{
    echo "error in sql";
    echo mysqli_error($conn);
}
?>