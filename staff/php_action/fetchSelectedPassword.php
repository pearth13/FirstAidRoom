<?php 	

require_once 'core.php';

$userId = $_POST['userId'];

$sql = "SELECT password FROM user WHERE user_id = $userId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows
$connect->close();

echo json_encode($row);