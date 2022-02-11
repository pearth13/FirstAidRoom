<?php 	
session_start();
require_once 'db_connect.php';
$facId = $_GET['facId'];
if($facId) { 

 $sql = "UPDATE fac SET fac_active = 2, fac_status = 2 WHERE fac_id = {$facId}";

 if($connect->query($sql) === TRUE) { echo "<script>alert('ลบสำเร็จ');</script>";
	echo "<script>window.location.href='../fac_manage.php'</script>";
} else{
	echo "<script>alert('ลบไม่สำเร็จ');</script>";
	echo "<script>window.location.href='../fac_manage.php'</script>";
}	
$connect->close();
}
 