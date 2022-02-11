<?php
session_start();
require_once 'db_connect.php';

// echo $_SESSION['userId'];
 if($_SESSION['Ulevel'] == ''){
        header("location: login.php");
    }
    if($_SESSION['Ulevel'] == '1'){
        header("location: login.php");
    }
    if($_SESSION['Ulevel'] == '3'){
        header("location: login.php");
    }
    if($_SESSION['Ulevel'] == '2'){
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT user.user_id, user.user_namel, user.fac_id,
        user.tel, user.username, user.password, user.active, user.status, 
        user.Ulevel, user.cata, user.druga, fac.fac_name FROM user 
        INNER JOIN fac ON user.fac_id = fac.fac_id WHERE user_id = {$user_id} ";
        $query = $connect->query($sql);
        $result = $query->fetch_assoc();
       
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ระบบให้บริการสุขภาพเบื้องต้น</title>
    <link rel="icon" href=" logovru2.png"/>
    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-bong"></i>
                    <span>ยาและเวชภัณท์</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
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

            <
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
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i class="fas fa-address-card"></i> <?php echo $result['user_namel']."(เจ้าหน้าที่)"; ?> </span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                        <h1 class="h3 mb-0 text-gray-800">การจัดการนำเข้ายา</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="#" data-toggle="modal" data-target="#adduserModal"><i
                                class="fas fa-download fa-sm text-white-50"></i> เพิ่มการนำเข้า</a>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ตารางข้อมูลการนำเข้ายา</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ที่</th>
                                            <th>ชื่อล็อต</th>
                                            <th>ข้อมูลเพิ่มเติม</th>
                                            <th>ปีของล็อตยา</th>
                                            <th>สถานะ</th>
                                            <th>ตัวเลือก</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ที่</th>
                                            <th>ชื่อล็อต</th>
                                            <th>ข้อมูลเพิ่มเติม</th>
                                            <th>ปีของล็อตยา</th>
                                            <th>สถานะ</th>
                                            <th>ตัวเลือก</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $sqlr = "SELECT * FROM brands WHERE brand_status = 1 " ;
                                        $resulto = $connect->query($sqlr);
                                        $x = 1;
                                        while($row = $resulto->fetch_array()) {
                                        //$result = $query->fetch_assoc();
                                        ?>
                                        <tr>
                                        <td> <?php echo $x++; ?></td>
                                            <td><?php echo $row['brand_name']; ?></td>
                                            <td><?php echo $row['infolot']; ?></td>
                                            <td><?php echo $row['yearlot']; ?></td>
                                            <td><?php  $active = "";
                                                        if($row['brand_active'] == 1) {
                                                            // activate member
                                                            $active = "<label class='label label-success'>เปิดใช้งาน</label>";
                                                        } else {
                                                            // deactivate member
                                                            $active = "<label class='label label-danger'>ปิดใช้งาน</label>";
                                                        } echo $active; ?></td>
                                            <td><div class="btn-group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    เลือก <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu"> 
                                                    <li><a class="dropdown-item" href="update_brand.php?brandId=<?php echo $row['brand_id']; ?>"> <i class="fas fa-archive"></i> แก้ไขข้อมูล</a></li>
                                                    <li><a class="dropdown-item" href="php_action/removeBrand.php?brandId=<?php echo $row['brand_id']; ?>"> <i class="fas fa-trash"> ลบ</i></a></li>       
                                                </ul>
                                                </div></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
    <div class="modal fade" id="sefeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
              <p class="lead fw-normal text-muted mb-1">ประเภทผู้เปิดใช้งาน: <?php if ($result['cata'] == 1){
                                                                    $cata ="นักศึกษา";
                                                                  }elseif($result['cata'] == 2){
                                                                    $cata ="คณาจารย์";
                                                                  }elseif($result['cata'] == 3){
                                                                    $cata ="บุคลากรสายสนับสนุน";
                                                                  }elseif($result['cata'] == 4){
                                                                    $cata ="กลุ่มแม่บ้าน";
                                                                  }elseif($result['cata'] == 5){
                                                                    $cata ="นักเรียนโรงเรียนโรงเรียนสาธิต";
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
    <div class="modal fade" id="setpassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เปลี่ยนรหัสผ่าน</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                        <form action="php_action/editPassword.php?userId=<?php echo $result['user_id']; ?>"  method="post" class="user">
                <div class="form-group">
						<input class="form-control form-control-user" type="password"  id="editPassword" name="editPassword" value="<?php echo $result['password'];?>" placeholder="เปลี่ยนรหัสผ่าน" autocomplete="off" />
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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="../login.php">ออกจากระบบ</a>
                </div>
            </div>
        </div>
    </div>

    
     
<!-- Add user Modal-->
<div class="modal fade" id="adduserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลการนำเข้า</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form class="form-horizontal" action="php_action/createBrand.php" method="post" >
                <div class="form-group">
                    <div><input type="text" class="form-control" id="brandName" placeholder="กรอกชื่อล็อตการนำเข้า" name="brandName" autocomplete="off" required></div>
                </div>
                <div class="form-group">
                    <div><input type="comment" class="form-control" id="infolot" placeholder="กรอกข้อมูลเพิ่มเติม" name="infolot" autocomplete="off"></div>
                </div>
                <div class="form-group">
                    <div><input type="month" class="form-control" id="yearlot" placeholder="เลือกปีของข้อมูล" name="yearlot" autocomplete="off"></div>
                </div>           
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                    <button class="btn btn-primary" type="submit" name="submit" id="submit"></i> เพิ่มข้อมูล</button> </form>
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

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>
<?php } ?>