<?php
	//if(isset($_REQUEST['lecture_series'])) {
		//$lecture_page = $_GET['lecture_series'];
		
		$lecture_page_query = "SELECT * FROM `tbl_lecture` WHERE `visible`=1";
		$lecture_page_result = mysqli_query($db_conn, $lecture_page_query) or die(mysqli_error());
		$lectures = mysqli_fetch_assoc($lecture_page_result);
		
?>
		<div class="table-responsive">
		<table class="table table-stripped">
            <tr>
                <th>SN</th>
                <th>TITLE</th>
                <th>DATE</th>
                <th>View Details</th>
            </tr>
		
		<?php do{ 		

			$lectureid = $lectures['lect_id'];
			$lecture_title = $lectures['lect_title'];
			$lecture_date = $lectures['lect_date'];
?>
			<tr>
				<td><?php echo $lectureid; ?></td>
				<td><?php echo $lecture_title; ?></td>
				<td><?php echo $lecture_date; ?></td>
				<td><a href="index.php?lect_id=<?php echo $lectureid; ?>">Details</a></td>
			</tr>
		<?php } while($lectures = mysqli_fetch_assoc($lecture_page_result)); ?>
		</table>
        </div>

