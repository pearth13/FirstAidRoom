<?php 	

require_once 'db_connect.php';

if(isset($_POST['submit'])){
	$brandId 		= $_GET['brandId'];
	$brandName 		= $_POST['editBrandName'];
	$infolot 		= $_POST['editInfolot'];
	$active 		= $_POST['editBrandActive'];

	$sql = "UPDATE brands SET 
	`brand_name`='$brandName',`infolot`='$infolot ',
	`brand_active`='$active' WHERE brand_id = {$brandId}";

if($connect->query($sql) === TRUE) { echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
	echo "<script>window.location.href='../lotdrug_manage.php'</script>";
} else{
	echo "<script>alert('แก้ไขข้อมูลไม่สำเร็จ');</script>";
	echo "<script>window.location.href='../lotdrug_manage.php'</script>";
}	
$connect->close();
}
 
