<?php
				// Connect to the database and fetch information for the page
				
				// $result = get_10_research_list ()
				$unit_query = "SELECT * FROM tr_units WHERE visible=1";
				$unit_result = mysqli_query($db_conn, $unit_query);
				//$row = mysqli_fetch_assoc($result_set);
				
				$rs_total = mysqli_num_rows($unit_result);
				if ($rs_total == 0) {
					echo "<br /><label> Unable to retrieve training unit from the Server. <br />";
				}
				else
				{
				
				?>
                <hr>
                <h3>TRAINING UNITS</h3>
                <!-- These are the Training Units in the Academy<br /> -->

              <div class="table-responsive">
              <table class="table table-stripped">
				<?php
           		
				$recno = 0; // initiate record counter to be used as S/N
				while ($row = mysqli_fetch_array($unit_result))
				{
					$recno = $recno + 1;
				?>
                 <tr>
                        
                   <td><?php echo $recno;?></td>
                   <td><a  style="font-size:10px;" href="index.php?page=unit_details&unit=<?php echo $row['tr_uid'];?>">
					<?php echo $row['tr_udesc'];?></a></td>
                        
                </tr>

					<?php if ($recno >= 6) { break; }?>
                        
                    <?php } ?>
                </table>
                </div>
					<?php
                       
                        }
                        if ($recno < $rs_total) 
                           {
                                echo '<p>Click <a href="index.php?page=training_unit">Here </a>for more..</p>';
                           }
                        echo "<br /><hr>"
					?>