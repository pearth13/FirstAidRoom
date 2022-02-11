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
    <title>VRU FirstAid - แก้ไขประเภทยา</title>
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
                    <div class="col-lg-5 d-none d-lg-block"><img src="img\d.jpg" alt="HTML tutorial" style="width:100%;height:100%;"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">แก้ไขประเภทยา</h1>
                                </div>
                                
                                    <?php 
                                    $categoriesId = $_GET['categoriesId'];
                                    $sqlr = "SELECT* FROM categories
                                   		
                                    WHERE categories_status = 1 AND categories_id = {$categoriesId} "  ;
                                    $result = $connect->query($sqlr);
                                    while( $row = $result->fetch_array()) {
                                ?>
                                <form method="POST" action="php_action\editCategories.php?categoriesId=<?php echo $categoriesId; ?>" class="user"> <!--fromRegister-->
                                    <div class="form-group">
                                        <div><p>ชื่อประเภทยา</p><input for="editCategoriesName" type="text" id="editCategoriesName" name="editCategoriesName" class="form-control " 
                                                value="<?php echo $row['categories_name'] ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <?php $active = $row['categories_active']; if($active == 1){
                                                                            $activet ="เปิดใช้งาน";
                                                                        }elseif($active == 2){
                                                                            $activet ="ปิดใช้งาน";
                                                                        }?>
                                        
                                            <div><p>เปิด-ปิด การเปิดใช้งานประเภทยา</p><select class="form-control" id="editCategoriesActive" name="editCategoriesActive" >
                                                    <option value="<?php echo $active; ?>"><?php echo $activet; ?></option>
                                                    <option value="1">เปิดใช้งาน</option>
                                                    <option value="2">ปิดใช้งาน</option>
                                                </select>
                                    </div> 
                                    </div>            
                                    <hr>                     
                                    <button type="submit" name="submit" id="submit" class="btn btn-info btn-user btn-block">
                                     แก้ไขข้อมูล
                                    </button>
                                    <a href="categories_manage.php" class="btn btn-secondary btn-user btn-block">
                                    <i class=""></i> ยกเลิก</a> 
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