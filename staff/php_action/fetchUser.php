<?php 	
require_once 'core.php';

$sql = "SELECT user.user_id, user.user_namel, user.user_image, user.fac_id,
 		user.tel, user.username, user.password, user.active, user.status, 
		user.Ulevel, user.cata, user.druga, fac.fac_name FROM user 
		INNER JOIN fac ON user.fac_id = fac.fac_id		
		WHERE user.status = 1";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$userId = $row[0];
 	// active 
 	if($row[7] == 1) {
 		// activate member
 		$active = "<label class='label label-success'>เปิดใช้งาน</label>";
 	} else {
 		// deactivate member
 		$active = "<label class='label label-danger'>ปิดใช้งาน</label>";
 	} // /else
	if($row[10] == 1){
		$cata ="นักศึกษา";
	}elseif($row[10] == 2){
		$cata ="คณาจารย์";
	}elseif($row[10] == 3){
		$cata ="บุคลากรสายสนับสนุน";
	}elseif($row[10] == 4){
		$cata ="กลุ่มแม่บ้าน";
	}elseif($row[10] == 5){
		$cata ="นักเรียนโรงเรียนโรงเรียนสาธิต";
	}

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    ตัวเลือก <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editUserModalBtn" data-target="#editUserModal" onclick="editUser('.$userId.')"> <i class="glyphicon glyphicon-edit"></i> แก้ไขข้อมูล</a></li>
		<li><a type="button" data-toggle="modal" id="editPasswordModalBtn" data-target="#editPasswordModal" onclick="editPassword('.$userId.')"> <i class="glyphicon glyphicon-lock"></i> เปลี่ยนรหัสผ่านของผู้ใช้</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeUserModal" id="removeUserModalBtn" onclick="removeUser('.$userId.')"> <i class="glyphicon glyphicon-trash"></i> ลบ</a></li>       
	  </ul>
	</div>';
	$fac = $row[12];
	$imageUrl = substr($row[2], 3);
	$userImage = "<img class='img-round' src='".$imageUrl."' style='height:30px; width:50px;'  />";

 	$output['data'][] = array( 		
 // image
 		$userImage,
 		// user name
 		$row[1], 
 		// tel
 		$row[4],
 		// คณะ
		$fac,
		 // quantity 
 		$cata,		 	
 		// active
 		$active,
 		// button
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);