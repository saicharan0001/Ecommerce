<?php
$date_str = '2023-04-08 01:18:42'; 
$date = new DateTime($date_str); 
$date->modify('+4 day'); 
echo $date->format('Y/m/d') . '<br>'; 
?>