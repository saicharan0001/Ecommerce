<?php
 include '../shared/connection.php';

 $sql_cursor=mysqli_query($conn,"select * from product");

echo "<div style='border:2px solid black;background-color:aliceblue;display:flex;flex-wrap:wrap'>";
 while($rows=mysqli_fetch_assoc($sql_cursor)){
    $name=$rows['name'];
    $price=$rows['price'];
    $details=$rows['details'];
    $impath=$rows['impath'];

   
    echo "
    <div style='border:3px solid blue;margin:20px; width:20vw;text-align:center;'>

    <h3>$name</h3>
    <h3>'$'$price</h3>
    <h3>$details</h3>
    <img src='$impath' style='width:80%;'>

    </div>";
 }
echo "</div>"

?>
