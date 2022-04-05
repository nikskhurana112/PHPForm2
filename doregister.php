<?php session_start();

require_once 'db.php';

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['password'];

//validate
function testInput($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$err = [];

if(empty($name)){
  $err[] = 'Name must not be empty';
}else{
  if(!preg_match("/^[a-zA-Z-' ]*$/", testInput($name))){
    $err[] = "Only letter and white spaces allowed";
  }
}

if(empty($mobile)){
  $err[] = 'Mobile must not be empty';
}else{
  if(strlen($mobile) != 10){
    $err[] = "Please enter valid mobile number";
  }
  else if(!preg_match('/^[0-9]{10}+$/', testInput($mobile))){
    $err[] = "Only numbers allowed for mobile numbers";
  }
}

if(empty($email)){
  $err[] = "Email must not be empty";
}else{
  if(!filter_var(testInput($email), FILTER_VALIDATE_EMAIL)){
    $err[] = "Please enter a valid email address";
  }
}

if(empty($password)){
  $err[] = "Password must not be empty";
}else{
  if(strlen($password) > 15 && strlen($password) < 5){
    $err[] = "Password must be between 15 and 5 characters";
  }
}

if($password != $_POST['password_confirmation']){
  $err[] = "Password don't match";
}

//check if user exists already
$row = $conn->prepare("SELECT * from members WHERE email = :email");
$row->execute([":email" => $email]);
$user = $row->fetch();

if($user){
  $err[] = "User already exists";
}


if(!empty($err)){
  
  $_SESSION["message"] = $err;
  header("location: register.php");
  exit;
}

// User register

$password = password_hash($password, PASSWORD_BCRYPT);

$save = $conn->prepare("INSERT INTO members (name, mobile, email, password) VALUES (:name, :mobile, :email, :password)");
$save->execute([":name"=>$name, ":mobile"=>$mobile, ":email"=>$email, ":password"=>$password]);
$msg = [];

if(!$save == null){
  $msg[] = "User registration successful";
  $_SESSION['success'] = $msg;
  header("location: register.php");
  exit;
}
else{
  $msg[] = "Something went wrong. Please try again";
  $_SESSION['message'] = $msg;
  header("location: register.php");
  exit;
}