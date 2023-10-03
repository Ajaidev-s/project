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
    // include('navbar.php');
    // require('sidebar.php');
    require('connect.php');
    $uid=$_GET['id'];
    $q1="select  * from category";
    $data=$conn->query($q1);
    $q2="select * from subcategory";
    $subtab=$conn->query($q2);
    $q3="select * from products where p_id=$uid";
    $data1=$conn->query($q3);
    $pdata=$data1->fetch_assoc();
   
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
                  
                    <option value="<?php echo $row['c_id']; ?>" class="form-control" <?php if($row['c_id']==$pdata['c_id']): ?> selected="selected" <?php  endif; ?> ><?php echo $row['c_name']; ?></option>

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
                  
                    <option value="<?php echo $sdata['s_id']; ?>" class="form-control" <?php if($sdata['s_id']==$pdata['s_id']): ?>selected="selected" <?php endif; ?> >
                    <?php echo $sdata['s_name']; ?></option>

                    <?php } ?>

            </select>

            </div>
        </div><br>
        <div class="row" style="padding-bottom: 5px;"> 
            <div style="width:220px;"><h5>&nbsp;&nbsp;&nbsp;Product</h5></div> 
        <div class="col-5"><input type="text"  class="form-control" name="p_name" value="<?php echo$pdata['p_name'] ?>"></div>
        </div><br>
        <div class="row"> 
            <div style="width:220px;"><h5>&nbsp;&nbsp;&nbsp;Quantity</h5></div> 
        <div class="col-5"><input type="text"  class="form-control" name="quantity" value="<?php echo$pdata['quantity'] ?>"></div>
        </div><br>
        <div class="row"> 
            <div style="width:220px;"><h5>&nbsp;&nbsp;&nbsp;Description</h5></div> 
        <div class="col-5"><textarea name="description" id="" cols="30" rows="8" class="form-control"><?php echo$pdata['description'] ?></textarea> </div>
        </div><br>
        <div class="row"> 
            <div style="width:220px;"><h5>&nbsp;&nbsp;&nbsp;price</h5></div> 
        <div class="col-5"><input type="text"  class="form-control" name="price" value="<?php echo$pdata['price'] ?>"></div>
        </div><br>
        <div class="row"> 
        <div style="width:220px;"><h5>&nbsp;&nbsp;&nbsp;Image</h5></div> 
        <div class="col-5"><input type="file"  class="form-control" name="img"></div>
        </div><br>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-2"><img src="upload/<?php echo $pdata['image']; ?>" alt="" width="40px" height="60px">
        </div>
        </div><br>
        
        <div class="row"><div class="col-3"></div> <div class="col"><input type="submit" class="btn btn-success" name="btn1" value="Update" style="width: 200px;"></div></div>

    
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
        if($filename==null)
        {
            $filename=$pdata['image'];
        }
        

        
 $ins="UPDATE products set p_name='$pname',s_id='$sub',c_id='$cat',quantity='$quantity',price='$price',image='$filename',description='$description' where p_id='$uid'";
 $var=$conn->query($ins);
//  var_dump($ins);
 header("location:product.php");
 


 
     }


 ?> 
</body>
</html>