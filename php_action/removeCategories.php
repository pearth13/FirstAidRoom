<?php 	
session_start();
require_once 'db_connect.php';
$categoriesId = $_GET['categoriesId'];
if($categoriesId) { 

 $sql = "UPDATE categories SET categories_active = 2, categories_status = 2 WHERE categories_id = {$categoriesId}";

 if($connect->query($sql) === TRUE) { echo "<script>alert('ลบสำเร็จ');</script>";
	echo "<script>window.location.href='../categories_manage.php'</script>";
} else{
	echo "<script>alert('ลบไม่สำเร็จ');</script>";
	echo "<script>window.location.href='../categories_manage.php'</script>";
}	
$connect->close();
}
 