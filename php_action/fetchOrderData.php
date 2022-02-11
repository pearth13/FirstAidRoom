<?php 	

require_once 'db_connect.php';

$orderId = $_POST['orderId'];

$valid = array('order' => array(), 'order_item' => array());

$sql = "SELECT orders.order_id, orders.order_date, orders.client_name, orders.sick, orders.discount, orders.order_info, orders.payment_status FROM orders 	
	WHERE orders.order_id = {$orderId}";

$result = $connect->query($sql);
$data = $result->fetch_row();
$valid['order'] = $data;


$connect->close();

echo json_encode($valid);