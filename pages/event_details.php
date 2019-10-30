<?php
	if(isset($_REQUEST['event_id'])) {
		$event_page = $_GET['event_id'];
		
		$event_page_query = "SELECT * FROM `tbl_events` WHERE `eventid`=$event_page AND `visible`=1 order by startdate desc ";
		$event_page_result = mysqli_query($db_conn, $event_page_query) or die(mysqli_error(""));
		$event_details = mysqli_fetch_assoc($event_page_result);
		
		echo "<h2>".$event_details['event_desc']."</h2>";
		
		echo "<p>";
		
		if($event_details['startdate'] != "") {//Display this content if startdate is not empty
			echo "Start Date: <strong>" . $event_details['startdate'] . "</strong>&nbsp;&nbsp;";
		}
		
		if($event_details['enddate'] != "") { //Display this if End Date is not empty
			echo "End Date: <strong>" . $event_details['enddate'] . "</strong>&nbsp;&nbsp;";
		}
		
		echo "</p>";
		
		echo "<p>";
		
		if($event_details['contactperson'] != "") {
			echo "Contact Person: <strong>".$event_details['contactperson']."</strong><br />";
		}
		
		if($event_details['email'] != "") {
			echo "E-mail: <strong>" . $event_details['email'] . "</strong><br />";
		}
		
		if($event_details['gsm'] != "") {
			echo "Tel: <strong>" . $event_details['gsm'] . "</strong>";
		}
       $evid = $event_details['eventid'];
       if ($event_details['openforreg']==1){
       		echo "<br /><br />[ <a href=\"index.php?page=event&action=registration&evid=$evid\" title='Register as a Participant'>Register</a> ]";
        // echo "<br /><br />[<b><u> Book for Space </u></b>]";

       }

		echo "</p>";
		
		if($event_details['eventdetails'] != "") {
			echo "<br /><hr />";
		}
		
		echo "<p>".$event_details['eventdetails']."</p>";
		echo "<br /><hr />";
	}
?>