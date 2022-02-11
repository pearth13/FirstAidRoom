<?php 
session_start();
require_once 'db_connect.php';
// echo $_SESSION['userId'];
 if($_SESSION['Ulevel'] == ''){
        header("location: ../../index.php");
    }
 if($_SESSION['Ulevel'] == '3'){
?>
<?php 
$user_id = $_SESSION['user_id'];
$sql = "SELECT user.user_id, user.user_namel , user.fac_id,
user.tel, user.username, user.password, user.active, user.status, 
user.Ulevel, user.cata, user.druga, fac.fac_name FROM user 
INNER JOIN fac ON user.fac_id = fac.fac_id WHERE user_id = {$user_id}";
$query = $connect->query($sql);
$result = $query->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>การใช้บริการห้องพยาบาล</title>
  <link rel="icon" href="../admin/logovru2.png"/>
  <!--meta name="description" content="Free Bootstrap Theme by BootstrapMade.com"-->
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  <section id="home" class="banner">
    <div class="bg-color">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
              <a class="navbar-brand" href="#"><img src="img/S2.png" class="img-responsive" style="width: px; margin-top: -16px;"></a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#home">หน้าแรก</a></li>
                <li class=""><a href="#timeopen">เวลาเปิดบริการ</a></li>
                <li class=""><a href="#history">ประวัติการเข้าใช้บริการ</a></li>
                <li class=""><a href=class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">ขอรับบริการ</a></li> 
                <li class=""><a href=class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal500">ข้อมูลส่วนตัว</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <img src="img/logovru.png" class="img-responsive" style="width: px; margin-top: -16px;">
            </div>
            <div class="banner-text text-center">
              <h1 class="white">ระบบให้บริการสุขภาพเบื้องต้นห้องพยาบาล </h1>
              <p>มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์ <br> Valaya Alongkorn Rajabhat University under the Royal Patronage</p>
            </div>
            <div class="overlay-detail text-center">
              <a href="#service"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ banner-->
  <!--หน้าแรก-->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <h2 class="ser-title">หลักการให้บริการ</h2>
          <hr class="botm-line">
          <p>ห้องพยาบาลมหาวิทยาลัยราชภัฏวไลยอลงกรณ์<br>ในพระบรมราชูปถัมภ์ </p>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-stethoscope"></i>
            </div>
            <div class="icon-info">
              <h4>ปฐมพยาบาลเบื้องต้น</h4>
              <p>ปฐมพยาบาลและรักษาอาการเบื้องต้นที่เกี่ยวกับอุบัติเหตุ<br>และอาการป่วยต่างๆของนักศึกษาและบุคลากรภายในมหาวิทยาลัย </p>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-ambulance"></i>
            </div>
            <div class="icon-info">
              <h4>ติดต่อโรงพยาบาล</h4>
              <p>ประสานงานกับโรงพยาบาลในการรักษาทางการแพทย์ในระยะยาว</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <div class="icon-info">
              <h4>ให้คำปรึกษาด้านสุขภาพ</h4>
              <p>ให้คำปรึกษาเกี่ยวกับการดูแลรักษาสุขภาพและให้<br>คำปรึกษาพร้อมแนะแนวในเรื่องการประกันสังคม<br>ของรัฐบาล</p>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-medkit"></i>
            </div>
            <div class="icon-info">
              <h4>ให้บริการอุปกรณ์การแพทย์</h4>
              <p>ให้บริการยืมอุปกรณ์ทางการแพทย์ในการทำกิจกรรมต่างๆภายในและภายนอกมหาลัย</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/หน้าแรก-->
  <!--เวลาเปิดบริการ-->
  <section id="timeopen" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="section-title">
            <h2 class="head-title lg-line">เวลาเปิดให้บริการ</h2>
            <hr class="botm-line">
            <p class="sec-para"></p>
            <a href="" style="color: #0cb8b6; padding-top:10px;"></a>
          </div>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-12">
          <div style="visibility: visible;" class="col-sm-9 more-features-box">
            <div class="more-features-box-text">
              <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
              <div class="more-features-box-text-description">
                <h3>จันทร์ - ศุกร์</h3>
                <p>ตั้งแต่เวลา 08:30 - 16:30 น.</p>
              </div>
            </div>
            <div class="more-features-box-text">
              <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
              <div class="more-features-box-text-description">
                <h3>เสาร์ - อาทิตย์</h3>
                <p>ตั้งแต่เวลา 08:30 - 15:00 น.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ เวลาเปิดบริการ-->
  
  
  <!--ขอรับบริการ-->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ขอรับบริการห้องพยาบาล</h4>
        </div>
        <form action="ass/add.php?id=<?php echo $user_id; ?>"  method="post" >
        <div class="modal-body">
          <div class="form-group">
            <label for="clientContact">ข้อมูลเบื้องต้น</label>
            <input type="text" name="sick"  class="form-control" id="sick" placeholder="กรอกอาการป่วย">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
          <button type="submit" id="submit" name="submit" class="btn btn-primary">ส่งข้อมูล</button>
        </div>
        
      </form>
        </div>
        </div>
      </div>
  </div>

  <!--ข้อมูลส่วนตัว-->
  <section id="contact" class="section-padding"></section> 
    <!-- Modal -->
    <div class="modal fade" id="myModal500" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ข้อมูลส่วนตัว</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="mb-1 mb-lg-0 text-center text-nowrap">
            </div>
          </div>
          <div class="form-group">
            <div class="mb-1 mb-lg-0 text-center text-lg-start">
              <p class="lead fw-normal text-muted mb-1"><h4>ชื่อผู้ใช้: </h4><?php echo $result['user_namel']; ?></p>
              <p class="lead fw-normal text-muted mb-1"><h4>ประเภทผู้เปิดใช้งาน: </h4> <?php if($result['user_namel'] = 1){
                                                                    $cata ="นักศึกษา";
                                                                  }elseif($result['user_namel'] = 2){
                                                                    $cata ="คณาจารย์";
                                                                  }elseif($result['user_namel'] = 3){
                                                                    $cata ="บุคลากรสายสนับสนุน";
                                                                  }elseif($result['user_namel'] = 4){
                                                                    $cata ="กลุ่มแม่บ้าน";
                                                                  }elseif($result['user_namel'] = 5){
                                                                    $cata ="นักเรียนโรงเรียนโรงเรียนสาธิต";
                                                                  }
                                                                  echo $cata; ?></p>
              <p class="lead fw-normal text-muted mb-1"><h4>คณะ/หน่วยงาน: </h4><?php echo $result['fac_name']; ?></p>
              <p class="lead fw-normal text-muted mb-1"><h4>เบอร์โทร</h4><?php echo $result['tel']; ?></p>
              <p class="lead fw-normal text-muted mb-1"><h4>การแพ้ยา</h4></h4></p>

              <form action="ass/editdrug.php?id=<?php echo $result['user_id']; ?>"  method="POST" >
              <div class="modal-body">
                <div class="form-group">
                <textarea rows="5" cols="40" id="druga" name="druga" ><?php echo $result['druga']; ?></textarea>								</div>
                <button class="btn btn-success" type="submit" name="submit" id="submit"></i> บันทึกการแพ้ยา</button>
              </div>  
						</form>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
          <button type="button" id="btnSearch" class="btn btn-primary" onclick="document.location='../index.php'">ออกจากระบบ</button>
        </div>
        </div>
        </div>
      </div>
  </div>
  <!--ประวัติ-->
  <section id="history" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">ประวัติการเข้าใช้บริการ</h2>
          <hr class="botm-line">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="remove-messages"></div>           
              <table class="table" id="manageProductTable">
                                    <thead>
                                    <tr>				
                                        <th>วัน เดือน ปี</th>
                                        <th>อาการป่วย</th>							
                                        <th>ยาที่ได้รับ</th>
                                        <th>สถานะ</th>
                                    </tr>
                                    </thead>
                                    <?php $sql = "SELECT * FROM orders WHERE client_name = {$user_id} " ;
                                $result = $connect->query($sql);
                                while($row = $result->fetch_array()) {
                                //$result = $query->fetch_assoc();?>
                                    <tr>
                                        <td><?php $datet = $row['order_date']; 
                                                    $popdm= date("d/m/", strtotime($datet));
                                                    $popy= date("Y", strtotime($datet))+543;
                                        echo ($popdm.$popy);?></td>
                                        <td><?php echo $row['sick'];?></td>
                                        <td><?php
                                                        $orderid = $row['order_id'];
                                                        $sqli = "SELECT * FROM order_item INNER JOIN product ON order_item.product_id = product.product_id WHERE order_id = {$orderid} ";
                                                        $resulti = $connect->query($sqli);
                                                        while($p = $resulti->fetch_array()) {
                                                            if($p['typed'] == 1){
                                                            $typed ="เม็ด";
                                                            }elseif($p['typed'] == 2){
                                                            $typed ="กระปุก";
                                                            }elseif($p['typed'] == 3){
                                                            $typed ="หลอด";
                                                            }elseif($p['typed'] == 4){
                                                            $typed ="ขวด";
                                                            }elseif($p['typed'] == 5){
                                                            $typed ="ซอง";
                                                            }elseif($p['typed'] == 6){
                                                            $typed ="ก้าน";
                                                            }elseif($p['typed'] == 7){
                                                            $typed ="มิลลิลิตร";
                                                            }
                                                            echo $p['product_name'].' '.'('.$p[3].' '.$typed.')'.'<br>';
                                                            } ?></td>
                                        <td><?php
                                                            if($row['payment_status'] == 1) { 		
                                                            $paymentStatus = "<label class='label label-success'>ทำการรักษาสำเร็จ</label>";
                                                            } else if($row['payment_status'] == 2) { 		
                                                            $paymentStatus = "<label class='label label-info'>นอนพักรอดูอาการ</label>";
                                                            } else if($row['payment_status'] == 3) { 		
                                                            $paymentStatus = "<label class='label label-danger'>ปฏิเสธการรักษา</label>";
                                                            } else if($row['payment_status'] == 0) { 		
                                                            $paymentStatus = "<label class='label label-warning'>ยังไม่มีการตรวจรักษา</label>"; }
                                                            echo $paymentStatus; ?> </td>
                                    </tr>
                                    <?php } ?>  
                                </table>
            </div> 
        </div>
      </div>
    </div>
  </section>
  <!--/ ประวัติ-->
  <!--footer-->
  <footer id="footer">
    <div class="footer-line">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            Copyright ©  Valaya Alongkorn Rajabhat University under the Royal Patronage 2564
            <div class="credits">
               
              Designed by <a href="http://comit.vru.ac.th/">INFORMATION TECHNOLOGY</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ footer-->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
<?php }else{ header("location: ../index.php"); } ?>