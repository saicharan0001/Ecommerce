<?php

// echo $_GET['pid'];
$pid=$_GET['pid'];
include '../shared/connection.php';
mysqli_query($conn,"delete from product where pid=$pid;");
header('location:viewproducts.php');

?>