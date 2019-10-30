<?php
	if(isset($_REQUEST['ann_id'])) {
		$ann_page = $_GET['ann_id'];
		
		$ann_page_query = sprintf("SELECT * FROM `tbl_announce` WHERE `ann_id`=%s AND `visible`=%d", $ann_page, 1);
		$ann_page_result = mysqli_query($db_conn, $ann_page_query) or die(mysqli_error());
		$announcement = mysqli_fetch_assoc($ann_page_result);
		
		echo "<h2>".$announcement['ann_title']."</h2>";
		if($announcement['ann_by']!="") {
			echo "<p>By: <strong>" . $announcement['ann_by'] . "</strong>&nbsp;&nbsp;";
		}
		if($announcement['ann_date']!="") {
			echo "Date <strong>" . $announcement['ann_date'] . "</strong></p>";
		}
		if($announcement['ann_text']!="") {
			echo "<br /><hr />";
		}
		echo "<p>".$announcement['ann_text']."</p>";
	}
?>