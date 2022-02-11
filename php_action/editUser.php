<?php 	

require_once 'db_connect.php';


if(isset($_POST['submit'])){
	$userId 		= $_GET['userId'];
	$userNamel 		= $_POST['userNamel'];
  	$tel 			= $_POST['tel'];
  	$fac			= $_POST['facName'];
	$password		= $_POST['editPassword'];
  	$username 		= $_POST['username'];
	$cata 			= $_POST['cata'];
	$druga 			= $_POST['druga'];
	$active 		= $_POST['active'];
	$ulevel 		= $_POST['ulevel'];
  
	$sql = "UPDATE user SET `user_namel`='$userNamel',`fac_id`='$fac',
	`tel`='$tel',`username`='$username',`password`='$password',`active`='$active',`status`='1',
	`Ulevel`='$ulevel',`cata`='$cata',`druga`='$druga'  WHERE user_id = {$userId}";

if($connect->query($sql) === TRUE) { echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
	echo "<script>window.location.href='../user_manage.php'</script>";
} else{
	echo "<script>alert('แก้ไขข้อมูลไม่สำเร็จ');</script>";
	echo "<script>window.location.href='../user_manage.php'</script>";
}	
$connect->close();
}
 
