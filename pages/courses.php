<?php
	$courses_query = "SELECT * FROM tbl_courses WHERE visible=1";
  $courses_result = mysqli_query($db_conn, $courses_query) or die(mysqli_error());
  
//	$courses_query = "SELECT tbl_courses.*, tr_units.tr_udesc FROM tbl_courses, tr_udesc WHERE visible=1 and (tbl_courses.tr_uid = tr_units.tr_uid)";
	//$training_schedule = mysqli_fetch_assoc($tr_schdl_result);
?>

<h2>Courses</h2>
<div class="table-responsive">
<table class="table table-stripped">
    <tr>
      <th>S/N</th>
      <th>Course Title</th>
      <th>Details</th>
    </tr>
    <?php
		$sn=0;
		while($row=mysqli_fetch_assoc($courses_result)) {
		$sn=$sn+1 ?>
    <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $row['coursetitle']; ?></td>
      <td><a href="index.php?page=course_details&course=<?php echo $row['course_id'];?>" title="View Course Details">Details</a></td>
    </tr>
    <?php } ?>
</table>
</div>