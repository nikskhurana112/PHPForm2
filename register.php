<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Register User</title>
  <style>
    *{
      padding: 5px;
    }
  </style>

</head>
<body>
  <div class="container">
  <h1 class="text-primary">Register</h1>
  <?php if(!empty($_SESSION['message'])){
    foreach($_SESSION['message'] as $message){?>
      <div class="alert alert-danger"><?= $message; ?></div>
   <?php }
  unset($_SESSION['message']);
 } ?>
<?php
if(isset($_SESSION['success'])){ ?>

      <div class="alert alert-success"><?=$_SESSION['success'][0];?></div>
    <?php } 
    unset($_SESSION['success']);
    ?>

  <form action="doregister.php" method="post">
  <div class="form-group">
    <div class="col-md-12">
      <input type="text" name="name" required class="form-control" placeholder="Enter your full name">
    </div>
    <div class="col-md-12">
      <input type="text" name="mobile" required class="form-control" placeholder="Enter your Mobile">
    </div>
    <div class="col-md-12">
      <input type="text" name="email" required class="form-control" placeholder="Enter your Email id">
    </div>
    <div class="col-md-12">
      <input type="password" name="password" required class="form-control" placeholder="Enter your password">
    </div>
    <div class="col-md-12">
      <input type="password" name="password_confirmation" required class="form-control" placeholder="Enter your password again">
    </div>
    <div class="col-md-2">
      <button class="btn btn-primary">Register</button>
    </div>
    <div>Already Registered? <a href="login.php">Login Instead</a></div>
  </div>
  </form>
  </div>
</body>
</html>