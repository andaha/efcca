<?php
$recno = "";
	if(isset($_REQUEST['unit'])) {
		$unit_dtl_id = $_GET['unit'];
		
		$unit_detail_query = "SELECT * FROM `tr_units` WHERE `tr_uid`=$unit_dtl_id AND `visible`=1";
		$unit_detail_result = mysqli_query($db_conn, $unit_detail_query) or die(mysqli_error());
		$unit_details = mysqli_fetch_assoc($unit_detail_result);
		
		echo "<h2>Training Unit</h2>";
		
		echo "<h3>" . $unit_details['tr_udesc'] . "</h3>";
		
		if($unit_details['tr_uhod']!="") {
			echo "HoD: <strong>" . $unit_details['tr_uhod'] . "</strong><br />";
		}
		
		echo "<table width=\"100%\"><tr><td>&nbsp;</td><td></td><td align=\"right\"><a href=\"javascript:history.back(1);\"><< Back</td></tr></table>";
		if($unit_details['tr_uoverview']!="") {
			echo "<hr /><br />";
		}
		echo "<p>".$unit_details['tr_uoverview']."</p>";
		echo "<br /><hr />";
	}
?>

<?php
				// Connect to the database and fetch information for the page
				
				// $result = get_10_research_list ()
				$course_query = "SELECT * FROM tbl_courses WHERE tr_uid=$unit_dtl_id AND visible=1";
				$course_result = mysqli_query($db_conn, $course_query);
				//$row = mysqli_fetch_assoc($result_set);
				
				$rs_course_total = mysqli_num_rows($course_result);
				if ($rs_course_total == 0) {
					echo "<br /><label> No Course(s) available for this Unit yet. <br />";
				}
				else
				{
				
				?>

                <h3>Courses this Unit handles</h3>
                <p>These are the the Courses Handled by this Unit</p>

              <div class="table-responsive">
              <table class="table table-stripped">
				<?php
           		
				$recno = 0; // initiate record counter to be used as S/N
				while ($row = mysqli_fetch_array($course_result))
				{
					$recno = $recno + 1;
				?>
                 <tr>   
                    <td><?php echo $recno;?></td>
                    <td><a href="index.php?page=course_details&course=<?php echo $row['course_id'];?>">
                    <?php echo $row['coursetitle'];?></a></td>
                 </tr>

					<?php if ($recno >= 6) { break; }?>
                        
                    <?php } ?>
                </table>
                </div>
					<?php
                       
                        }
                        if ($recno < $rs_course_total) 
                           {
                                echo '<p><a href="index.php?page=tr_courses">More Courses</a></p>';
                           }
                        echo "<br /><hr>"
					?>