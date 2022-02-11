<?php 	

require_once 'db_connect.php';

$valid['success'] = array('success' => false, 'messages' => array(), 'order_id' => '');

if($_POST) {	

  $orderDate 			= $_POST['orderDate'];	
  $client_name 			= $_POST['clientName'];
  $sick 				= $_POST['sick'];
  $order_info     		= $_POST['order_info'];
  $paymentStatus 		= $_POST['paymentStatus'];

  $user = 0 ;
	$sqli = "SELECT * FROM user ";
	$resultl = $connect->query($sqli);
	while($row = $resultl->fetch_array()) {
		$namel = $row['user_namel'];
		$useridnaml = $row['user_id'];
		if ($client_name == $namel ){
				$user = $useridnaml;
		};
	}
	if ( $user == '0') {
		echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ');</script>";
		echo "<script>window.location.href='../tables.php'</script>";
	}else{
  
	$sql = "INSERT INTO orders (`order_date`, `client_name`, `sick`, `order_info`, `payment_status`, `order_status`) 
	VALUES ('$orderDate', '$user', '$sick', '$order_info', '$paymentStatus', 1)";
	
	$order_id;
	$orderStatus = false;
	if($connect->query($sql) === true) {
		$order_id = $connect->insert_id;
		$valid['order_id'] = $order_id;	
		$orderStatus = true;
	}

	// echo $_POST['productName'];
	$orderItemStatus = false;

	for($x = 0; $x < count($_POST['productName']); $x++) {			
		$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_id = ".$_POST['productName'][$x]."";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);
		
		while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
			$updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['quantity'][$x];
				$updateProductTable = "UPDATE product SET quantity = '".$updateQuantity[$x]."' WHERE product_id = ".$_POST['productName'][$x]."";
				$connect->query($updateProductTable);

				// add into order_item
				$orderItemSql = "INSERT INTO order_item (order_id, product_id, quantity, total, order_item_status) 
				VALUES ('$order_id', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['totalValue'][$x]."', 1)";

				$connect->query($orderItemSql);		

				if($x == count($_POST['productName'])) {
					$orderItemStatus = true;
				}		
		} // while	
	} // /for quantity

	$valid['success'] = true;
	$valid['messages'] = "เพิ่มข้อมูลสำเร็จ";		
	

		

$connect->close();
echo "<script>alert('เพิ่มข้อมูลการใช้บริการสำเร็จ');</script>";
echo "<script>window.location.href='../tables.php'</script>";
} // /if $_POST
}