<?php

$conn=new mysqli("localhost","root","","users");

if($conn->connect_error){
    echo "error in connecting with database";
}

?>