<?php 
require_once 'db_connect.php';

session_start();

$errors = array();
if($_POST) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "กรุณากรอกชื่อผู้ใช้";}
		if($password == "") {
			$errors[] = "กรุณากรอกรหัสผ่าน";
		}
	}elseif(isset($_POST['login'])){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$mainSql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
				$mainResult = $connect->query($mainSql);
				$num = mysqli_fetch_array($mainResult);
				if($num > 0){
					$_SESSION['user_id'] = $num['user_id'];
					$_SESSION['Ulevel'] = $num['Ulevel'];
					if($_SESSION['Ulevel'] == '1'){
                        echo "<script>alert('เข้าสู่ระบบสำเร็จ');</script>";
						echo "<script>window.location.href='index.php'</script>";
					}
					if($_SESSION['Ulevel'] == '2'){
						echo "<script>alert('เข้าสู่ระบบสำเร็จ');</script>";
						echo "<script>window.location.href='staff/index.php'</script>";  
					}
					if($_SESSION['Ulevel'] == '3'){
						echo "<script>alert('เข้าสู่ระบบสำเร็จ');</script>";
						echo "<script>window.location.href='user/index.php'</script>";  
					}else{
						$errors[] = "ป้อนชื่อ และรหัสผ่านของคุณให้ถูกต้อง";
					}
				}else{
					$errors[] = "ป้อนชื่อ และรหัสผ่านของคุณให้ถูกต้อง";
				}
			}
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="logovru2.png"/>
    <title>ระบบให้บริการสุขภาพเบื้องต้น</title>
    <link rel="icon" href="\admin\logovru2.png"/>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="img\F.JPG" alt="HTML tutorial" style="width:100%;height:100%;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                <div class="panel-body">
                                    <div class="messages">
                                        <?php if($errors) {
                                            foreach ($errors as $key => $value) {
                                                echo '<div class="alert alert-warning" role="alert">
                                                <i class="glyphicon glyphicon-exclamation-sign"></i>
                                                '.$value.'</div>';										
                                                }
                                            } ?>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">เข้าสู่ระบบห้องพยาบาล</h1>
                                        <hr>
                                    </div>
                                        <form class="user" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
                                            <fieldset>
                                                <div class="form-group">
                                                   
                                                    <input type="username" class="form-control form-control-user" id="username" name="username" placeholder="ชื่อผู้ใช้ (Username)" autocomplete="off" />
                                                    
                                                </div>
                                                <div class="form-group">
                                                   
                                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="รหัสผ่าน (Password)" autocomplete="off" />
                                                    
                                                </div>								
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info btn-user btn-block" name="login" id="login"> เข้าสู่ระบบ</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>