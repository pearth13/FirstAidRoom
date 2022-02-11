<?php
session_start();
require_once 'db_connect.php';
date_default_timezone_set('Asia/Bangkok');
// echo $_SESSION['userId'];
if ($_SESSION['Ulevel'] == '') {
    header("location: login.php");
}
if ($_SESSION['Ulevel'] == '2') {
    header("location: login.php");
}
if ($_SESSION['Ulevel'] == '3') {
    header("location: login.php");
}
if ($_SESSION['Ulevel'] == '1') {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT user.user_id, user.user_namel, user.fac_id,
        user.tel, user.username, user.password, user.active, user.status, 
        user.Ulevel, user.cata, user.druga, fac.fac_name FROM user 
        INNER JOIN fac ON user.fac_id = fac.fac_id WHERE user_id = {$user_id}";
    $query = $connect->query($sql);
    $result = $query->fetch_assoc();
    $profit = "SELECT
        order_item.order_item_id, order_item.order_id, order_item.product_id, order_item.quantity, product.product_name  FROM
        order_item INNER JOIN product ON order_item.product_id = product.product_id";
    $resultprofit = $connect->query($profit);
    $dateyearnow =  date("Y") + 543;
?>
    <!--<?php while ($rowpro = $resultprofit->fetch_array()) {
            echo ", '" . $rowpro['product_name'] . "'";
        }  ?>-->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ระบบให้บริการสุขภาพเบื้องต้น</title>
        <link rel="icon" href=" logovru2.png" />
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <!-- piechart-->

        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php $profit = "SELECT * FROM product";
                    $resultprofit = $connect->query($profit);
                    while ($rowpro = $resultprofit->fetch_array()) {
                        $productid1 = $rowpro['product_id'];
                        $productname1 = $rowpro['product_name'];
                        $sqlu = "SELECT * FROM order_item WHERE product_id = {$productid1} ";
                        $resultpro1 = $connect->query($sqlu);
                        $idpro1 = $resultpro1->num_rows;
                        echo "['" . $productname1 . "', " . $idpro1 . "],";
                    }
                    ?>
                ]);
                var chart = new google.visualization.PieChart(document.getElementById('columnchart_material'));
                chart.draw(data);
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php $sqlf = "SELECT fac_id, fac_name FROM fac";
                    $resultf = $connect->query($sqlf);
                    while ($rowf = $resultf->fetch_array()) {
                        $facuserf = $rowf['fac_id'];
                        $facnamef = $rowf['fac_name'];
                        $sqlu = "SELECT * FROM user WHERE fac_id = {$facuserf} AND status = 1 AND active =1  ";
                        $resultu = $connect->query($sqlu);
                        $idfacv = $resultu->num_rows;

                        //echo $facnamef.' '.$idfacv.'<br>';
                        echo "['" . $facnamef . "', " . $idfacv . "],";
                    }
                    ?>
                ]);
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data);
            }
        </script>



    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-briefcase-medical"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">ระบบให้บริการสุขภาพเบื้องต้น </div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-fw fa-clinic-medical"></i>
                        <span>หน้าแรก</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    การจัดการข้อมูล
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-address-card"></i>
                        <span>ผู้ใช้งานระบบ</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">ประเภทข้อมูลผู้ใช้:</h6>
                            <a class="collapse-item" href="user_manage.php">ข้อมูลผู้รับบริการ</a>
                            <a class="collapse-item" href="staff_manage.php">ข้อมูลเจ้าหน้าที่</a>
                            <a class="collapse-item" href="fac_manage.php">ข้อมูลคณะ/หน่วยงาน</a>
                        </div>
                    </div>
                </li>


                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-bong"></i>
                        <span>ยาและเวชภัณท์</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">ประเภทข้อมูลยา:</h6>
                            <a class="collapse-item" href="drug_manage.php">ข้อมูลยา</a>
                            <a class="collapse-item" href="categories_manage.php">ประเภทของยา</a>
                            <a class="collapse-item" href="lotdrug_manage.php">ล็อตการนำเข้ายา</a>
                            <a class="collapse-item" href="other.php">Other</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    การใช้บริการห้องพยาบาล
                </div>
                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="tables.php">
                        <i class="fas fa-2x fa-stethoscope"></i>
                        <span>การใช้บริการ</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i class="fas fa-address-card"></i> <?php echo $result['user_namel'] . "(ผู้ดูแลระบบ)"; ?></span>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#sefeModal">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        ข้อมูลผู้รับบริการ
                                    </a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#setpassModal">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        เปลี่ยนรหัสผ่าน
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        ออกจากระบบ
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="#" id="printDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline"><i class="fas fa-file-pdf fa-sm text-white-50"></i> พิมพ์รายงาน</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-righ
                                aria-labelledby=" printDropdown">
                                <a class="dropdown-item" href="Report\reportbalance.php">
                                    <i class="fas fa-file-prescription fa-sm fa-fw mr-2 text-gray-400"></i>
                                    รายงานยาคงเหลือ
                                </a>
                                <!--a class="dropdown-item" href="Report\reportoutdrug.php" >
                                    <i class="fas fa-file-medical fa-sm fa-fw mr-2 text-gray-400"></i>
                                    รายงานการจ่ายยา
                                </!--a-->
                                <a class="dropdown-item" href="Report\reportrecord.php">
                                    <i class="fas fa-file-invoice fa-sm fa-fw mr-2 text-gray-400"></i>
                                    รายงานประวัติการใช้บริการ
                                </a>
                            </div>
                        </div>

                        <!-- Content Row -->
                        <div class="row">


                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    ยอดการเข้าใช้บริการทั้งหมด</div>
                                                <div><a href="tables.php" class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php $sql1 = "SELECT * FROM orders WHERE payment_status = 1 AND order_status = 1";
                                                        $query = $connect->query($sql1);
                                                        $countProduct = $query->num_rows;
                                                        echo  $countProduct;
                                                        ?> คน</a></div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="tables.php"><i class="fas fa-hospital-user fa-2x text-gray-300"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    ยาที่สามารถใช้ได้ในระบบ</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="drug_manage.php" class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php $sqld = "SELECT * FROM product WHERE typed != 0 AND active = 1 AND status = 1  ";
                                                        $queryd = $connect->query($sqld);
                                                        $countProductd = $queryd->num_rows;
                                                        echo  $countProductd;
                                                        ?> อย่าง</a></div>

                                            </div>
                                            <div class="col-auto">
                                                <a href="drug_manage.php"><i class="fas fa-tablets fa-2x text-gray-300"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    ผู้ใช้งานในระบบ</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="user_manage.php" class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php $sql2 = "SELECT * FROM user WHERE active = 1 AND status = 1 AND Ulevel = 3";
                                                        $query2 = $connect->query($sql2);
                                                        $countProduct2 = $query2->num_rows;
                                                        echo  $countProduct2;
                                                        ?> คน</a></div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="user_manage.php"><i class="fas fa-building fa-2x text-gray-300"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    มีผู้ขอเข้ารับบริการ</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="tables.php" class="h5 mb-0 font-weight-bold text-gray-800">
                                                        <?php $sql2 = "SELECT * FROM orders WHERE payment_status = 0 AND order_status != 2";
                                                        $query2 = $connect->query($sql2);
                                                        $countProduct2 = $query2->num_rows;
                                                        echo  $countProduct2;
                                                        ?> คน</a></div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="tables.php"> <i class="fas fa-user-injured fa-2x text-gray-300"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Row -->

                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-6 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">สถิติการรวมจ่ายยา</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">ตัวเลือกการเข้าถึง:</div>
                                                <a class="dropdown-item" href="drug_manage.php">ตรวจสอบยาในระบบ</a>
                                                <a class="dropdown-item" href="tables.php">ตรวจสอบการใช้บริการทั้งหมด</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area" id="columnchart_material"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pie Chart -->
                            <div class="col-xl-6 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">ประเภทของผู้เข้าใช้บริการ</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">ตัวเลือกการเข้าถึง:</div>
                                                <a class="dropdown-item" href="fac_manage.php">ตรวจสอบคณะหน่วยงาน</a>
                                                <a class="dropdown-item" href="index.php">โหลดหน้าใหม่</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div id="piechart" class="chart-area"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            <!-- Content Column -->
                            <div class="col-lg-6 mb-4">



                                <!-- Project Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">ยาใกล้หมด</h6>
                                    </div>
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="row">
                                                <?php $sqlq = "SELECT * FROM product WHERE product_id !=0 AND status = 1 ";
                                                $result2 = $connect->query($sqlq);

                                                while ($row2 = $result2->fetch_array()) {

                                                    if ($row2['typed'] == 1) {
                                                        $typed = "เม็ด";
                                                    } elseif ($row2['typed'] == 2) {
                                                        $typed = "กระปุก";
                                                    } elseif ($row2['typed'] == 3) {
                                                        $typed = "หลอด";
                                                    } elseif ($row2['typed'] == 4) {
                                                        $typed = "ขวด";
                                                    } elseif ($row2['typed'] == 5) {
                                                        $typed = "ซอง";
                                                    } elseif ($row2['typed'] == 6) {
                                                        $typed = "ก้าน";
                                                    } elseif ($row2['typed'] == 7) {
                                                        $typed = "มิลลิลิตร";
                                                    }



                                                    $totaldrug1 = '<div class="col-lg-4 mb-4">
                                                    <div class="card bg-danger text-white shadow">
                                                        <div class="card-body">
                                                        <a class="text-white" href="update_product.php?productId=' . $row2['product_id'] . '">
                                                        ' . $row2['product_name'] . '</a>
                                                            <div class="text-white-50"> ยาหมดสต็อก </div>
                                                        </div>
                                                    </div>
                                                </div>';
                                                    $totaldrug2 = '<div class="col-lg-4 mb-4">
                                                    <div class="card bg-warning text-white shadow">
                                                        <div class="card-body">
                                                        <a class="text-white" href="update_product.php?productId=' . $row2['product_id'] . '">
                                                        ' . $row2['product_name'] . '</a>
                                                            <div class="text-white-50">เหลือ ' . $row2['quantity'] . ' ' . $typed . '</div>
                                                        </div>
                                                    </div>
                                                </div>';
                                                    if ($row2['quantity'] < 1) {
                                                        echo $totaldrug1;
                                                    } else if ($row2['quantity'] < 20) {
                                                        echo $totaldrug2;
                                                    }
                                                }

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="col-lg-6 mb-4">
                                <!-- Illustrations -->
                                <!-- Approach -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">ยาใกล้หมดอายุ</h6>
                                    </div>
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="row">
                                                <?php $sqlw = "SELECT * FROM product WHERE product_id !=0 AND quantity > 0 AND active = 1 AND status = 1";
                                                $resultw = $connect->query($sqlw);



                                                while ($roww = $resultw->fetch_array()) {
                                                    $a1 = $roww['date'];
                                                    $a2 = date("Y/m/d");
                                                    $str_start = strtotime($a2); // ทำวันที่ให้อยู่ในรูปแบบ timestamp
                                                    $str_end = strtotime($a1); // ทำวันที่ให้อยู่ในรูปแบบ timestamp

                                                    $nseconds = $str_end - $str_start;
                                                    $ndays = round($nseconds / 86400);
                                                    $namedrugatimeout  = $roww['product_name'];
                                                    $iddrugeeditendtime = $roww['product_id'];

                                                    //echo $str_end.' '.$str_start.' '.$nseconds.' '.$ndays; 
                                                    $datecollo =
                                                        '<div class="col-lg-4 mb-4">
                                                                <div class="card bg-warning text-white shadow">
                                                                    <div class="card-body">
                                                                        <a class="text-white" href="update_product.php?productId=' . $iddrugeeditendtime . '">' . $namedrugatimeout . '</a>
                                                                      <div class="text-white-50">หมดอายุภายใน<br>' . $ndays . ' วัน</div>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                    $datecollo2 =
                                                        '<div class="col-lg-4 mb-4">
                                                                <div class="card bg-danger text-white shadow">
                                                                    <div class="card-body">
                                                                    <a class="text-white" href="update_product.php?productId=' . $iddrugeeditendtime . '">' . $namedrugatimeout . '</a>
                                                                    <div class="text-white-50">ยาหมดอายุ</div>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                    if ($ndays < 1) {
                                                        echo $datecollo2;
                                                    } else if ($ndays < 15) {
                                                        echo $datecollo;
                                                    }
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; valaya alongkorn rajabhat university</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>


        <!-- profile Modal-->
        <div class="modal fade" id="sefeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ข้อมูลส่วนตัว</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1 mb-lg-0 text-center text-nowrap">
                            <style>
                                img {
                                    border-radius: 50%;
                                }
                            </style>

                        </div>
                        <div class="form-group">
                            <div class="mb-1 mb-lg-0 text-center text-lg-start">
                                <hr>
                                <p class="lead fw-normal text-muted mb-1">ชื่อผู้ใช้: <?php echo $result['user_namel']; ?></p>
                                <p class="lead fw-normal text-muted mb-1">ประเภทผู้เปิดใช้งาน: <?php if ($result['cata'] == 1) {
                                                                                                    $cata = "นักศึกษา";
                                                                                                } elseif ($result['cata'] == 2) {
                                                                                                    $cata = "คณาจารย์";
                                                                                                } elseif ($result['cata'] == 3) {
                                                                                                    $cata = "บุคลากรสายสนับสนุน";
                                                                                                } elseif ($result['cata'] == 4) {
                                                                                                    $cata = "กลุ่มแม่บ้าน";
                                                                                                } elseif ($result['cata'] == 5) {
                                                                                                    $cata = "นักเรียนโรงเรียนโรงเรียนสาธิต";
                                                                                                }
                                                                                                echo $cata; ?></p>
                                <p class="lead fw-normal text-muted mb-1">คณะ/หน่วยงาน: <?php echo $result['fac_name']; ?></p>
                                <p class="lead fw-normal text-muted mb-1">เบอร์โทร: <?php echo $result['tel']; ?></p>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- change password -->
        <div class="modal fade" id="setpassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เปลี่ยนรหัสผ่าน</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="php_action/editPassword.php?userId=<?php echo $result['user_id']; ?>" method="post" class="user">
                            <div class="form-group">
                                <input class="form-control form-control-user" type="password" id="editPassword" name="editPassword" value="<?php echo $result['password']; ?>" placeholder="เปลี่ยนรหัสผ่าน" autocomplete="off" />
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                        <button class="btn btn-primary" type="submit" name="submit" id="submit"></i> เปลี่ยนรหัสผ่านใหม่</button> </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">คุณต้องการออกจากระบบหรือไม่?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">เลือก "ออกจากระบบ" หากต้องการออกจากหน้านี้</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                        <a class="btn btn-primary" href="login.php">ออกจากระบบ</a>
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

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

    </body>

    </html>
<?php } ?>