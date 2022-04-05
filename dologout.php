<?php session_start(); 
if(isset($_SESSION['user'])){
  $msg = [];
  $msg[] = "User logout Successful";
  $_SESSION['success'] = $msg;
  header("location:login.php");
  unset($_SESSION['user']);
  exit;
}
else{
  header("location:login.php");
  exit;
}