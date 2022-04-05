<?php session_start(); 

require_once 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

function testInput($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$err = [];
if(empty($email)){
  $err[] = "Mobile number / Email address required";
}else if(is_numeric($email)){
  if(!(preg_match('/^[0-9]{10}+$/', testInput($mobile)) || strlen($mobile) != 10)){
    $err[] = "Enter valid mobile number";
  }
}else{
  if(!filter_var(testInput($email), FILTER_VALIDATE_EMAIL)){
    $err[] = "Valid email address required";
  }
}

if(empty($password)){
  $err[] = "Password required";
}else{
  if(strlen($password) > 15 || strlen($password) < 5){
    $err[] = "Password should be between 15 and 5 characters";
  }
}

if(!empty($err)){
 
  $_SESSION['message'] = $err;
  header("location:login.php"); 
  exit;
}
if(is_numeric($email)){
  
  $user = $conn->prepare("SELECT * FROM members WHERE mobile = :mobile");
  $user->execute([":mobile"=>$email]);
  $user = $user->fetch();
}
else{
  $user = $conn->prepare("SELECT * FROM members WHERE email = :email");
  $user->execute([":email"=>$email]);
  $user = $user->fetch();

}
$msg = [];
if($user && password_verify($password, $user['password'])){

  $_SESSION['user'] = $user;
  $_SESSION['username'] = $user['name'];
  
  header('location:welcome.php');
  exit;
}

else{
  $msg = "Please enter valid email or password";
  $_SESSION['message'] = $msg;
  header('location:login.php');
  exit;
}



