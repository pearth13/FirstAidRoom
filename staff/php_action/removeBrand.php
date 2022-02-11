<?php 	
session_start();
require_once 'db_connect.php';
$brandId = $_GET['brandId'];
if($brandId) { 

 $sql = "UPDATE brands SET brand_active = 2, brand_status = 2 WHERE brand_id = {$brandId}";

 if($connect->query($sql) === TRUE) { echo "<script>alert('ลบสำเร็จ');</script>";
	echo "<script>window.location.href='../lotdrug_manage.php'</script>";
} else{
	echo "<script>alert('ลบไม่สำเร็จ');</script>";
	echo "<script>window.location.href='../lotdrug_manage.php'</script>";
}	
$connect->close();
}
 