<?php

require_once 'db.php';

$id = $_GET['id'];
$row = $conn->prepare("SELECT * FROM members WHERE Id = :id");
$row->execute([":id" => $id]);
$user = $row->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Delete User</title>
</head>
<body>
  <div class="container">
  <h2>Are you sure you want to delete <?=$user['email']?></h2>

<form action="show.php">

<button class="btn btn-secondary mt-4">No</button>
</form>


<form action="deleteyes.php" method="post">

<div>
  <input type="hidden" value="<?=$user['Id']?>" name="id" required>
</div>
<button class="btn btn-danger mt-4">yes</button>

</form>
  </div>
</body>
</html>



