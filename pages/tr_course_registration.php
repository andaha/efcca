	<?php
		if(isset($_REQUEST['tr_schdl'])) {
			$tr_schdl_dtl_id = $_GET['tr_schdl'];
			
			$tr_schdl_dtl_query = "SELECT a.courseid, a.coursetitle, a.courseobj, b.* FROM tbl_courses a, tbl_tr_schdl b WHERE a.courseid='$tr_schdl_dtl_id' AND b.courseid='$tr_schdl_dtl_id'";
			$tr_schdl_dtl_result = mysqli_query($db_conn, $tr_schdl_dtl_query) or die(mysqli_error(""));
			$schedule_details = mysqli_fetch_assoc($tr_schdl_dtl_result);
			
			echo "<h2>Schedule Details</h2>";
			
			echo "<p>Schedule details for: <strong>" . "[ " . $schedule_details['courseid'] ." ] - " . $schedule_details['coursetitle'] . "</strong></p>";
			
			if($schedule_details['organizer']!="") {
				echo "<p>Organizer: <strong>" . $schedule_details['organizer']. "</strong><br />";
			}			
			if($schedule_details['venue']!="") {
				echo "Venue: <strong>" . $schedule_details['venue']. "</strong><br />";
			}
			echo "Date: <strong>" . $schedule_details['startdate'] . " - " . $schedule_details['enddate'] . "</strong><br />";
			
			if($schedule_details['duration']!="") {
				echo "Duration: <strong>" . $schedule_details['duration']. "</strong><br />";
			}
			if($schedule_details['capacity']!="") {
				echo "Capacity: <strong>" . $schedule_details['capacity']. "</strong><br />";
			}			
			if($schedule_details['started']!=0) {
				echo "Started: <strong>Yes</strong><br />";
			} else { 
				echo "Started: <strong>No</strong><br />";
			}
			if ($schedule_details['completed']!=0) {
				echo "Completed: <strong>Yes</strong><br />";
			} else { 
				echo "Completed: <strong>No</strong><br />";
			}
			if($schedule_details['postponed']!=0) {
				echo "Postponed: <strong>Yes</strong>";
			} else { 
				echo "Postponed: <strong>No</strong><br />";
			}
			if(($schedule_details['tr_uid']!="") && (!empty($schedule_details['tr_uid']))) {
				echo "Training Unit [ Dept ]: <strong>" . $unit['tr_udesc'] . "</strong></p>";
			}
			echo "<table width=\"100%\"><tr><td><a href=\"tr_course_registration.php\">Participate</td><td>&nbsp;</td><td></td><td align=\"right\"><a href=\"javascript:history.back(1);\"><< Back</td></tr></table>";
			if($schedule_details['courseobj']!="") {
				echo "<strong>Course Objective</strong><br /><hr />";
				echo "<p>".$schedule_details['courseobj']."</p>";
			}
			if($schedule_details['remark']!="") {
				echo "<strong>Remark</strong><br /><hr />";
				echo "<p>".$schedule_details['remark']."</p>";
			}
		}
	?>