<?php 

require_once 'db.php';

$id = $_POST['id'];
$row = $conn->prepare("DELETE FROM members WHERE members.Id = :id");
$row->execute([":id" => $id]);

header('location:show.php');
exit;