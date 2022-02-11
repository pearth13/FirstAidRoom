<?php 	

require_once 'db_connect.php';

if(isset($_POST['submit'])){
	$categoriesId 		= $_GET['categoriesId'];
	$categoriesName 		= $_POST['editCategoriesName'];
	$active 		= $_POST['editCategoriesActive'];

	$sql = "UPDATE categories SET `categories_name`='$categoriesName',`categories_active`='$active' WHERE categories_id = {$categoriesId}";

if($connect->query($sql) === TRUE) { echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
	echo "<script>window.location.href='../categories_manage.php'</script>";
} else{
	echo "<script>alert('แก้ไขข้อมูลไม่สำเร็จ');</script>";
	echo "<script>window.location.href='../categories_manage.php'</script>";
}	
$connect->close();
}
 
