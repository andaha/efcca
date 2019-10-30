<?php
	$tr_schdl_query = "SELECT a.course_id, a.coursetitle, b.* FROM tbl_courses a, tbl_tr_schdl b WHERE b.course_id=a.course_id AND b.visible=1";
	$tr_schdl_result = mysqli_query($db_conn, $tr_schdl_query) or die(mysqli_error($db_conn));
	//$training_schedule = mysql_fetch_assoc($tr_schdl_result);
?>

<h2>Training Schedules</h2>
<div class="table-responsive">
<table class="table table-stripped">
    <tr >
      <th>S/N</th>
      <th>Course Title</th>
      <th>Date</th>
      <th>Organizer</th>
    </tr>
    <?php
		$sn=0;
		while($row=mysqli_fetch_assoc($tr_schdl_result)) {
		$sn=$sn+1 ?>
    <tr>
      <td><?php echo $sn; ?></td>
      <td><a href="index.php?page=training_schedule_details&tr_schdl=<?php echo $row['course_id'];?>"><?php echo $row['coursetitle']; ?></a></td>
      <td><?php echo $row['startdate']; ?> - <?php echo $row['enddate']; ?></td>
      <td><?php echo $row['organizer']; ?></td>
    </tr>
    <?php } ?>
</table>
</div>