<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
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
    $q2="select * from subcategory";
    $subtab=$conn->query($q2);
   
    ?>
 
    <div class="ordermainn" class="container">
        <form name="frm" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3"></div>
                <div class="col"><h2>Add Product</h2></div>
            </div>
        <div class="row">
            <div  style="width: 220px;"><h5>&nbsp;&nbsp;&nbsp;Parent category</h4></div>
            <div class="col-5">
                <select class="form-control" name="cat">
                    <option value="select">select</option>
                  <?php  while($row=$data->fetch_assoc())
                  { ?>
                  
                    <option value="<?php echo $row['c_id']; ?>" class="form-control"><?php echo $row['c_name']; ?></option>

                    <?php } ?>

            </select>

            </div>
        </div><br>
        <div class="row">
            <div  style="width: 220px;"><h5>&nbsp;&nbsp;&nbsp;sub-category</h4></div>
            <div class="col-5">
                
                <select class="form-control" name="sub">
                    <option value="select">select</option>
                  <?php  while($sdata=$subtab->fetch_assoc())
                  { ?>
                  
                    <option value="<?php echo $sdata['s_id']; ?>" class="form-control"><?php echo $sdata['s_name']; ?></option>

                    <?php } ?>

            </select>

            </div>
        </div><br>
        <div class="row" style="padding-bottom: 5px;"> 
            <div style="width:220px;"><h5>&nbsp;&nbsp;&nbsp;Product</h5></div> 
        <div class="col-5"><input type="text"  class="form-control" name="p_name"></div>
        </div><br>
        <div class="row"> 
            <div style="width:220px;"><h5>&nbsp;&nbsp;&nbsp;Quantity</h5></div> 
        <div class="col-5"><input type="text"  class="form-control" name="quantity"></div>
        </div><br>
        <div class="row"> 
            <div style="width:220px;"><h5>&nbsp;&nbsp;&nbsp;Description</h5></div> 
        <div class="col-5"><textarea name="description" id="" cols="30" rows="8" class="form-control"></textarea> </div>
        </div><br>
        <div class="row"> 
            <div style="width:220px;"><h5>&nbsp;&nbsp;&nbsp;price</h5></div> 
        <div class="col-5"><input type="text"  class="form-control" name="price"></div>
        </div><br>
        <div class="row"> 
        <div style="width:220px;"><h5>&nbsp;&nbsp;&nbsp;Image</h5></div> 
        <div class="col-5"><input type="file"  class="form-control" name="img"></div>
        </div><br>
        
        <div class="row"><div class="col-3"></div> <div class="col"><input type="submit" class="btn btn-success" name="btn1" value="Add" style="width: 200px;"></div></div>

    
    </form>
    
        

    </div>
     <?php
 
 if(isset($_POST['btn1']))
    {
        $cat=$_POST['cat'];
        $sub=$_POST['sub'];
        $pname=$_POST['p_name'];
        $quantity=$_POST['quantity'];
        $price=$_POST['price'];
        $description=$_POST['description'];
        $filename=$_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'],'upload/'.$filename);

        
 $ins="INSERT INTO products(p_name,s_id,c_id,quantity,price,image,description) VALUES('$pname','$sub','$cat','$quantity','$price','$filename','$description')";

 $var=$conn->query($ins);
 header("location:product.php");
 


 
     }


 ?> 
</body>
</html>