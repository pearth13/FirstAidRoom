<?php 	

require_once 'db_connect.php';

$productId = $_POST['productId'];

$sql = "SELECT * FROM product WHERE product_id = $productId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);