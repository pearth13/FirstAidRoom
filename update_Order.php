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
    <title>VRU FirstAid - ระบบให้บริการสุขภาพเบื้องต้น</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-info">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"><img src="img\c+.jpg" alt="HTML tutorial" style="width:100%;height:100%;"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">การให้บริการ</h1>
                                </div>
                                
                                    <?php 
                                    
                                    $orderId = $_GET['orderId'];
                                    $sqlr = "SELECT orders.order_date, orders.client_name, orders.sick, orders.order_info, orders.payment_status, 
                                    orders.order_status, user.user_namel FROM orders INNER JOIN user ON orders.client_name = user.user_id WHERE orders.order_id = {$orderId}";
                                    $result = $connect->query($sqlr);
                                    while( $row = $result->fetch_array()) {

                                        if($row['payment_status'] == 1) { 		
                                            $paymentStatus = "<label class='label label-success'>ทำการรักษาสำเร็จ</label>";
                                        } else if($row['payment_status'] == 2) { 		
                                            $paymentStatus = "<label class='label label-info'>นอนพักรอดูอาการ</label>";
                                        } else if($row['payment_status'] == 3) { 		
                                            $paymentStatus = "<label class='label label-danger'>นำต่อการรักษาไปยังโรงพยาบาล</label>";
                                        } else if($row['payment_status'] == 0) { 		
                                           $paymentStatus = "<label class='label label-warning'>ยังไม่มีการตรวจรักษา</label>";
                                       }// /else
                                ?>
                                <form method="POST" action="php_action/editOrder.php?orderId=<?php echo $orderId; ?>" class="user"> <!--fromRegister-->
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <p>วันที่</p><input for="order_date" type="date" id="order_date" name="order_date" class="form-control" value="<?php echo $row['order_date'] ?>" required/>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>ชื่อผู้ขอใช้บริการ</p><input name="client_name" id="client_name" class="form-control" value="<?php echo $row['user_namel'] ?>"readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0" >
                                            อาการป่วย<input name="sick" id="sick" class="form-control" value="<?php echo $row['sick'] ?>" required/></div>
                                        <div class="col-sm-6" >
                                            ข้อมูลเพิ่มเติม<input type="text" class="form-control" id="order_info" name="order_info" value="<?php echo $row['order_info'] ?>" /></div>       
                                    </div> 

                                    <div class="form-group">
                                        <div>
                                            สถานะการรักษา<select class="form-control" name="paymentStatus" id="paymentStatus" required>
                                                <option value="<?php echo $row['payment_status']; ?>"><?php echo $paymentStatus; ?></option>
                                                <option value="1">ให้บริการเสร็จสิ้น</option>
                                                <option value="2">นอนดูอาการ</option>
                                                <option value="3">ส่งต่อการรักษาไปยังโรงพยาบาล</option>
                                            </select></div>   
                                    </div>
                                    <div class="form-group">    
                                        <table class="table" id="productTable">
                                        <thead>
                                            <tr>			  			
                                                <th style="width:60%;">เลือกยา</th>
                                                <th style="width:37%;"></th>			  			
                                                <th style="width:1%;"></th>			  			
                                                <th style="width:1%;"></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>			  			
                                                <th style="width:60%;"></th>
                                                <th style="width:37%;"></th>			  			
                                                <th style="width:1%;"></th>			  			
                                                <th style="width:1%;" type="button" onclick="addRow()" id="addRowBtn" data-loading-text="กำลังโหลด..."><i class="fas fa-plus"></i></th>
                                            </tr>
                                        </tfoot>
                                            <tbody>
                                                <?php

                                                $orderItemSql = "SELECT order_item.order_item_id, order_item.order_id, order_item.product_id, order_item.quantity, order_item.total FROM order_item WHERE order_item.order_id = {$orderId}";
                                                    $orderItemResult = $connect->query($orderItemSql);
                                                    // $orderItemData = $orderItemResult->fetch_all();						
                                                    
                                                    // print_r($orderItemData);
                                                $arrayNumber = 0;
                                                // for($x = 1; $x <= count($orderItemData); $x++) {
                                                $x = 1;
                                                while($orderItemData = $orderItemResult->fetch_array()) { 
                                                    // print_r($orderItemData); ?>
                                                    <tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
                                                        <td style="margin-left:60px;">
                                                            <div class="form-group">

                                                            <select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" required>
                                                                <option value="">~~เลือก~~</option>
                                                                <?php
                                                                    $productSql = "SELECT * FROM product WHERE active = 1 AND status = 1 AND quantity > 0 OR product_id = 0";
                                                                    $productData = $connect->query($productSql);
                                                                    while($row = $productData->fetch_array()) {									 		
                                                                        $selected = "";
                                                                        if($row['product_id'] == $orderItemData['product_id']) {
                                                                            $selected = "selected";
                                                                        } else {
                                                                            $selected = "";
                                                                        }
                                                                        echo "<option value='".$row['product_id']."' id='changeProduct".$row['product_id']."' ".$selected." >".$row['product_name']."</option>";
                                                                        $quantityd = $row['quantity'];
                                                                        } // /while 
                                                                ?>
                                                            </select>
                                                            </div>
                                                        </td>
                                                        
                                                        <td style="padding-left:37px;">
                                                            <div class="form-group">
                                                            <input type="number" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="0" max="20" value="<?php echo $orderItemData['quantity']; ?>" required/>
                                                            
                                                            </div>
                                                        </td>
                                                        <td style="padding-left:1px;">
                                                            <input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" value="<?php echo $orderItemData['total']; ?>"/>			
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="fas fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php
                                                $arrayNumber++;
                                                $x++;
                                                } // /for
                                                ?>
                                            </tbody>			  	
                                        </table></div>
                                                  
                                    <button type="submit" name="submit" id="submit" class="btn btn-info btn-user btn-block">
                                        <i class=""></i> บันทึกข้อมูล
                                    </button> 
                                        <a href="tables.php" class="btn btn-secondary btn-user btn-block">
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="custom/js/order.js"></script>
</body>

</html>
<?php
    
?>