<?php 	
require_once 'db_connect.php';

$sql = "SELECT * FROM product WHERE active = 1 AND status = 1 AND quantity > 0 OR product_id = 0";
$result = $connect->query($sql);

$data = $result->fetch_all();

$connect->close();

echo json_encode($data);