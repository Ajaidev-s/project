<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Sub-Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="order.css">
</head>

<body>
    <?php
    include('navbar.php');
    require('sidebar.php');
    require('connect.php');
    $q1="select  * from category";
    $data=$conn->query($q1);
    $uid=$_GET['id'];
    $q2="select * from subcategory where s_id=$uid";
    $sel=$conn->query($q2);
    $sdata=$sel->fetch_assoc();
    
   
    ?>
 
    <div class="ordermainn" class="container">
        <form name="frm" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3"></div>
                <div class="col"><h2>Update Sub-Category</h2></div>
            </div>
        <div class="row">
            <div  style="width: 220px;"><h5>&nbsp;&nbsp;&nbsp;Parent category</h4></div>
            <div class="col-5">
                <select class="form-control" name="parent">
                    <option value="select">select</option>
                  <?php  while($row=$data->fetch_assoc())
                  { ?>
                  
                    <option value="<?php echo $row['c_id']; ?>" class="form-control" <?php if($sdata['p_id'] == $row['c_id']): ?> selected="selected"<?php endif; ?>><?php echo $row['c_name']; ?>
                    <?php } ?>

            </select>

            </div>
        </div><br>
        <div class="row"> 
            <div style="width:220px;"><h5>&nbsp;&nbsp;&nbsp;sub-category</h5></div> 
        <div class="col-5"><input type="text" value="<?php echo $sdata['s_name']; ?>" class="form-control" name="s_name"></div>
        </div><br>
        
        <div class="row"><div class="col-3"></div> <div class="col"><input type="submit" class="btn btn-success" name="btn1" value="Update" style="width: 200px;"></div></div>

    
    </form>
    
        

    </div>
    <!-- <?php
 
 if(isset($_POST['btn1']))
    {
        
        $sname=$_POST['s_name'];
        $id=$_POST['parent'];
        
 $ins="update subcategory set s_name='$sname',p_id='$id' where s_id='$uid'";
 $var=$conn->query($ins);
 
 
 header("location:subcat.php");
 


 
     }


 ?> -->
</body>
</html>