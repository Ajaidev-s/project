<?php
session_start();
require('connect.php');
$pid=$_GET['id'];
$user=$_SESSION['user']['u_id'];
$q1="SELECT * from cart where u_id='$user'";
$sel1=$conn->query($q1);
$cartdata=$sel1->fetch_assoc();

if($cartdata==null)
   {
    $q2="INSERT into cart (p_id,u_id) values ('$pid','$user') ";
    $ins=$conn->query($q2);
    header("Location:cart.php");
   }
else{
    $products=$cartdata['p_id'].'-'.$pid;
    $q3="UPDATE  cart set p_id='$products' where u_id='$user'";
    $ins=$conn->query($q3);
    header("Location:cart.php");


}   

?>