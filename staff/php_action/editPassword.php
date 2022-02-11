<?php 	
session_start();
require_once 'db_connect.php';

if($_POST) {
	$userId = $_GET['userId'];
	$password = $_POST['editPassword'];
	
	$sql = "UPDATE user SET password = '$password' WHERE user_id = $userId ";

	if($connect->query($sql) === TRUE) { echo "<script>alert('แก้ไขรหัสสมาชิกสำเร็จ');</script>";
		echo "<script>window.location.href='../user_manage.php'</script>";
	} else{
		echo "<script>alert('แก้ไขรหัสสมาชิกไม่สำเร็จ');</script>";
		echo "<script>window.location.href='../user_manage.php'</script>";
	}	
	$connect->close();
	}
	 
	