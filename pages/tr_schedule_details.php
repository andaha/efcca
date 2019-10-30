	<?php
		if(isset($_REQUEST['tr_schdl'])) {
			$tr_schdl_dtl_id = $_GET['tr_schdl'];
			
			$tr_schdl_dtl_query = "SELECT a.*, b.*, c.tr_udesc FROM tbl_courses a, tbl_tr_schdl b, tr_units c WHERE a.course_id='$tr_schdl_dtl_id' AND b.course_id='$tr_schdl_dtl_id'";
			// $tr_schdl_dtl_query = "SELECT a.*, b.* FROM tbl_courses a, tbl_tr_schdl b WHERE a.courseid='$tr_schdl_dtl_id' AND b.courseid='$tr_schdl_dtl_id'";
			$tr_schdl_dtl_result = mysqli_query($db_conn, $tr_schdl_dtl_query) or die(mysqli_error($db_conn));
			$schedule_details = mysqli_fetch_assoc($tr_schdl_dtl_result);
			$courseid = $schedule_details['schd_id'];
			
			echo "<h2>Course Schedule</h2>";
			
			echo "<h4><p>Course Code: <strong>" . "[" . $schedule_details['courseid'] ."]</strong></h4>";
			echo "<h4><p>Course Title: <strong>" . $schedule_details['coursetitle'] . "</strong></p></h4>";
			
			echo "<p>Organizer: <strong>" . $schedule_details['organizer']. "</strong><br />";

			echo "Venue: <strong>" . $schedule_details['venue']. "</strong><br />";
			echo "Scheduled Date: <strong>" . $schedule_details['startdate'] . " - " . $schedule_details['enddate'] . "</strong><br />";
			echo "Duration: <strong>" . $schedule_details['duration']. "</strong><br />";
			echo "Capacity: <strong>" . $schedule_details['capacity']. "</strong><br />";

			echo "Training Dept/Unit: <strong>" . $schedule_details['tr_udesc']. "</strong><br />";

			echo "<br />[Course Details] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Participate]";
			echo "<a href=\"index.php?page=course_details&course=".$schedule_details['course_id'].">Details</a></td>";			

			echo "<br /><hr><br /><table width=\"100%\"><tr><td>[ Click to Participate ]</td><td>&nbsp;</td><td></td><td align=\"right\"><a href=\"javascript:history.back(1);\"><< Back</td></tr></table><br /><hr><br />";

			// echo "<br /><hr><br /><table width=\"100%\"><tr><td>[ Click to Participate ]</td><td>&nbsp;</td><td></td><td align=\"right\"><a href=\"javascript:history.back(1);\"><< Back</td></tr></table><br /><hr><br />";

			if($schedule_details['courseobj']!="") {
				echo "<br /><br /><strong>Course Objective</strong>";
				echo "<p>".$schedule_details['courseobj']."</p>";
			}
			if($schedule_details['remark']!="") {
				echo "<hr /><strong>Remark</strong><br />";
				echo "<p>".$schedule_details['remark']."</p>";
			}
		}
	?>