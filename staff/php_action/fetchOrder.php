<?php 	

require_once 'core.php';

$sql = "SELECT orders.order_id, orders.order_date, orders.client_name, orders.sick, orders.payment_status, user.user_namel
FROM orders INNER JOIN user ON orders.client_name = user.user_id
WHERE order_status = 1";
$result = $connect->query($sql);



$output = array('data' => array());

if($result->num_rows > 0) { 
 
 $paymentStatus = ""; 
 $x = 1;

 while($row = $result->fetch_array()) {
 	$orderId = $row[0];

	/*
 	$countOrderItemSql = "SELECT count(*) FROM order_item WHERE order_id = $orderId";
 	$itemCountResult = $connect->query($countOrderItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();
	*/
	 $sqli = "SELECT * FROM order_item INNER JOIN product ON order_item.product_id = product.product_id WHERE order_id = {$orderId} ";
                                      $resulti = $connect->query($sqli);
                                      while($p = $resulti->fetch_array()) {
                                        if($p['typed'] == 1){
                                          $typed ="เม็ด";
                                        }elseif($p['type'] == 2){
                                          $typed ="กระปุก";
                                        }elseif($p['type'] == 3){
                                          $typed ="หลอด";
                                        }elseif($p['type'] == 4){
                                          $typed ="ขวด";
                                        }elseif($p['type'] == 5){
                                          $typed ="ซอง";
                                        }elseif($p['type'] == 6){
                                          $typed ="ก้าน";
                                        }elseif($p['type'] == 7){
                                          $typed ="มิลลิลิตร";
                                        }
                                        $itemCountRow = $p['product_name'].' '.'('.$p[3].' '.$typed.')'.'<br>';
									}								
 	// active 
 	if($row[4] == 1) { 		
 		$paymentStatus = "<label class='label label-success'>ทำการรักษาสำเร็จ</label>";
 	} else if($row[4] == 2) { 		
 		$paymentStatus = "<label class='label label-info'>นอนพักรอดูอาการ</label>";
 	} else if($row[4] == 3) { 		
 		$paymentStatus = "<label class='label label-danger'>ปฏิเสธการรักษา</label>";
 	} else if($row[4] == 0) { 		
		$paymentStatus = "<label class='label label-warning'>ยังไม่มีการตรวจรักษา</label>";
	}// /else

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    ตัวเลือก <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a href="orders.php?o=editOrd&i='.$orderId.'" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> แก้ไข</a></li>

	    <li><a type="button" onclick="printOrder('.$orderId.')"> <i class="glyphicon glyphicon-print"></i> ปริ้นท์ </a></li>
	    
	    <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$orderId.')"> <i class="glyphicon glyphicon-trash"></i> ลขข้อมูล</a></li>       
	  </ul>
	</div>';
	$datet = $row[1];
	$popdm= date("d/m/", strtotime($datet));
	$popy= date("Y", strtotime($datet))+543;	
	$user = $row[5];
 	$output['data'][] = array( 		
 		// image
 		$x,
 		// order date
 		$popdm.$popy,
 		// client name
 		$user, 
 		// client contact
 		$row[3],
		 		 	
 		$itemCountRow,

 		$paymentStatus,
 		// button
 		$button 		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);