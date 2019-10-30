<?php
	if(isset($_REQUEST['lect_id'])) {
		$lecture_page = $_GET['lect_id'];
		
		$lecture_page_query = "SELECT * FROM `tbl_lecture` WHERE `lect_id`=$lecture_page";
		$lecture_page_result = mysqli_query($db_conn, $lecture_page_query) or die(mysqli_error());
		$lecture = mysqli_fetch_assoc($lecture_page_result);
		
		$numRows = mysqli_num_rows($lecture_page_result);
		
		echo "<h2>Commandant's Lecture Series</h2>";
		echo "<h3>Series Title: <small>".$lecture['lect_title']."</small></h3>";
		echo "<p>".$lecture['lect_abstract']."</p>";
	}
?>

<?php
	if($numRows > 0) {
		$lecture_papers_query = "SELECT * FROM `tbl_lecture_papers` WHERE `lect_id`=$lecture_page";
		$lecture_papers_result = mysqli_query($db_conn, $lecture_papers_query) or die(mysqli_error());
		$papers = mysqli_fetch_assoc($lecture_papers_result);
		
	}
?>
<div class="table-responsive">
<h3>Download Softcopy</h3>
		<table class="table table-stripped">
            <tr>
                <th>SN</th>
                <th>TITLE</th>
                <th></th>
            </tr>
		
		<?php $sn=0; do{ $sn=$sn+1; ?>
			<tr>
				<td><?php echo $sn; ?></td>
				<td><?php echo $papers['paper_name']; ?></td>
				<td><a href="downloads/papers/<?php echo $papers['paper']; ?>" target="_blank">Download</a></td>
			</tr>
<?php } while($papers = mysqli_fetch_assoc($lecture_papers_result)); ?>
		</table>
        </div>