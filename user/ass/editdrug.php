
<?php 	
    require_once '../db_connect.php';
    

if(isset($_POST['submit'])){
	$userId = $_GET['id'];
	$druga 	= $_POST['druga'];
 
	$sql = "UPDATE user SET  druga = '$druga'  WHERE user_id = $userId ";

	if($connect->query($sql) === TRUE) { echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
		echo "<script>window.location.href='../index.php'</script>";
	} else{
		echo "<script>alert('แก้ไขข้อมูลไม่สำเร็จ');</script>";
		echo "<script>window.location.href='../index.php'</script>";
	}	
	$connect->close();
	}