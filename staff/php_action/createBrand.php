<?php 	
require_once 'db_connect.php';
if(isset($_POST['submit'])){	
	$brandName 		= $_POST['brandName'];
	$infolot 		= $_POST['infolot'];
  	
				$sql = "INSERT INTO brands( `brand_name`, `infolot`, `brand_active`, `brand_status`) 
				VALUES ('$brandName','$infolot','1','1')";

				if($connect->query($sql) === TRUE) { echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
					echo "<script>window.location.href='../lotdrug_manage.php'</script>";
				} else{
					echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ');</script>";
					echo "<script>window.location.href='../lotdrug_manage.php'</script>";
				}
	$connect->close();

}  
