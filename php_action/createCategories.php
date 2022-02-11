<?php 	
require_once 'db_connect.php';
if(isset($_POST['submit'])){	
	$categoriesName 		= $_POST['categoriesName'];
  	
				$sql = "INSERT INTO categories( `categories_name`, `categories_active`, `categories_status`) 
				VALUES ('$categoriesName','1','1')";

				if($connect->query($sql) === TRUE) { echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
					echo "<script>window.location.href='../categories_manage.php'</script>";
				} else{
					echo "<script>alert('ข้อมูลไม่สำเร็จ');</script>";
					echo "<script>window.location.href='../categories_manage.php'</script>";
				}	
	$connect->close();

} // /if $_POST
