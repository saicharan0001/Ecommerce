<?php

include "../shared/connection.php";
session_start();
$_SESSION['login_status_client']=false;
$uname=$_POST['uname'];
$upass=$_POST['upass1'];

$hash=md5($upass);

$sql_cursor=mysqli_query($conn,"select * from client_user where username='$uname' ");

$count=mysqli_num_rows($sql_cursor);
if($count>0){
    echo "This user is already registered try login";
    die;
}

$status=mysqli_query($conn,"insert into client_user(username,password) values('$uname','$hash')");

if($status){
    echo "Registration succesfull";
    header('location:clientlogin.html');
}
else{
    echo "error in sql";
    echo mysqli_error($conn);
}
?>