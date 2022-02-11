<?php 	

require_once 'core.php';

$sql = "SELECT fac_id, fac_name, fac_active, fac_status FROM fac WHERE fac_status = 1";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 


 $activeFac = ""; 

 while($row = $result->fetch_array()) {
 	$facId = $row[0];
 	// active 
 	if($row[2] == 1) {
 		// activate member
 		$activeFac = "<label class='label label-success'>เปิดใช้งาน</label>";
 	} else {
 		// deactivate member
 		$activeFac = "<label class='label label-danger'>ปิดใช้งาน</label>";
 	}

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    ตัวเลือก <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editFacModel" onclick="editFac('.$facId.')"> <i class="glyphicon glyphicon-edit"></i> แก้ไข</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeFac('.$facId.')"> <i class="glyphicon glyphicon-trash"></i> ลบ</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		$row[1], 		
 		$activeFac,
 		$button
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);