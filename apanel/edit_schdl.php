<?php include("apanel.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <?php include("includes/head.phtml"); ?>
        
        <title>EFCC Academy</title>

	</head>

	<body class="app ">

		<!-- <div id="spinner"></div> -->

		<div id="app">
			<div class="main-wrapper" >
                <!-- Main Site Navigation (NavBar) -->
				<?php  include("includes/main_nav.phtml"); ?>

				<!-- Side Navigation -->
                <?php  include("includes/aside.phtml"); ?>
                
                <?php

                    /* Attach Course ID if Course was specified from previous page */
                    $crsid = "";
                    if(isset($_GET['course_id']))
                    {
                        $crsid = "a.course_id=".$_GET['course_id']." and ";
                    }
                ?> 

				<!-- Content -->
                <div class="app-content">
                    <section class="section">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Training</a></li>
                            <li class="breadcrumb-item"><a href="tr_schdl.php" class="text-muted">Training Schedules</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Update Training Schedule</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Training Schedules</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="tr_schdl.php" class="btn btn-danger">Show Calendar</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <?php

                          //  $schedules = $apanel->get_rec("select a.*, b.venue, b.startdate, b.enddate, b.duration from tbl_tr_schdl b, tbl_courses a WHERE a.schd_id={$_GET['schd_id']} and a.course_id = b.course_id order by b.startdate desc");

                            $schedules = $apanel->get_rec("select b.*, a.coursetitle from tbl_tr_schdl b, tbl_courses a WHERE $crsid b.schd_id={$_GET['schd_id']} and b.course_id = a.course_id order by b.startdate desc");

                            $rs = $schedules->fetch_assoc();
                        ?>
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Update Calendar</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post">
                                            <input type="hidden" name="schd_id" value="<?php echo $rs['schd_id']; ?>">

                                            <div class="form-group row">
                                                <label for="txtcourse_id" class="col-md-2 col-form-label">Course Title</label>
                                                <div class="col-md-10">
                                                    <select class="form-control select2" name="course_id">
 
                                                    <?php
                                                        $get_course = $apanel->get_rec("SELECT course_id, coursetitle FROM tbl_courses order by coursetitle");

                                                        foreach ($get_course as $tru) {
                                                    ?>
                                                        <option value="<?php echo $tru['course_id']; ?>" 
                                                            <?php echo ($rs['course_id'] == $tru['course_id']) ? "selected" : ""; ?>>
                                                            <?php echo $tru['coursetitle']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>                                            
                                            <div class="form-group row">
                                                <label for="txtvenue" class="col-md-2 col-form-label">Location/Venue</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="venue" id="txtvenue" placeholder="Location/Venue" required="required" value="<?php echo $rs['venue']; ?>">
                                                </div>
                                            </div>                                                              
                                            <div class="form-group row">
                                                <label for="txtduration" class="col-md-2 col-form-label">Duration</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="duration" id="txtduration" placeholder="Duration" value="<?php echo $rs['duration']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtstartdate" class="col-md-2 col-form-label">Start Date</label>
                                                <div class="col-md-3">
                                                    <input type="date" class="form-control" name="startdate" id="txtstartdate" placeholder="Start date" value="<?php echo $rs['startdate']; ?>">
                                                </div>
                                                <label for="txtenddate" class="col-md-2 col-form-label">End Date</label>
                                                <div class="col-md-3">
                                                    <input type="date" class="form-control" name="enddate" id="txtenddate" placeholder="End date" value="<?php echo $rs['enddate']; ?>">
                                                </div>
                                            </div>                                            
                                                 
                                            <div class="form-group row">
                                                <label for="txtcapacity" class="col-md-2 col-form-label">Capacity</label>
                                                <div class="col-md-2">
                                                    <input type="number" class="form-control" name="capacity" id="txtcapacity" placeholder="Capacity" value="<?php echo $rs['capacity']; ?>">
                                                </div>

                                                <label for="txtcoursecoord" class="col-md-2 col-form-label">Course Coordinator</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="coursecoord" id="txtcoursecoord" placeholder="Course Coordinator" value="<?php echo $rs['coursecoord']; ?>">
                                                </div>
                                            </div>                                                   
                                            <div class="form-group row">
                                                <label for="txtorganizer" class="col-md-2 col-form-label">Organizer</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="organizer" id="txtorganizer" placeholder="Organizer" value="<?php echo $rs['organizer']; ?>">
                                                </div>
                                            </div>                                  
                                            <div class="form-group row">
                                                <label for="txtremark" class="col-md-2 col-form-label">Remark</label>
                                                <div class="col-md-10">
                                                    <textarea rows="30" class="form-control" name="remark" id="txtremark" placeholder="remark" > <?php echo $rs['remark']; ?></textarea>
                                                </div>
                                            </div>        
                                            <div class="form-group row">
                                                <label for="txtstatus" class="col-md-2 col-form-label">Status</label>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="status">
                                                        <option value="Scheduled" <?php echo ($rs['status'] == "Scheduled") ? "selected" : ""; ?>>Scheduled</option>
                                                        <option value="Ongoing" <?php echo ($rs['status'] == "Ongoing") ? "selected" : ""; ?>>Ongoing</option>
                                                        <option value="Completed" <?php echo ($rs['status'] == "Completed") ? "selected" : ""; ?>>Completed</option>
                                                        <option value="Postponed" <?php echo ($rs['status'] == "Postponed") ? "selected" : ""; ?>>Postponed</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" class="form-control" name="year" id="txtyear" value="<?php echo $rs['year']; ?>">

                                                <label for="txtvisible" class="col-md-2 col-form-label">Visible</label>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="visible">
                                                        <option value="1"  <?php echo ($rs['visible'] == "1") ? "selected" : ""; ?>>Yes</option>
                                                        <option value="0"  <?php echo ($rs['visible'] == "0") ? "selected" : ""; ?>>No</option>
                                                    </select>
                                                </div>

                                            </div>


                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-10">
                                                    <button type="submit" class="btn btn-info" name="updSchdBtn">Save</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="Researches.php">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </section>
                </div>
                <!-- / End Content -->

                <!-- Footer -->
				<?php  include("includes/footer.phtml"); ?>

			</div>
		</div>

		<?php include("includes/scripts.phtml"); ?>
	</body>
</html>