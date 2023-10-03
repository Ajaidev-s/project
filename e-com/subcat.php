<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="order.css">
</head>
<body>
    <?php
    include('navbar.php');
    require('sidebar.php');
    include('connect.php');
    $q1="select subcategory.*,category.c_id,category.c_name from subcategory join category on category.c_id=subcategory.p_id";
    $ins=$conn->query($q1);
   
    
    
    ?>
    <div class="ordermainn" >
        <div class="row">
            <div class="col-5" ><span class="mainhead">&nbsp;Sub-Category</span></div>
        </div>
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">
       <a href="addsub.php"> <button class="btn btn-warning" >+Add New Sub-Category</button></a>
        </div>
        </div>
       <div class="tb01">
        <table class="table table-dark mt-4" class="tb1">
          
          <tr>
              <th>&nbsp;&nbsp;Sub-Category</th>
              <th>Parent Category</th>
              <th>Action</th>
          </tr>
        <?php while($data=$ins->fetch_assoc())
               {
                ?>
               
          <tr>
             <td><?php echo $data['s_name'];?></td>
             <td><?php echo $data['c_name'];?></td>
             <td><a href="updatesubcat.php?id=<?php echo $data['s_id'];?>" style="text-decoration: none;"><button class="btn btn-success">Edit</button></a>
              &nbsp;<a href="deletesubcat.php?id=<?php echo $data['s_id'];?>" style="text-decoration: none;"> <button class="btn btn-danger">Delete</button></a></td></tr>
         
        <?php
               }
        ?>

      </table>
      </div>
       
    </div>
    
</body>
</html>