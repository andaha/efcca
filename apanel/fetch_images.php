<?php

 $admin = 0;

include('dbconn.php');
$query = "SELECT * FROM tbl_images ORDER BY image_id DESC";

$stmt = $connect->prepare($query);
//$output = '';
$output = '<div class="row">';
if($stmt->execute())
{
	$result = $stmt->fetchAll();

       

	foreach ($result as $row) {
		$output .= '
	       <div class="card gks">
		       <a href="#">
					<img src="data:image/png;base64,'.base64_encode($row['images']).'" class="img-thumbnail" />
		       </a>
	         	<div class="card-body">
		            <h6 class="card-title gkstitle"><b>HRH Alh. Adamu Mailanga</b></h6>
		            <p class="card-text gkstitle2"><b>Ngolo Ngas</b></p>
		            <p class="card-text gkstitle2">Pankshin, Plateau State Ngas</p>
		            <p class="card-text gkstitle2">(+234)8143058493) - </p>
		         </div>';
		         if ($admin==1) {
		         	$output .= '
			         <div class="card-footer">
			            <a href="#" class="btn btn-primary btn-sm">Edit</a>
			            <a href="#" class="btn btn-danger btn-sm">Delete</a>
					</div>';
			}
			$output .= '
	        </div>
		';
	}
/*

	foreach ($result as $row) {
		$output .= '
		<div class="col-md-3" style="margin-bottom:16px;">
			<img src="data:image/png;base64,'.base64_encode($row['images']).'" class="img-thumbnail" />
			</div>
		';
	}

*/
}
$output .= '</div>';
echo $output;
?>
