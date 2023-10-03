<?php
include('cdn.php');
include('connect.php');
include("homeheader.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }
  </style>
</head>

<body>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="image1/draw2.svg" class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form method="POST">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" name="username" class="form-control form-control-lg" />
              <label class="form-label" for="form1Example13">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="pass" class="form-control form-control-lg" />
              <label class="form-label" for="form1Example23">Password</label>
            </div>

            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                <label class="form-check-label" for="form1Example3"> Remember me </label>
              </div>
              <a href="#!">Forgot password?</a>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="btn">Sign in</button>

            <div class="divider d-flex align-items-center my-4">

            </div>



          </form>
        </div>
      </div>
    </div>
  </section>

  <?php
   include('footer.php'); 
  ?>
  <?php
  if (isset($_POST['btn'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $q1 = "SELECT * from user where email='$username' AND pass='$pass'";
    $sel = $conn->query($q1);
    $_SESSION['user'] = $sel->fetch_assoc();
    if ($_SESSION['user'] != null) {
      if ($_SESSION['user']['status'] == 0) {
        header("location:e-com.php");
      } else if ($_SESSION['user']['status'] == 1) {

        if(isset($_SESSION['redirecturl'])){
          $url = $_SESSION['redirecturl'];
          header("Location: $url");
        }else{

          header("location:home.php");
        }
      } else { 
        echo "incorrect username or password";
        
        
      }
    }
    else { 
      echo "incorrect username or password";
      
      
    }
  }



  ?>
</body>

</html>