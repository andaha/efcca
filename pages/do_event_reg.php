<?php
	// $db_conn = mysqli_connect("localhost", "root", "") or die(mysqli_error());
	// mysqli_select_db("efccacad", $db_conn) or die(mysqli_error());

    $event = $_GET['evid'];

    if(isset($_POST['eventRegBtn'])) {
		$photoTmpName = $_FILES['photo']['tmp_name'];
		$photo = $_FILES['photo']['name'];
		
		//Upload Event Participants Pictures to the server
		move_uploaded_file($photoTmpName, "../images/events_reg/".$photo);
		$insertSQL = sprintf("INSERT INTO `tbl_events_reg` (`eventid`, `title`, `surname`, `othernames`, `country`, `organization`, `rank`, `email`, `gsm`, `avatar`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", 
					$_POST['event'],
					$_POST['title'],
					$_POST['surname'],
					$_POST['othernames'],
					$_POST['country'],
					$_POST['organization'],
					$_POST['rank'],
					$_POST['email'],
					$_POST['gsm'],
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