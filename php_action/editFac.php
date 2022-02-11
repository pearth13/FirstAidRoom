<?php 	

require_once 'db_connect.php';

if(isset($_POST['submit'])){
	$facId 		= $_GET['facId'];
	$facName 		= $_POST['editFacName'];
	$active 		= $_POST['editFacActive'];

	$sql = "UPDATE fac SET `fac_name`='$facName',`fac_active`='$active' WHERE fac_id = {$facId}";

if($connect->query($sql) === TRUE) { echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
	echo "<script>window.location.href='../fac_manage.php'</script>";
} else{
	echo "<script>alert('แก้ไขข้อมูลไม่สำเร็จ');</script>";
	echo "<script>window.location.href='../fac_manage.php'</script>";
}	
$connect->close();
}
 
