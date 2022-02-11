<?php 
   session_start();
   require_once 'db_connect.php';
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VRU FirstAid - แก้ไขผู้เปิดใช้งาน</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-info">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">แก้ไขผู้เปิดใช้งาน</h1>
                                </div>
                                    <?php 
                                    $userId = $_GET['UserId'];
                                    $sqlr = "SELECT user.user_id, user.user_namel, user.fac_id,
                                    user.tel, user.username, user.password, user.active, user.status, 
                                    user.Ulevel, user.cata, user.druga, fac.fac_name FROM user 
                                    INNER JOIN fac ON user.fac_id = fac.fac_id		
                                    WHERE user.status = 1 AND user_id = {$userId} "  ;
                                    $result = $connect->query($sqlr);
                                    while( $row = $result->fetch_array()) {
                                ?>
                                <form method="POST" action="php_action\editUser.php?userId=<?php echo $userId; ?>" class="user"> <!--fromRegister-->
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p>ชื่อผู้ใช้</p><input for="userNamel" type="text" id="userNamel" name="userNamel" class="form-control " 
                                                value="<?php echo $row['user_namel'] ?>" >
                                        </div>
                                        <div class="col-sm-6">
                                        <p>เบอร์โทร</p><input for="tel" type="text" id="tel" name="tel" class="form-control" 
                                            value="<?php echo $row['tel'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p>ชื่อผู้ใช้งานระบบ</p><select class="form-control" id="facName" name="facName">
                                                            <option value="<?php echo $row['fac_id']; ?>"><?php echo $row['fac_name']; ?></option>
                                                            <?php 
                                                            $sqlo = "SELECT fac_id, fac_name, fac_active, fac_status FROM fac WHERE fac_status = 1 AND fac_active = 1";
                                                                    $resultw = $connect->query($sqlo);

                                                                    while($row1 = $resultw->fetch_array()) {
                                                                        echo "<option value='".$row1[0]."'>".$row1[1]."</option>";
                                                                    } // while
                                                                    
                                                            ?>
                                                        </select>
                                        </div>
                                        <?php  $cata = $row['cata'];
                                                        if ($cata == 1){
                                                            $catat ="นักศึกษา";
                                                          }elseif($cata == 2){
                                                            $catat ="คณาจารย์";
                                                          }elseif($cata == 3){
                                                            $catat ="บุคลากรสายสนับสนุน";
                                                          }elseif($cata == 4){
                                                            $catat ="กลุ่มแม่บ้าน";
                                                          }elseif($cata == 5){
                                                            $catat ="นักเรียนโรงเรียนโรงเรียนสาธิต";
                                                          }?>
                                                          <?php $cata ?>
                                        
                                        <div class="col-sm-6 ">
                                                <p for="cata">กลุ่มผู้เปิดใช้งาน</p>
                                                <select class="form-control " id="cata" name="cata">
                                                    <option value="<?php echo $cata; ?>"><?php echo $catat; ?></option>
                                                    <option value="1">นักศึกษา</option>
                                                    <option value="2">คณาจารย์</option>
                                                    <option value="3">บุคลากรสายสนับสนุน</option>
                                                    <option value="4">กลุ่มแม่บ้าน</option>
                                                    <option value="5">นักเรียนโรงเรียนโรงเรียนสาธิต</option>
                                            </select>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p>Ussername</p><input for="username" type="text" id="username" name="username" class="form-control" 
                                                value="<?php echo $row['username'] ?>" >
                                            
                                        </div>    
                                     <div class="col-sm-6 ">
                                        <?php $active = $row['active']; if($active == 1){
                                                                            $activet ="เปิดใช้งาน";
                                                                        }elseif($active == 2){
                                                                            $activet ="ปิดใช้งาน";
                                                                        }?>
                                        
                                            <p>เปิด-ปิด การเปิดใช้งานผู้ใช้</p><select class="form-control" id="active" name="active" >
                                                    <option value="<?php echo $active; ?>"><?php echo $activet; ?></option>
                                                    <option value="1">เปิดใช้งาน</option>
                                                    <option value="2">ปิดใช้งาน</option>
                                                </select>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <?php $level = $row['Ulevel']; if($level == 1){
                                                                            $Ulevel ="ผู้ดูแลระบบ";
                                                                        }elseif($level == 2){
                                                                            $Ulevel ="เจ้าหน้าที่";
                                                                        }else{ $Ulevel = "ผู้รับบริการ" ;
                                                                        }?>
                                        <p>การเข้าถึงข้อมูล</p><select class="form-control" id="ulevel" name="ulevel" >
                                                    <option value="<?php echo $level; ?>"><?php echo $Ulevel; ?></option>
                                                    <option value="1">ผู้ดูแลระบบ</option>
                                                    <option value="2">เจ้าหน้าที่</option>
                                                    <option value="3">ผู้รับบริการ</option>
                                                </select>
                                        </div>
                                        <div class="col-sm-6">
                                        <p>การแพ้ยา</p><input for="druga" type="text" id="druga" name="druga" class="form-control" 
                                            value="<?php echo $row['druga'] ?>" >
                                        </div>
                                        
                                    </div>                                 
                                    <button type="submit" name="submit" id="submit" class="btn btn-info btn-user btn-block">
                                    <i class=""></i> แก้ไขบัญชี
                                    </button> 
                                    <a href="user_manage.php" class="btn btn-secondary btn-user btn-block">
                                    <i class=""></i> ยกเลิก</a> 

                                </form>
                                <?php }  ?>
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
        <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</body>

</html>
<?php
    
?>