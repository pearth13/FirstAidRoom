<?php 	

require_once 'db_connect.php';

if($_POST) {
	$productId 			= $_GET['productId'];
	$productName 		= $_POST['editProductName']; 
  	$quantity 			= $_POST['editQuantity'];
  	$date				= $_POST['editdate'];
  	$brandName 			= $_POST['editBrandName'];
  	$categoryName 		= $_POST['editCategoryName'];
  	$productStatus 		= $_POST['editProductStatus'];
	$typed 				= $_POST['editTyped'];

	$sql = "UPDATE product SET product_name = '$productName', brand_id = '$brandName', categories_id = '$categoryName',
	quantity = '$quantity', date = '$date', active = '$productStatus', status = 1 , typed = '$typed' WHERE product_id = $productId ";

if($connect->query($sql) === TRUE) { echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
	echo "<script>window.location.href='../drug_manage.php'</script>";
} else{
	echo "<script>alert('แก้ไขข้อมูลไม่สำเร็จ');</script>";
	echo "<script>window.location.href='../drug_manage.php'</script>";
}	
$connect->close();
}
 
