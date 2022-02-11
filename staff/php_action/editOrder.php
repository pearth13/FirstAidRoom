<?php 	

require_once 'db_connect.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$orderId = $_GET['orderId'];

	$orderDate 			= $_POST['order_date'];
  $clientName 			= $_POST['client_name'];
  $sick 				= $_POST['sick'];
  $order_info 			= $_POST['order_info'];
  $paymentStatus 		= $_POST['paymentStatus'];

	if($paymentStatus == 0){
		echo "<script>alert('กรุณาระบุสถานะการรักษา');</script>";
		echo '<form action = "../update_Order.php?orderId='.$orderId.'" method = "post">
		</form>
		<script>
		document.getElementsByTagName("form")[0].submit();
		</script>'
		;
	}else{
		
		
	$sql = "UPDATE orders SET order_date = '$orderDate',
	 sick = '$sick', order_info = '$order_info', payment_status = '$paymentStatus', 
	  order_status = 1 WHERE order_id = {$orderId}";	
	$connect->query($sql);
	
	$readyToUpdateOrderItem = false;
	// add the quantity from the order item to product table
	for($x = 0; $x < count($_POST['productName']); $x++) {		
		//  product table
		$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_id = ".$_POST['productName'][$x]."";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);			
			
		while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
			// order item table add product quantity
			$orderItemTableSql = "SELECT order_item.quantity FROM order_item WHERE order_item.order_id = {$orderId}";
			$orderItemResult = $connect->query($orderItemTableSql);
			$orderItemData = $orderItemResult->fetch_row();

			$editQuantity = $updateProductQuantityResult[0] + $orderItemData[0];

			$updateQuantitySql = "UPDATE product SET quantity = $editQuantity WHERE product_id = ".$_POST['productName'][$x]."";
			$connect->query($updateQuantitySql);		
		} // while	
		
		if(count($_POST['productName']) == count($_POST['productName'])) {
			$readyToUpdateOrderItem = true;			
		}
	} // /for quantity

	// remove the order item data from order item table
	for($x = 0; $x < count($_POST['productName']); $x++) {			
		$removeOrderSql = "DELETE FROM order_item WHERE order_id = {$orderId}";
		$connect->query($removeOrderSql);	
	} // /for quantity

	if($readyToUpdateOrderItem) {
			// insert the order item data 
		for($x = 0; $x < count($_POST['productName']); $x++) {			
			$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_id = ".$_POST['productName'][$x]."";
			$updateProductQuantityData = $connect->query($updateProductQuantitySql);
			
			while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
				$updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['quantity'][$x];							
					// update product table
					$updateProductTable = "UPDATE product SET quantity = '".$updateQuantity[$x]."' WHERE product_id = ".$_POST['productName'][$x]."";
					$connect->query($updateProductTable);

					// add into order_item
				$orderItemSql = "INSERT INTO order_item (order_id, product_id, quantity, total, order_item_status) 
				VALUES ({$orderId}, '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['totalValue'][$x]."', 1)";

				$connect->query($orderItemSql);		
			} // while	
		} // /for quantity
	}

	$valid['success'] = true;
	$valid['messages'] = "บันทึกข้อมูลสำเร็จ";

	

			
	
	$connect->close();
	if($valid['success']) { echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
		echo "<script>window.location.href='../tables.php'</script>";
	} else{
		echo "<script>alert('แก้ไขข้อมูลไม่สำเร็จ');</script>";
		echo json_encode($valid);
	}
	
	}
} // /if $_POST
// echo json_encode($valid);