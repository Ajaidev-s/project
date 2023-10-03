<!DOCTYPE html>
<?php
include('homeheader.php');
require('connect.php');
$q1 = "select * from products";
$sel = $conn->query($q1);
$q2 = "select * from category";
$sel2 = $conn->query($q2);


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

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="image1/img1.png" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">

        </div>
      </div>

      <div class="item">
        <img src="image1/img2.png" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">

        </div>
      </div>

      <div class="item">
        <img src="image1/img5.png" alt="New York" style="width:100%;">
        <div class="carousel-caption">

        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="container" style="position: relative;left:45px; ">
    <br>

    <div class="row">

      <div class="col-3">
        <h3> New Products</h3>
      </div>
    </div>
    <div class="row">
      <?php
      while ($pdata = $sel->fetch_assoc()) {



      ?>

        <div class="col-3" style="padding: 20px;">

          <a href="productdescription.php?id=<?php echo $pdata['p_id'] ?>" style="text-decoration:none;color:black;">
            <div class="card" style="width: 20rem; ">
              <img class="card-img-top" src="upload/<?php echo $pdata['image']; ?>" style="height: 200px;width:290;">
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
                &nbsp;₹<?php echo $pdata['price'] ?></a>
                <a href="productdescription.php?id=<?php echo $pdata['p_id'] ?>" style="text-decoration:none;color:black;">&nbsp;

                <div class="row">
                  <div class="col-5">
                    <a href="buyproduct.php?id=<?php echo $pdata['p_id']; ?>" class="btn btn-primary">BUY</a>
                     <a href="productdescription.php?id=<?php echo $pdata['p_id'] ?>" style="text-decoration:none;color:black;">
                  </div>
                </div>
      </a>
              </div>


            </div>
          </a>

        </div>
      <?php  } ?>
    </div>
    <div class="row">

      <div class="col-3">
        <h3> All Category</h3>
      </div>
    </div>
    <div class="row">
      <?php while ($cdata = $sel2->fetch_assoc()) { ?>
        <div class="col-3">

          <a href="categoryload.php?id=<?php echo $cdata['c_id'] ?>" style="text-decoration: none;">
            <div class="card" style="width: 20rem; ">
              <img class="card-img-top" src="upload/<?php echo $cdata['image']; ?>" alt="Card image cap" style="height: 200px;width:280">
              <div class="card-body">
                <h3 class="card-title" style="text-align: center;"><?php echo $cdata["c_name"]; ?></h3>


              </div>
            </div>
          </a>
        </div>
      <?php } ?>


    </div>
  </div>
  <br>
</body>
<?php

include('footer.php');

?>

</html>