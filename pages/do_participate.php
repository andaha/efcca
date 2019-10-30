<?php
	// $db_conn = mysqli_connect("localhost", "root", "") or die(mysqli_error());
	// mysqli_select_db($db_conn, "efccacad") or die(mysqli_error());

    $courseid = $_POST['schdid'];
	$schd_id = $_POST['courseid'];

    if(isset($_POST['coursePartBtn'])) {
		$photoTmpName = $_FILES['photo']['tmp_name'];
		$photo = $_FILES['photo']['name'];
		
		//Upload Course Participant Picture to the server
		move_uploaded_file($photoTmpName, "../images/course_participants/".$photo);
		$insertSQL = sprintf("INSERT INTO `participants` (`schd_id`, `firstname`, `othernames`, `fileno`, `address`, `gsm`, `email`, `office`, `part_remark`, `external`, `courseid`, `year`, `avatar`) VALUES (%s, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", 
					$schd_id,
					$_POST['firstname'],
					$_POST['othernames'],
					$_POST['fileno'],
					$_POST['address'],
					$_POST['gsm'],
					$_POST['email'],
					$_POST['office'],
					$_POST['part_remark'],
					$_POST['external'],
					$_POST['courseid'],
					$_POST['year'],
					$photo);
		$insertResult = mysqli_query($db_conn, $insertSQL) or die(mysqli_error());
		if(!$insertResult) {
			header("Location: index.php?page=event_registration&event_reg_status=0");
		} else {
			$event = $_POST['event'];
			header("Location: ../index.php?page=event&action=registration&evid=$event&event_reg_status=1");
		}
    }
?>