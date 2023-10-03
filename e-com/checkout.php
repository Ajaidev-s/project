<?php
session_start();
require('connect.php');
$uid=$_SESSION['user']['u_id'];
$cart=$_GET['id'];
$q1="SELECT * from cart where cart_id='$cart'";
$sel1=$conn->query($q1);
$cartdata=$sel1->fetch_assoc();
$pid=$cartdata['p_id'];
$products=$_SESSION['products'];
$total=$_SESSION['total'];
$q4="select * from orders where cart_id='$cart'";
$sel2=$conn->query($q4);
$data=$sel2->fetch_assoc();
if (isset($_SESSION['user']));
    {   if($data==null)
        {
        $q2="UPDATE cart set status='1' where cart_id='$cart'";
        $upt=$conn->query($q2);
        $q3="INSERT into orders(cart_id,user_id,amount,products,p_id) values('$cart','$uid','$total','$products','$pid')";
        $ins=$conn->query($q3); 
        
        }


    }
?>