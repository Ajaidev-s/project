<?php
require('connect.php');
$uid=$_GET['id'];
$q1="DELETE from products where p_id=$uid";
$conn->query($q1);
header('location:product.php');

?>