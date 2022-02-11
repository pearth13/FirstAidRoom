<?php 	
require_once 'db_connect.php';
if(isset($_POST['submit'])){	
	$facName 		= $_POST['facName'];
  	
				$sql = "INSERT INTO fac( `fac_name`, `fac_active`, `fac_status`) 
				VALUES ('$facName','1','1')";

				if($connect->query($sql) === TRUE) { echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
					echo "<script>window.location.href='../fac_manage.php'</script>";
				} else{
					echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ');</script>";
					echo "<script>window.location.href='../fac_manage.php'</script>";
				}	
	$connect->close();

} // /if $_POST
