<?php 	
require_once 'db_connect.php';
if(isset($_POST['submit'])){	
	$userNamel 		= $_POST['userNamel'];
  	$tel 			= $_POST['tel'];
  	$fac			= $_POST['facName'];
  	$username 		= $_POST['username'];
  	$password 		= $_POST['password'];
	$cata 		= $_POST['cata'];
	$druga 		= $_POST['druga'];
	
				$sql = "INSERT INTO `user`(`user_namel`, `fac_id`, `tel`, `username`, `password`, `active`, `status`, `Ulevel`, `cata`, `druga`) 
				VALUES ('$userNamel','$fac','$tel','$username','$password','1','1','3','$cata','$druga')";

				if($connect->query($sql) === TRUE) { echo "<script>alert('เพิ่มสมาชิกสำเร็จ');</script>";
					echo "<script>window.location.href='../user_manage.php'</script>";
				} else{
					echo "<script>alert('สมัครสมาชิกไม่สำเร็จ');</script>";
					echo "<script>window.location.href='../user_manage.php'</script>";
				}	
	$connect->close();

} // /if $_POST
