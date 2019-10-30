<!--
<div class="panel panel-danger">
	<div class="panel-heading"><b><i>Facilities in the Academy </i></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">[Home]</a></div>
	
	<div class="panel-body">
	  <ul>
		  <li><a href="#">Accommodation</a></li>
		  <li><a href="#">Catering Service</a></li>
		  <li><a href="#">Classrooms</a></li>
		  <li><a href="#">ICT Infrastructure</a></li>
		  <li><a href="#">Library Service</a></li>
		  <li><a href="#">Media and Publicity</a></li>
		  <li><a href="#">Medical Service</a></li>
		  <li><a href="#">Security</a></li>
		  <li><a href="#">Sports and Recreation</a></li>
		  <li><a href="#">Transport Service</a></li>
		</ul>
	</div>
</div>


-->
<div class="panel panel-danger">
	<div class="panel-heading"><a href="index.php?page=administration"><b>Administration</b></a><a href="index.php?page=HOMEPAGE" class="pull-right">[Home]</a></div>

	<div class="panel-body">
	  <ul>

<?php
	$facs_query = "SELECT * FROM tbl_facilities WHERE visible=1";
 	$facs_result = mysqli_query($db_conn, $facs_query) or die(mysqli_error($db_conn));
    $rowcount=mysqli_num_rows($facs_result);
	if ($rowcount>0)
	{
		$sn=0;
		while($row=mysqli_fetch_assoc($facs_result)) 
		{
			$sn=$sn+1 
		?>
<!-- 			<li><a href="index.php?page=administration&fac_id=<?php // echo $row['fac_id'];?>"><?php // echo trim($row['fac_name']);?></a></li>
 -->
			<li><a href="index.php?page=administration&fac_id=<?php echo $row['fac_id'];?>"><?php echo trim($row['fac_name']);?></a></li>
	<?php
		}
	} else {
		?>
			  <li><a href="#"><?php echo "No facility registered!";?></a></li>	

			 <?php	} ?>

		</ul>
	</div>
</div>
