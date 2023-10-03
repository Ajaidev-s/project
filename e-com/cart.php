<head>
  <script src="./src/bootstrap-input-spinner.js"></script>
  <script>
    $("input[type='number']").inputSpinner()
  </script>
</head>
<?php
$product = "";
$total = 0;

include('homeheader.php');
include('connect.php');
if (isset($_SESSION['user'])) {

  $user = $_SESSION['user']['u_id'];
  $q1 = "select * from cart where u_id='$user'";
  $sel1 = $conn->query($q1);
  $cartdata = $sel1->fetch_assoc();
  if ($cartdata['status'] == 0) {
    $pid = $cartdata['p_id'];
    $card_products = explode('-', $pid);
    $i = 0;
    $productlimi = count($card_products);
    while ($i < $productlimi) {
      $pid = explode('.', $card_products[$i]);
      $q2 = "SELECT * from products where p_id='$pid[0]'";
      $sel2 = $conn->query($q2);
      $pdata = $sel2->fetch_assoc();

      $i++;


?>

      <body>
        <div class="container" style="position: relative;left:60px;">
          <div class="card mb-4" style="max-width: 740px;">
            <div class="row g-0">
              <div class="col-4">
                <img src="upload/<?php echo $pdata['image']; ?>" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $pdata['p_name'] ?></h5>
                  <p class="card-text"><?php echo $pdata['description']; ?></p>
                  <p class="card-text"> <input type="number" value="<?php echo $pid['1']; ?>" min="1" max="10" step="1" class="form-control" style="width:50px;"></p>
                  <a href="buyproduct.php?id=<?php echo $pdata['p_id']; ?>" class="btn btn-primary">BUY</a>&nbsp;₹<?php echo ($pdata['price'] * $pid['1']); ?><br>&nbsp;
                  <p class="card-text"><small class="text-muted"><?php echo $pdata['quantity']; ?>&nbsp;Items left</small></p>
                  <?php $total = $total + $pdata['price'] * $pid['1'];
                  $product = $product . '|' . $pdata['p_name'] . '*' . $pid['1'];
                  ?>

                </div>
              </div>
            </div>
          </div>
        </div><br>

      <?php } ?>
      <div class="card text-center">
        <div class="card-header">
          All Products
        </div>
        <div class="card-body">
          <!-- <h5 class="card-title">Special title treatment</h5> -->
          <?php
          //need to used in chechout page
          $products = substr($product, 1);
          $_SESSION['total'] = $total;
          $_SESSION['products'] = $products;
          ?>
          <p class="card-text"><?php echo $products; ?> </p>
          <a href="checkout.php/?id=<?php echo $cartdata['cart_id'] ?>" class="btn btn-primary">BUY</a>&nbsp;₹<?php echo $total; ?>
        </div>
        <div class="card-footer text-muted">

        </div>
      </div>

      </body>
  <?php
                     }
       else{ ?>
        <div class="card text-center">
  <div class="card-header">
    Oops!
  </div>
  <div class="card-body">
    <h5 class="card-title">No items in cart</h5>
    <p class="card-text"></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
<?php
       } 


     }
include('footer.php');
  ?>