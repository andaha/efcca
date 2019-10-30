<?php include("apanel.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <?php include("includes/head.phtml"); ?>
        
        <title>EFCC Academy</title>

	</head>

    <body>

    <!-- <body class="app"> 

		<div id="spinner"></div>
        -->

        <div id="app">
			<!--<div class="main-wrapper" >
                 Main Site Navigation (NavBar) -->
            <div>
				<?php include("includes/main_nav.phtml"); ?>
				<!-- Side Navigation -->
                <?php include("includes/aside.phtml"); ?>
                
                <?php

                    /* Attach Course ID if Course was specified from previous page */
                    $crsid = "";
                    $crstitle = "";
                    if(isset($_GET['course_id']))
                    {
                        $crsid = "a.course_id=".$_GET['course_id']." and ";
                        $crstitle = $_GET['coursetitle']."  :  ";
                    }
                ?> 
				<!-- Content -->
               <div class="app-content">
                    <section class="section">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="text-muted">Training</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Training Calendar</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h5><small><b><?php echo $crstitle; ?></b></small> Training Calendar  </h5>
                                            </div>
                                            <div class="col-lg-4">
                                                <span >
                                                    <a href="courses.php" class="btn btn-primary">Show Courses</a>
                                                </span>
                                                <span class="pull-right">
                                                    <a href="add_schdl.php" class="btn btn-danger">Add A Course Date</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table datatable table-striped table-bordered border-t0 text-nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>COURSE TITLE</th>
                                                        <th>DATE</th>
                                                        <th>DURATION</th>
                                                        <th>VENUE</th>
                                                        <th>STATUS</th>
                                                        <th>A C T I O N S</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 

                                                        $Calendar = $apanel->get_rec("select a.*, b.coursetitle from tbl_tr_schdl a, tbl_courses b where $crsid a.course_id = b.course_id order by a.startdate desc ");
                                                        // $Calendar = $apanel->get_rec("select a.*, b.venue, b.startdate, b.enddate, b.duration from tbl_tr_schdl b, tbl_courses a where a.course_id = b.course_id order by b.startdate desc");

                                                        $count_schdl = $Calendar->num_rows;
                                                        $sn = 0;
                                                        foreach($Calendar as $crs_schdl) {
                                                            $sn++
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sn; ?></td>
                                                       <!-- <td><?php // echo $crs_schdl['coursetitle']; ?></td>  -->
                                                        <td><?php echo $crs_schdl['coursetitle']; ?></td>
                                                        <td><?php echo "(".$crs_schdl['startdate'].") - (".$crs_schdl['enddate'].")"; ?></td>
                                                        <td><?php echo $crs_schdl['duration']; ?></td>
                                                        <td><?php echo $crs_schdl['venue']; ?></td>
                                                        <td><?php echo $crs_schdl['status']; ?></td>
                                                        <td><a href="edit_schdl.php?schd_id=<?php echo $crs_schdl['schd_id']; ?>">Edit</a> | 
                                                            <a href="?pg=tr_schdl.php&tbl=tbl_tr_schdl&pk=schd_id&id=<?php echo $crs_schdl['schd_id']; ?>" class="do-delete">Delete</a></td>

                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- / End Content -->

                <!-- Footer -->
				<?php include("includes/footer.phtml"); ?>

			</div>
		</div>

		<?php include("includes/scripts.phtml"); ?>
	</body>
</html>