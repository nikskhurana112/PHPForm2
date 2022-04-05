<?php session_start(); 
require_once 'db.php';

$result = $conn->query("SELECT * FROM members");
$users = $result->fetchAll();

//  var_dump($users[0]["id"]);
//  die();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Show List</title>
</head>
<body>


    <div class="container">
    <table class="table">
    <thead>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">IsAdmin</th>
      
    </thead>
        
    <tbody>
    <?php foreach($users as $user){ ?>
      <tr>
        <th scope="row"><?=$user["Id"]?></th>
        <td><?=$user["name"]?></td>
        <td><?=$user["mobile"]?></td>
        <td><?=$user["email"]?></td>
        <td><?=$user['is_admin']?></td>
        <td><a href="edit.php?id=<?=$user["Id"]?>"class="btn btn-secondary">Edit</a></td>
        <td><a href="delete.php?id=<?=$user['Id']?>"class="btn btn-danger">Delete</a></td>
      </tr>
      <?php } ?>
    </tbody>
    </table>
    </div>
   
</body>
</html>