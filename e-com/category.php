<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sub-category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="order.css">
</head>
<body>
    <?php
    include('navbar.php');
    require('sidebar.php');
    include('connect.php');
    $q1="select * from category";
    $ins=$conn->query($q1);
    
    ?>
    <div class="ordermainn" >
        <div class="row">
            <div class="col-5" ><span class="mainhead">&nbsp;All Category</span></div>
        </div>
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">
       <a href="addcat.php"> <button class="btn btn-warning" >+Add New Category</button></a>
        </div>
        </div>
       <div class="tb01">
        <table class="table table-dark mt-4" class="tb1">
          
          <tr>
              <th>&nbsp;&nbsp;Category</th>
              <th>Description</th>
              <th>Image</th>
              <th>Action</th>
          </tr>
          <?php while($row=$ins->fetch_assoc())
         { ?>
          <tr>
              <td>&nbsp;<?php echo $row['c_name']?></td>
              <td><?php echo $row['description']?></td>
              <td><img src="upload/<?php echo $row['image']; ?>" alt="" width="100px"></td>
              <td><a href="updatecat.php?id=<?php echo $row['c_id'];?>" style="text-decoration: none;"> <button class="btn btn-success">Edit</button></a>
              &nbsp;<a href="delete.php?id=<?php echo $row['c_id'];?>" style="text-decoration: none;"> <button class="btn btn-danger">Delete</button></a></td>
          </tr>
         
          <?php } ?>

      </table>
      </div>
       
    </div>
    
</body>
</html>