<?php 	

require_once 'db_connect.php';
$userId = $_GET['UserId'];
if($userId) { 

 $sql = "UPDATE user SET active = 2, status = 2 WHERE user_id = {$userId}";

 if($connect->query($sql) === TRUE) { echo "<script>alert('ลบสำเร็จ');</script>";
	echo "<script>window.location.href='../user_manage.php'</script>";
} else{
	echo "<script>alert('ลบไม่สำเร็จ');</script>";
	echo "<script>window.location.href='../user_manage.php'</script>";
}	
$connect->close();
}
 