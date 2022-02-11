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
    <title>VRU FirstAid - แก้ไขผู้ข้อมูลยา</title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-info">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"><img src="..\img\pack-pills.jpg" alt="HTML tutorial" style="width:100%;height:100%;"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">แก้ไขข้อมูลยา</h1>
                                </div>
                                
                                    <?php 
                                    $productId = $_GET['productId'];
                                    $sqlr = "SELECT product.product_id, product.product_name, product.brand_id,
                                    product.categories_id, product.quantity, product.date, product.active, product.status, product.typed,
                                    brands.brand_name, categories.categories_name FROM product 
                                   INNER JOIN brands ON product.brand_id = brands.brand_id 
                                   INNER JOIN categories ON product.categories_id = categories.categories_id  
                                   WHERE product.status = 1 AND product_id = {$productId} "  ;
                                    $result = $connect->query($sqlr);
                                    while( $row = $result->fetch_array()) {
                                        date_default_timezone_set('Asia/Bangkok');
                                        $datet = $row[5];
                                        $popdm= date("d/m/", strtotime($datet));
                                        $popy= date("Y", strtotime($datet))+543; 
                                        $active = $row['active']; if($active == 1){
                                            $activet ="เปิดใช้งาน";
                                        }elseif($active == 2){
                                            $activet ="ปิดใช้งาน";
                                        }
                                ?>
                                <form method="POST" action="php_action\editProduct.php?productId=<?php echo $productId; ?>" class="user"> <!--fromRegister-->
                                    <div class="form-group">
                                        <div>
                                        <p>ชื่อของยา</p><input for="editProductName" type="text" id="editProductName" name="editProductName" class="form-control"  
                                                value="<?php echo $row['product_name'] ?>" ></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p>จำนวนของยา</p><input for="editQuantity" type="number" id="editQuantity" name="editQuantity" class="form-control" 
                                            value="<?php echo $row['quantity'] ?>">
                                        </div>
                                        <div class="col-sm-6">
                                        <?php  $cata = $row['typed'];
                                                        if ($cata == 1){
                                                            $catat ="เม็ด";
                                                          }elseif($cata == 2){
                                                            $catat ="กระปุก";
                                                          }elseif($cata == 3){
                                                            $catat ="หลอด";
                                                          }elseif($cata == 4){
                                                            $catat ="ขวด";
                                                          }elseif($cata == 5){
                                                            $catat ="ซอง";
                                                          }elseif($cata == 6){
                                                            $catat ="ก้าน";
                                                          }elseif($cata == 7){
                                                            $catat ="มิลลิลิตร";
                                                          }else{
                                                            $catat ="NULL";
                                                          }?>
                                                          <?php $cata; ?>
                                                          
                                        <p>จำนวนนับของยา</p> <select class="form-control " id="editTyped" name="editTyped">
                                                    <option value="<?php echo $cata; ?>"><?php echo $catat; ?></option>
                                                    <option value="1">เม็ด</option>
                                                    <option value="2">กระปุก</option>
                                                    <option value="3">หลอด</option>
                                                    <option value="4">ขวด</option>
                                                    <option value="5">ซอง</option>
                                                    <option value="6">ก้าน</option>
                                                    <option value="7">มิลลิลิตร</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p>วันหมดอายุยา</p><input for="editdate" type="date" id="editdate" name="editdate" class="form-control" 
                                            value="<?php echo $row['date']; ?>">
                                        </div>
                                        <div class="col-sm-6 ">
                                            <p>ประเภทยา</p><select class="form-control" id="editCategoryName" name="editCategoryName">
                                                            <option value="<?php echo $row['categories_id']; ?>"><?php echo $row['categories_name']; ?></option>
                                                            <?php 
                                                            $sqlo = "SELECT * FROM categories WHERE categories_status = 1 AND categories_active = 1";
                                                                    $resultw = $connect->query($sqlo);

                                                                    while($row1 = $resultw->fetch_array()) {
                                                                        echo "<option value='".$row1[0]."'>".$row1[1]."</option>";
                                                                    } // while
                                                                    
                                                            ?>
                                                        </select>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p>ล็อตของการนำเข้ายา</p><select class="form-control" id="editBrandName" name="editBrandName">
                                                            <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></option>
                                                            <?php 
                                                            $sqlo = "SELECT * FROM brands WHERE brand_status = 1 AND brand_active = 1";
                                                                    $resultw = $connect->query($sqlo);

                                                                    while($row1 = $resultw->fetch_array()) {
                                                                        echo "<option value='".$row1[0]."'>".$row1[1]."</option>";
                                                                    } // while
                                                                    
                                                            ?>
                                                        </select>
                                            
                                        </div>    
                                     <div class="col-sm-6 ">
                                     <p>เปิด-ปิด การเปิดใช้งานยา</p><select class="form-control" id="editProductStatus" name="editProductStatus" >
                                                    <option value="<?php echo $active; ?>"><?php echo $activet; ?></option>
                                                    <option value="1">เปิดใช้งาน</option>
                                                    <option value="2">ปิดใช้งาน</option>
                                                </select>
                                            
                                        </div> 
                                    </div>                    
                                    <button type="submit" name="submit" id="submit" class="btn btn-info btn-user btn-block">
                                    <i class=""></i> แก้ไขข้อมูลยา
                                    </button> 
                                    <a href="drug_manage.php" class="btn btn-secondary btn-user btn-block">
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
        <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</body>

</html>
<?php
    
?>