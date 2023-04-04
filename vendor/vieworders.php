<?php
include '../shared/connection.php';
session_start();
if($_SESSION['login_status']==false||isset($_SESSION['login_status'])==0){
echo "unathorized attempt";
die;
}
$userdata=$_SESSION['userdata'];

include 'navigation.html';


?>
<html>
    <body>
        no orders yet for your products
    </body>
</html>