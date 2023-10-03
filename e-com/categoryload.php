<!DOCTYPE html>
<?php
include('homeheader.php');
require('connect.php');
$cid = $_GET['id'];
$q1 = "select * from products";
$sel = $conn->query($q1);
$q2 = "select * from category ";
$sel2 = $conn->query($q2);
$q3 = "select * from category where c_id='$cid'";
$sel3 = $conn->query($q3);
$sortdata = $sel3->fetch_assoc();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>


    <div class="container" style="position: relative;left:60px; ">
    

        <div class="row">

            <div class="col-3">
                <h3> <?php echo $sortdata['c_name']; ?></h3>
            </div>
        </div>
        <div class="row">
            <?php
            while ($pdata = $sel->fetch_assoc()) {
                if ($pdata['c_id'] == $cid) {


            ?>

                    <div class="col-3" style="padding: 10px;">
                        <a href="productdescription.php?id=<?php echo $pdata['p_id']; ?> " style="text-decoration:none;">
                            <div class="card" style="width: 20rem; ">
                                <img class="card-img-top" src="upload/<?php echo $pdata['image']; ?>" alt="Card image cap" style="height: 200px;width:280">
                                <div class="card-body">
                                    <?php

                                    $maxCharacters = 23;
                                    $truncatedPname = strlen($pdata['p_name']) > $maxCharacters ? substr($pdata['p_name'], 0, $maxCharacters) . '...' : $pdata['p_name'];
                                    ?>
                                    <h5 class="card-title"><?php echo $truncatedPname; ?></h5>
                                    <?php

                                    $maxCharacters = 55;
                                    $truncatedDescription = strlen($pdata['description']) > $maxCharacters ? substr($pdata['description'], 0, $maxCharacters) . '...' : $pdata['description'];
                                    ?>
                                    <p class="card-text" style="font-size: smaller;"><?php echo $truncatedDescription; ?></p>
                                    <a href="buyproduct.php?id=<?php echo $pdata['p_id']; ?>" class="btn btn-primary">BUY</a>&nbsp;₹<?php echo $pdata['price'] ?>
                                </div>
                            </div>
                        </a>

                    </div>
            <?php
                }
            } ?>
        </div>
    </div><br>
    <?php
    
    include('footer.php');
    ?>

</body>

</html>