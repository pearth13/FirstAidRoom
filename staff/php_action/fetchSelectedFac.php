<?php 	

require_once 'db_connect.php';

$facId = $_POST['facId'];

$sql = "SELECT fac_id, fac_name, fac_active, fac_status FROM fac WHERE fac_id = $facId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);