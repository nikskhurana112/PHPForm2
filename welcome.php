<?php session_start(); 

if(isset($_SESSION['user']) == null){
  
  header("location:login.php");
  exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Profile</title>
</head>
<body>
<div class="container">
  <h1>Welcome <?=$_SESSION['username']?></h1>
  <?php if($_SESSION['user']['is_admin'] == 1){?>
    <form action="show.php" method="post">
    <button class="btn btn-success mt-3">Show List</button>
    </form>
 <?php } ?>
  <form action="dologout.php" method="post">
  <button class="btn btn-secondary mt-3">Log out</button>
  </form>
  
</div>
</body>
</html>