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
    $uid=$_GET['id'];
    require('connect.php');
    $q1="select * from category where c_id=$uid";
    $ins=$conn->query($q1);
    $row=$ins->fetch_assoc();
    
   
    ?>
 
    <div class="ordermainn" class="container">
        <form name="frm" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3"></div>
                <div class="col"><h2>Update Category</h2></div>
            </div>
        <div class="row">
            <div class="col-2"><h5>&nbsp;&nbsp;&nbsp;category name</h4></div>
            <div class="col-6"><input type="text" class="form-control" name="cname" value="<?php echo $row['c_name']; ?>"></div>
        </div><br>
        <div class="row"> 
            <div class="col-2"><h5>&nbsp;&nbsp;&nbsp;description</h5></div> 
        <div class="col-6"><textarea  class="form-control" name="description" ><?php echo $row['description']; ?></textarea></div>
        </div><br>
        <div class="row"> 
            <div class="col-2"><h5>&nbsp;&nbsp;&nbsp;Image</h5></div> 
        <div class="col-6"><input type="file" name="image"></div>
        </div>
        <div class="row"><div class="col-3"></div> <div class="col"><input type="submit" class="btn btn-success" name="btn1" value="UPDATE" style="width: 200px;"></div></div>

    
    </form>
        

    </div>
    <?php
 
 if(isset($_POST['btn1']))
    {
        $name=$_POST['cname'];
        $filename=$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$filename);
        $description=$_POST['description'];
        if($filename==null)
        {
            $filename=$row['image'];
        }
 $ins="UPDATE  category set c_name='$name',description='$description',image='$filename' where c_id=$uid";
 $var=$conn->query($ins);
 header("location:category.php");


 
     }


 ?>
</body>
</html>