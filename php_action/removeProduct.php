<?php 	

require_once 'db_connect.php';
$productId = $_GET['productId'];
if($productId) { 

 $sql = "UPDATE product SET active = 2, status = 2 WHERE product_id = {$productId}";

 if($connect->query($sql) === TRUE) { echo "<script>alert('ลบสำเร็จ');</script>";
	echo "<script>window.location.href='../drug_manage.php'</script>";
} else{
	echo "<script>alert('ลบไม่สำเร็จ');</script>";
	echo "<script>window.location.href='../drug_manage.php'</script>";
}	
$connect->close();
}
 