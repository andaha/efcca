<?php
	$tr_schdl_query = "SELECT * FROM tr_units WHERE visible=1";
	$tr_schdl_result = mysqli_query($db_conn, $tr_schdl_query) or die(mysql_error());
	//$training_schedule = mysql_fetch_assoc($tr_schdl_result);
?>

<!-- <h2>Training Units</h2>
 -->
<div class="table-responsive">
  <table class="table table-stripped table-hovered">
      <tr>
        <th>S/N</th>
        <th>Unit</th>
        <th>Details</th>
      </tr>
      <?php
  		$sn=0;
  		while($row=mysqli_fetch_assoc($tr_schdl_result)) {
  		$sn=$sn+1 ?>
      <tr>
        <td><?php echo $sn; ?></td>
        <td><?php echo $row['tr_udesc']; ?></td>
        <td><a href="index.php?page=unit_details&unit=<?php echo $row['tr_uid'];?>" title="View Training Unit Details">Details</a></td>
      </tr>
      <?php } ?>
  </table>
</div>