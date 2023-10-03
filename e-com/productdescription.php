<?php
require('homeheader.php');
require('connect.php');
$pid=$_GET['id'];
$q1="SELECT * from products where p_id='$pid'";
$sel1=$conn->query($q1);
$pdata=$sel1->fetch_assoc();
$url=$_SERVER['REQUEST_URI'];



?>
<?php if(isset($_SESSION['user'])){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pdata['p_name'];?></title>
</head>
<body>
    <div class="container" style="position: relative;left:60px;">
<div class="card mb-4" style="max-width: 740px;">
  <div class="row g-0">
    <div class="col-4">
      <img src="upload/<?php echo $pdata['image'];?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $pdata['p_name']?></h5>
        <p class="card-text"><?php echo $pdata['description'];?></p>
        <input type="number" value="1" min="1" max="<?php if($pdata['quantity']>=5){echo 5;}else {echo $pdata['quantity'];} ?>" step="1" class="form-control" style="width: 75px;">
        <a href="addtocart.php?id=<?php echo $pdata['p_id']; ?>" class="btn btn-primary">Add to Cart</a>&nbsp;
        <a href="buyproduct.php?id=<?php echo $pdata['p_id']; ?>" class="btn btn-primary">BUY</a>&nbsp;₹<?php echo ($pdata['price']) ?>
        <p class="card-text"><small class="text-muted"><?php echo $pdata['quantity'];?>&nbsp;Items left</small></p>
        
      </div>
    </div>
  </div>
</div>
</div><br>
<?php
    include('footer.php');
    ?>
</body>
</html>
<?php }else{

$_SESSION['redirecturl']=$url;
 
 header("Location: login.php");
}
  ?>