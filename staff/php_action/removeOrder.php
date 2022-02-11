<?php 	

require_once 'db_connect.php';

$orderId = $_GET['orderId'];

if($orderId) { 

 $sql = "UPDATE orders SET order_status = 2 WHERE order_id = {$orderId}";

 $orderItem = "UPDATE order_item SET order_item_status = 2 WHERE  order_id = {$orderId}";

 if($connect->query($sql) === TRUE) { echo "<script>alert('ลบสำเร็จ');</script>";
	echo "<script>window.location.href='../tables.php'</script>";
} else{
	echo "<script>alert('ลบไม่สำเร็จ');</script>";
	echo "<script>window.location.href='../tables.php'</script>";
}	
$connect->close();
}