                 
                <?php 
				// Connect to the database and fetch information for the page
				
				// $eventsSQL = sprintf("SELECT * FROM tbl_events WHERE visible=1");
				$eventsSQL = "SELECT * FROM tbl_events WHERE `visible`=1";
				$eventsResult = mysqli_query($db_conn, $eventsSQL) or die(mysqli_error($db_conn));
//                $rs_events = mysqli_fetch_assoc($eventsResult);
				$rno = mysqli_num_rows($eventsResult);
				// if ($rs_events == 0) {
				if ($rno == 0) {
					echo "<br /><label> Unable to retrieve events from the Server. <br />";
				} else {
				
				?>

                  
    				<h2>Events</h2>
					  <br />
		
<!--
					  <table border="2" class="tablelist2">
						<tr>
						  <th width="41" align="center" scope="col">SN</th>
						  <th align="left" scope="col">EVENTS</th>
						</tr>
-->
				<?php
           		
				$recno = 0; // initiate record counter to be used as S/N
				while ($rs_events = mysqli_fetch_assoc($eventsResult))
				{
					$recno = $recno + 1;
				?>
<!--
						<tr>
						  <td width="42" align="center" scope="row"><?php //echo $recno;?></td>
						  <td width="413"><a href="index.php?event_id=<?php //echo $rs_events['eventid']; ?>"><?php //echo $rs_events['event_desc'];?></a></td>
						
-->
					<div class="media">
					  <a class="pull-left" href="index.php?event_id=<?php echo $rs_events['eventid']; ?>">
						<img class="media-object" src="images/eventclips/event.jpg" data-src="js/holder.js/64x64" alt="Generic placeholder image">
					  </a>
					  <div class="media-body">
						<h4 class="media-heading"><?php echo $rs_events['event_desc']; ?></h4>
					 </div>
					</div>
				<?php }} ?>
<!--		</table>-->