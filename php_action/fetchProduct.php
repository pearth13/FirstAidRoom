<?php 	

require_once 'db_connect.php';
date_default_timezone_set('Asia/Bangkok');
$sql = "SELECT product.product_id, product.product_name, product.brand_id,
 		product.categories_id, product.quantity, product.date, product.active, product.status, product.typed,
 		brands.brand_name, categories.categories_name FROM product 
		INNER JOIN brands ON product.brand_id = brands.brand_id 
		INNER JOIN categories ON product.categories_id = categories.categories_id  
		WHERE product.status = 1";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = "";

 while($row = $result->fetch_array()) {
 	$productId = $row[0];
 	// active 
 	if($row[6] == 1) {
 		// activate member
 		$active = "<label class='label label-success'>เปิดใช้งาน</label>";
 	} else {
 		// deactivate member
 		$active = "<label class='label label-danger'>ปิดใช้งาน</label>";
 	} // /else

		if($row[8] == 1){
			$typed ="เม็ด";
		}elseif($row[8] == 2){
			$typed ="กระปุก";
		}elseif($row[8] == 3){
			$typed ="หลอด";
		}elseif($row[8] == 4){
			$typed ="ขวด";
		}elseif($row[8] == 5){
			$typed ="ซอง";
		}elseif($row[8] == 6){
			$typed ="ก้าน";
		}elseif($row[8] == 7){
			$typed ="มิลลิลิตร";
		}

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    ตัวเลือก <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct('.$productId.')"> <i class="glyphicon glyphicon-edit"></i> แก้ไข</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeProductModal" id="removeProductModalBtn" onclick="removeProduct('.$productId.')"> <i class="glyphicon glyphicon-trash"></i> ลบ</a></li>       
	  </ul>
	</div>';

	// $brandId = $row[3];
	// $brandSql = "SELECT * FROM brands WHERE brand_id = $brandId";
	// $brandData = $connect->query($sql);
	// $brand = "";
	// while($row = $brandData->fetch_assoc()) {
	// 	$brand = $row['brand_name'];
	// }
	date_default_timezone_set('Asia/Bangkok');
	$datet = $row[5];
	$popdm= date("d/m/", strtotime($datet));
	$popy= date("Y", strtotime($datet))+543;
	$brand = $row[9];
	$category = $row[10];

 	$output['data'][] = array( 		
 // image
 		
 		// product name
 		$row[1], 
 		// date
 		$popdm.$popy,
 		// quantity 
 		$row[4]." ".$typed, 		 	
 		// brand
 		$brand,
 		// category 		
 		$category,
 		// active
 		$active,
 		// button
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);