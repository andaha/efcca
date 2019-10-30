<?php
	if(isset($_REQUEST['course'])) {
		$course_dtl_id = $_GET['course'];
		
		$course_dtl_query = "SELECT * FROM `tbl_courses` WHERE `course_id`=$course_dtl_id";
		$course_dtl_result = mysqli_query($db_conn, $course_dtl_query) or die(mysqli_error($db_conn));
		$course_details = mysqli_fetch_assoc($course_dtl_result);
		
		echo "<h2>Course Details</h2>";
		
		echo "<h3>" . "[ " . $course_details['courseid'] ." ] " . $course_details['coursetitle'] . "</h3>";


		echo "Course Officer: <strong>" . $course_details['courseoffc'] . "</strong><br />";
		echo "Duration: <strong>" . $course_details['courseduratn']. "</strong><br />";

		echo "Category: <strong>" . $course_details['coursecat'] . "</strong><br />";
		echo "Course Fee: <strong>" . $course_details['coursefee'] . "</strong></p>";
		}
		if(($course_details['tr_uid']!="") && (!empty($course_details['tr_uid']))) {
			$unitSQL = "SELECT tr_udesc FROM tr_units WHERE tr_uid=" .$course_details['tr_uid'];
			$unitResult = mysqli_query($db_conn, $unitSQL) or die(mysqli_error($db_conn));
			$unit = mysqli_fetch_assoc($unitResult);
			echo "Training Unit [ Dept ]: <strong>" . $unit['tr_udesc'] . "</strong></p>";
		}


		echo '
			<table class="table table-responsive table-hover">
				<tr>
					<td>Course Officer:</td>
					<td>'. $course_details['courseoffc']  .'</td>		
				</tr>

				<tr>
					<td>Duration:</td>
					<td>'. $course_details['courseduratn']  .'</td>		
				</tr>

				<tr>
					<td>Category:</td>
					<td><strong>'. $course_details['coursecat']  .'</strong></td>		
				</tr>

				<tr>
					<td>Course Fee</td>
					<td><strong>'. $course_details['coursefee']  .'</strong></td>		
				</tr>

				<tr>
					<td>Pre-requisite:</td>
					<td><strong>'. $course_details['prerequisite']  .'</strong></td>		
				</tr>
				
				
				<tr>
					<td>Participants:</td>
					<td><strong>'. $course_details['participants']  .'</strong></td>		
				</tr>

				<tr>
					<td>Skill Level:</td>
					<td><strong>'. $course_details['skill_level']  .'</strong></td>		
				</tr>

				<tr>
					<td>Topics:</td>
					<td><strong>'. $course_details['topics']  .'</strong></td>		
				</tr>

				<tr>
					<td>Methodology:</td>
					<td><strong>'. $course_details['methodology']  .'</strong></td>		
				</tr>

				<tr>
					<td>Course Objective:</td>
					<td><strong>'. $course_details['courseobj']  .'</strong></td>		
				</tr>

			</table>';





		// echo "<table width=\"100%\"><tr><td>&nbsp;</td><td></td><td align=\"right\"><a href=\"javascript:history.back(1);\"><< Back</td></tr></table>";
		// if($course_details['courseobj']!="") {
		// 	echo "<strong>Course Objective</strong><hr />";
		// 	echo "<p>".$course_details['courseobj']."</p><hr />";
		// }
	//}
?>

<?php
	if(($course_details['course_id']!="") && (!empty($course_details['course_id']))) {
	// Run Query on database and fetch information for the page
	
	$tr_schdl_query = sprintf("SELECT a.courseid, a.coursetitle, b.venue, b.startdate, b.schd_id FROM tbl_courses a, tbl_tr_schdl b WHERE a.course_id='%s' AND b.course_id='%s'", $course_details['course_id'], $course_details['course_id']);
	$tr_schdl_result = mysqli_query($db_conn, $tr_schdl_query);
	
	$rs_tr_schdl_total = mysqli_num_rows($tr_schdl_result);
	$recno = 0; // initiate record counter to be used as S/N
	if ($rs_tr_schdl_total == 0) {
		echo "<br /><label> No Training Schedule(s) available for this Course yet. <br />";
	}
	else
	{
	
	?>
	
	<h3>Training Schedule<?php if($rs_tr_schdl_total>1) { echo "s"; } ?> for this Course</h3>
	<!-- <p>These are the the Courses Handled by this Unit</p> -->
	
	<div class="table-responsive">
    <table class="table table-stripped">
	<?php
	
	while ($row = mysqli_fetch_array($tr_schdl_result))
	{
		$recno = $recno + 1;
	?>
	 <tr>   
		<td><?php echo $recno;?></td>
		<td><a href="index.php?page=training_schedule_details&tr_schdl=<?php echo $row['courseid'];?>">
		<?php echo $row['courseid'];?> <?php echo $row['coursetitle'];?> [ <?php echo $row['venue'];?> - <?php echo $row['startdate'];?> ]</a></td>
	 </tr>
	
		<?php if ($recno >= 6) { break; }?>
			
		<?php } ?>
	</table>
    </div>
		<?php
		   
			}
			if ($recno < $rs_tr_schdl_total) 
			   {
					echo '<p><a href="index.php?page=tr_courses">More Courses</a></p>';
			   }
			echo "<br /><hr>";
	}
?>