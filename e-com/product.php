<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="order.css">
</head>
<body>
    <?php
    include('navbar.php');
    require('sidebar.php');
    require('connect.php');
    $q1="select products.*,category.c_name,subcategory.s_name from products join category on category.c_id=products.c_id join subcategory on subcategory.s_id=products.s_id";
    $ins=$conn->query($q1);

    ?>
    <div class="ordermainn" class="container">
    <div class="row">
            <div class="col-5" ><span class="mainhead">&nbsp;Products</span></div>
        </div>
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">
       <a href="addproduct.php"> <button class="btn btn-warning" >+Add New Product</button></a>
        </div>
        </div>
        <table class="table table-dark table-responsive mt-4" class="tb1">
          
          <tr>
              <th>&nbsp;&nbsp;Product</th>
              <th>Sub-Category</th>
              <th>Category </th>
              <th>product quantity</th>
              <th>Price</th>
              <th>Decription</th>
              <th>image</th>
              <th>Action</th>
          </tr>
          <?php while($pdata=$ins->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $pdata['p_name'];?></td>
            <td><?php echo $pdata['s_name'];?></td>
            <td><?php echo $pdata['c_name'];?></td>
            <td><?php echo $pdata['quantity'];?></td>
            <td><?php echo $pdata['price'];?></td>
            <td><?php echo $pdata['description'];?></td>
            <td><img src="upload/<?php echo $pdata['image']; ?>" alt="" width="60px" height="90px"></td>
             <td><a href="updateproduct.php?id=<?php echo $pdata['p_id'];?>" style="text-decoration: none;"><button class="btn btn-success">Edit</button></a>
              &nbsp;<a href="deleteproduct.php?id=<?php echo $pdata['p_id'];?>" style="text-decoration: none;"> <button class="btn btn-danger">Delete</button></a>
            </td>
          </tr>
          <?php  } ?>
        
    </div>
</body>
</html>