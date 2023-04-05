<?php
session_start();
if($_SESSION['login_status']==false||isset($_SESSION['login_status'])==0){
echo "unathorized attempt";
die;
}
$userdata=$_SESSION['userdata'];
// echo "Hi ";echo $userdata['username'] ;echo" now you can upload your products";
include 'navigation.html';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">

    <form action="upload_server.php" class="bg-primary p-3" enctype="multipart/form-data" method="post">
        <h3 class="text-center text-white">Upload Product</h3>

        <input class="mt-2 form-control " type="text" name="name" placeholder="Enter Product Name">
        <input class="mt-2 form-control " type="text" name="price" placeholder="Enter Product Price">
        <label for="cars" style="color:white">select category:</label>
  <select id="cars" name="category" class="mt-2 form-control " value="">
    <option value="electronics">electronics</option>
    <option value="food">food</option>
    <option value="fashion">fashion</option>
    <option value="gym">gym</option>
  </select>

        <textarea class="mt-2 form-control text-danger" name="details" id="" cols="30" rows="5" placeholder="Product Description"></textarea>
        

        <input class="mt-2 form-control" type="file" name="pdtimg">
        <div class="text-center">
            <button class="btn btn-danger mt-3">Upload</button>
        </div>
        <div class="text-center">
        <a href="view.php" style="color:white;text-decoration:none;text-center;">view products</a>
        </div>
    </form>
    <br>
    
    <!-- <form method="post">

<input type="submit" class="bg-danger btn" value="logout" name="logout">
</form> -->



<?php
// if(isset($_POST['logout'])){
//     echo "<div style='font-size:50px;'>logout sucess</div>";
//     $_SESSION['login_status']=false;
//     header('location:login.html');
// }

?>

</div>

</body>
</html>