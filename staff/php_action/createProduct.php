<?php 	
require_once 'db_connect.php';
if(isset($_POST['submit'])){	
	$name 		= $_POST['productName'];
  	$brand 			= $_POST['brandName'];
  	$categories		= $_POST['categoryName'];
  	$quantity		= $_POST['quantity'];
  	$date 			= date('Y-m-d', strtotime($_POST['date']));
  	$type 			= $_POST['typed'];	
	
				$sql = "INSERT INTO product (`product_name`, `brand_id`, `categories_id`, `quantity`, `date`, `active`, `status`, `typed`) 
				VALUES ('$name','$brand','$categories','$quantity','$date','1','1','$type')";

				if($connect->query($sql) === TRUE) { echo "<script>alert('เพิ่มยาสำเร็จ');</script>";
					echo "<script>window.location.href='../drug_manage.php'</script>";
				} else{
					echo "<script>alert('เพิ่มยาไม่สำเร็จ');</script>";
					echo "<script>window.location.href='../drug_manage.php'</script>";
				}	
	$connect->close();

} // /if $_POST
