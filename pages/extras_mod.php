<hr />
<?php 
/*
    if(isset($_GET['page']) == "events" 
        || (isset($_GET['page']) == "event" && isset($_GET['action']) == "registration")) 
        // || isset($thispage) == "HOMEPAGE") 
    { 
 */
?>
<?php 
    if(isset($_GET['page']) == "event" && isset($_GET['action']) == "registration")
        // || isset($thispage) == "HOMEPAGE") 
    { 
?>
<div class="row">
<div class="col-xs-12">
	
<div class="panel panel-default">
<div class="panel-heading">E V E N T S</div>
<div class="panel-body">
<?php
    $event_range = 6;
    $rs_event = get_event($event_range);
    // get the number of rows in the result
    $numrows = mysqli_num_rows($rs_event);
    
    if ($numrows <> 0)  
    {
            echo "<ul>";
            $i=1;
            $sn=0;
            while ($event_row = mysqli_fetch_array($rs_event))
            {
                $sn=$sn+1;
                $event_id = $event_row['eventid'];
                $event_desc = $event_row['event_desc'];
                $startdate = $event_row['startdate'];
                
                if (strlen($event_desc)>40)	// strip/truncate the news title to 40 and add '...'
                {
                    $event_desc = substr($event_desc,0,36)." ... [".startdate."]";
                }
                
                echo "<li>";
                echo "<a href=\"index.php?event_id=". $event_id."\">("
                    . $sn . ") ". $event_desc." [".$startdate."]</a><br>";
                echo "</li>";
                
                $i=$i+1;
                if($i>$event_range)
                break;
            }
            if ($numrows>$event_range)
            {
                echo "<br /><br /><a href=\"index.php\">Click here for more ...</a><br /><br />";
            }
    
            //echo '</div>';
    }
?>
</div>
</div>
</div>
</div>
<hr>
<?php } ?>

<?php 
    if(isset($_GET['page']) == "training_unit" 
    || isset($_GET['page']) == "unit_details" 
    || isset($_GET['page']) == "course_details" 
    || isset($_GET['page'])=="tr_courses") 
   // || isset($thispage) == "HOMEPAGE") 
        { 
?>
<div class="row">
<div class="col-xs-12">
<div class="panel panel-default">
<div class="panel-heading">T R A I N I N G &nbsp;&nbsp; S C H E D U L E</div>
<div class="panel-body">
	<?php
		$tr_range = 6;
		$rs_tr = get_tschdl($tr_range);
		// get the number of rows in the result
		$numrows = mysqli_num_rows($rs_tr);

		if ($numrows == 0)  {
			echo "<br /><ul><li><label> No Course has been registered yet! </b></label></li></ul><br />";
		}
		else

		echo "<ul>";
		$i=1;
		$sn=0;
		while ($tr_row = mysqli_fetch_array($rs_tr))
		{
			$sn=$sn+1;
			$courseid = $tr_row['courseid'];
			$coursetitle = $tr_row['coursetitle'];
			$schd_id = $tr_row['schd_id'];
			$venue = $tr_row['venue'];
			$startdate = $tr_row['startdate'];

		   // if (strlen($coursetitle)>40)	// strip/truncate the news title to 40 and add '...'
			//{
			//    $coursetitle = substr($coursetitle,0,36)." ... [".startdate."]";
		   // }

			echo "<li>";
			echo "<a href=\"index.php?page=training_schedule_details&tr_schdl=". $courseid."\">(". $sn . ") " .$coursetitle." [".
					trim($venue)." - ".$startdate."]</a><br>";
			echo "</li>";

			$i=$i+1;
			if($i>$tr_range)
			break;
		}
		if ($numrows>$tr_range)
		{
			echo "<br /><br /><a href=\"index.php\">Click here for more ...</a><br /><br />";
		}

	?>
</div>
</div>
</div>
</div>
<hr>
<?php } ?>

<?php 
    if(isset($_GET['page']) == "research" 
    || isset($_GET['page']) == "research_project_list" 
    || isset($_GET['page']) == "project_details" )
    // || isset($thispage) == "HOMEPAGE") 
        { 
?>
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">COMMANDANT&sbquo;S LECTURE SERIES</div>
			<div class="panel-body">
				<?php				
					$lect_range = 6;
					$rs_lect = get_lecture($lect_range);
					// get the number of rows in the result
					$numrows = mysqli_num_rows($rs_lect);
					
					if ($numrows == 0)  {
						echo "<br /><ul><li><label> No Paper has been registered yet! </b></label></li></ul><br />";
					}
					else
					
					echo "<ul>";
					$i=1;
					while ($lect_row = mysqli_fetch_array($rs_lect))
					{
						$lect_id = $lect_row['lect_id'];
						$lect_title = $lect_row['lect_title'];
						$lect_date = $lect_row['lect_date'];
						
						if (strlen($lect_title)>40)	// strip/truncate the news title to 40 and add '...'
						{
							$lect_title = substr($lect_title,0,36)." ... [".lect_date."]";
						}
						
						echo "<li>";
						echo "<a href=\"index.php?lect_id=". $lect_id."\">".$lect_title." [".$lect_date."]</a><br>";
						echo "</li>";
						
						$i=$i+1;
						if($i>$lect_range)
						break;
					}
					if ($numrows>$lect_range)
					{
						echo "<br /><br /><a href=\"index.php\">Click here for more ...</a><br /><br />";
					}
					
				?>
			</div>
		</div>
	</div>
</div>
<?php } ?>
