
<?php 	
    require_once '../db_connect.php';
    
if(isset($_POST['submit'])){
	$userId         = $_GET['id'];
    $orderDate      = date('Y-m-d');
	$sick 			= $_POST['sick'];

    $sql = "INSERT INTO orders (order_date, client_name, sick, order_status) 
	VALUES ('$orderDate', '$userId', '$sick',  1)";

	if($connect->query($sql) === TRUE) { echo "<script>alert('เพิ่มข้อมูลการใช้บริการสำเร็จ');</script>";
		echo "<script>window.location.href='../index.php'</script>";
	} else{
		echo "<script>alert('เพิ่มข้อมูลการใช้บริการไม่สำเร็จ');</script>";
		echo "<script>window.location.href='../index.php'</script>";
	}	
	$connect->close();
	}
	 