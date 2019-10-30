<?php
	if(isset($_REQUEST['project_id'])) {
		$res_proj_page = $_GET['project_id'];
		
		$res_proj_page_query = "SELECT * FROM `researchprop` WHERE `res_id`=$res_proj_page AND `visible`=1";
		$res_proj_page_result = mysqli_query($db_conn, $res_proj_page_query) or die(mysqli_error(""));
		$resproject_details = mysqli_fetch_assoc($res_proj_page_result);
		
		echo "<h2>Research Topic</h2>";
		
		echo "<h3>" . $resproject_details['res_title'] . "</h3>";
		
		$abstract = $resproject_details['res_abstract'];
		// if (strlen($abstract)>80){				
		// 	$abstract = substr($abstract,0,30)." ... ";
		// }
		echo '
			<table class="table table-responsive table-hover">
				<tr>
					<td>Date</td>
					<td>'. $resproject_details['res_date']  .'</td>		
				</tr>

				<tr>
					<td>By</td>
					<td>'. $resproject_details['res_officer']  .'</td>		
				</tr>

				<tr>
					<td>Status</td>
					<td><strong>'. $resproject_details['res_status']  .'</strong></td>		
				</tr>

				<tr>
					<td>Keyword(s)</td>
					<td><strong>'. $resproject_details['res_keywords']  .'</strong></td>		
				</tr>

				<tr>
					<td>Abstract</td>
					<td><strong>'. $resproject_details['res_abstract']  .'</strong></td>		
				</tr>

			</table>';

			echo "<table width=\"100%\"><tr><td><a href='#' title='Download Research Outcome'>Download Research Outcome</a></td><td></td><td align=\"right\"><a href=\"javascript:history.back(1);\"><< Back</td></tr></table>";
			if($resproject_details['res_detail']!="") {
				echo "<hr />";

			echo "<h3>Details</h3>";
			echo "<p>".$resproject_details['res_detail']."</p>";
			echo "<br /><hr />";

		}	
	}
?>
