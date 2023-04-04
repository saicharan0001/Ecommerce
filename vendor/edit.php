<?php
include '../shared/connection.php';
session_start();
if($_SESSION['login_status']==false||isset($_SESSION['login_status'])==0){
echo "unathorized attempt";
die;
}

$pid=$_GET['pid'];
$sql_cursor=mysqli_query($conn,"select *from product where pid=$pid;");
$product=mysqli_fetch_assoc($sql_cursor);
$p_name=$product['name'];
$p_price=$product['price'];
$p_details=$product['details'];


include 'navigation.html';

?>
<html lang="en">
<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">

    <form action="upload_server.php" class="bg-primary p-3" enctype="multipart/form-data" method="post">
        <h3 class="text-center text-white">Upload Product</h3>

        <input class="mt-2 form-control text-danger" type="text" name="name" value=<?php echo "$p_name";?>>
        <input class="mt-2 form-control text-danger" type="text" name="price" value=<?php echo "$p_price";?> >

        <textarea class="mt-2 form-control text-danger" name="details" id="" cols="30" rows="5"><?php echo "$p_details";?>
        </textarea>

        <input class="mt-2 form-control" type="file" name="pdtimg">
        <div class="text-center">
            <button class="btn btn-danger mt-3">Upload</button>
        </div>
    </form>
    <br>

</div>

</body>
</html>