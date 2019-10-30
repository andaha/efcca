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

				<!-- Content -->
               <div class="app-content">
                    <section class="section">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admininistration</li>
                            <li class="breadcrumb-item"><a href="#" class="text-muted">Training</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Courses</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Courses</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="add_Course.php" class="btn btn-danger">Add A Course</a>
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
                                                        <th>COURSE CODE</th>
<!--                                                         <th>TRAINING UNIT</th> -->                                                        
                                                        <th>Visible</th>
                                                        <th>A C T I O N S</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        //$Courses = $apanel->list_all('tbl_courses');
                                                        $Courses = $apanel->get_rec("select a.*, b.tr_udesc from tbl_courses a, tr_units b where a.tr_uid = b.tr_uid order by a.coursetitle");
                                                        $count_Course = $Courses->num_rows;
                                                        $sn = 0;
                                                        foreach($Courses as $crs) {
                                                            $sn++
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sn; ?></td>
                                                        <td><?php echo $crs['coursetitle']; ?></td>
                                                        <td><?php echo $crs['courseid']; ?></td>
<!--                                                         <td><?php // echo $crs['tr_udesc']; ?></td> -->
                                                         <td><?php  echo ($crs['visible']=="1")?"Yes":"No"; ?></td>
                                                        <td><a href="edit_course.php?course_id=<?php echo $crs['course_id']; ?>">Edit</a> | <a href="?pg=courses.php&tbl=tbl_courses&pk=course_id&id=<?php echo $crs['course_id']; ?>" class="do-delete">Delete</a> | <a href="tr_schdl.php?course_id=<?php echo $crs['course_id']; ?>&coursetitle=<?php echo $crs['coursetitle']; ?>">Schedule</a> </td>

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