<?php
	$lecture_papers_query = "SELECT * FROM tbl_lecture_papers";
	$lecture_papers_result = mysqli_query($db_conn, $lecture_papers_query) or die(mysqli_error());
?>

<h2>Lecture Papers Downloads</h2>
<div class="table-responsive">
<table class="table table-stripped">
    <tr>
      <th>S/N</th>
      <th>Paper</th>
      <th></th>
    </tr>
    <?php
		$sn=0;
		while($row=mysqli_fetch_assoc($lecture_papers_result)) {
		$sn=$sn+1 ?>
    <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $row['paper_name']; ?></td>
      <td><a href="downloads/papers/<?php echo $row['paper'];?>" title="View / Download Lecture Paper">Download</a></td>
    </tr>
    <?php } ?>
</table>
</div>