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

				<!-- Content -->
                <div class="app-content">
                    <section class="section">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php" class="text-muted">Training</a></li>
                            <li class="breadcrumb-item"><a href="courses.php" class="text-muted">Courses</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Update Course</li>
                        </ol>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Update Course</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="courses.php" class="btn btn-danger">Show all Courses</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <?php
                            $get_crs = $apanel->get_rec("SELECT * FROM tbl_courses WHERE course_id={$_GET['course_id']}");
                            $crs = $get_crs->fetch_assoc();
                        ?>
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>New Course</h4>
                                    </div>
                                    <div class="card-body">
                        
                                        <form class="form-horizontal" method="post">

                                            <input type="hidden" name="course_id" value="<?php echo $crs['course_id']; ?>">

                                            <div class="form-group row">
                                            <label for="txtvisible" class="col-md-2 col-form-label">Training Unit</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="tr_uid">
 
                                                    <?php

                                                        $get_trunit = $apanel->get_rec("SELECT tr_uid, tr_udesc, tr_uhod FROM tr_units order by tr_udesc");

                                                        foreach ($get_trunit as $tru) {
                                                    ?>

                                                        <option value="<?php echo $tru['tr_uid']; ?>" <?php echo ($tru['tr_uid'] == $crs['tr_uid']) ? "selected" : ""; ?>>
                                                            <?php echo $tru['tr_udesc']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>                                            

                                            <div class="form-group row">
                                                <label for="txtcoursetitle" class="col-md-2 col-form-label">Course Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="coursetitle" id="txtcoursetitle" placeholder="Course Title" required="required" value="<?php echo $crs['coursetitle'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="txtCourseid" class="col-md-2 col-form-label">Course Code</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="courseid" id="txtCourseid" placeholder="Course Code"  value="<?php echo $crs['courseid'] ?>">
                                                </div>
                                            </div>                                         
                                                     
                                            <div class="form-group row">
                                                <label for="txtprerequisite" class="col-md-2 col-form-label">Pre-requisite</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="prerequisite" id="txtprerequisite" placeholder="Pre-requisite" value="<?php echo $crs['prerequisite'] ?>">
                                                </div>
                                            </div>                                         
                                                                                                      
                                            <div class="form-group row">
                                                <label for="txtparticipants" class="col-md-2 col-form-label">Participants</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="participants" id="txtparticipants" placeholder="Category of Participants" value="<?php echo $crs['participants'] ?>">
                                                </div>
                                            </div>                                         
                                                                                                                    
                                            <div class="form-group row">
                                                <label for="txtskill_level" class="col-md-2 col-form-label">Skill Level</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="skill_level" id="txtskill_level" placeholder="Skill Level" value="<?php echo $crs['skill_level'] ?>">
                                                </div>
                                            </div>                                         
                                                                                     
                                            <div class="form-group row">
                                                <label for="txttopics" class="col-md-2 col-form-label">Topics</label>
                                                <div class="col-md-10">
                                                    <textarea rows="30" rows="30" class="form-control" name="topics" id="txttopics" placeholder="topics"> <?php echo $crs['topics'] ?></textarea>
                                                </div>
                                            </div>                                            
                                                     
                                            <div class="form-group row">
                                                <label for="txtmethodology" class="col-md-2 col-form-label">Methodology</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="methodology" id="txtmethodology" placeholder="Methodology" value="<?php echo $crs['methodology'] ?>">
                                                </div>
                                            </div>                                         
                                                               
                                            <div class="form-group row">
                                                <label for="txtcourseoffc" class="col-md-2 col-form-label">Course Officer</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="courseoffc" id="txtcourseoffc" placeholder="Course Officer" value="<?php echo $crs['courseoffc'] ?>">
                                                </div>
                                            </div>                                         

                                            <div class="form-group row">
                                                <label for="txtCoursecat" class="col-md-2 col-form-label">Course Category</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="coursecat" id="txtCoursecat" placeholder="Course Category" value="<?php echo $crs['coursecat'] ?>">
                                                </div>
                                            </div>
                                                                                     
                                            <div class="form-group row">
                                                <label for="txtCourseobj" class="col-md-2 col-form-label">Course Objective</label>
                                                <div class="col-md-10">
                                                    <textarea rows="30" rows="30" class="form-control" name="courseobj" id="txtCourseobj" placeholder="Overview of the Course"> <?php echo $crs['courseobj'] ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="txtCoursefee" class="col-md-2 col-form-label">Course Fee</label>
                                                <div class="col-md-10">
                                                    <input type="number" class="form-control" name="Coursefee" id="txtCoursefee" placeholder="Course Fee" value="<?php echo $crs['Coursefee'] ?>">
                                                </div>
                                            </div> 

                                            <div class="form-group row">
                                                <label for="txtCourseduratn" class="col-md-2 col-form-label">Course Duration</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="courseduratn" id="txtCourseduratn" placeholder="Course Duration" value="<?php echo $crs['courseduratn'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="txtdatecreated" class="col-md-2 col-form-label">Date Added</label>
                                                <div class="col-md-2">
                                                    <input type="Date" class="form-control" name="datecreated" id="txtdatecreated" placeholder="Date Added" value="<?php echo $crs['datecreated'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <label for="txtvisible" class="col-md-2 col-form-label">Visible</label>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="visible">
                                                        <option value="1" <?php echo ($crs['visible'] == "1") ? "selected" : "";?>>Yes</option>
                                                        <option value="0" <?php echo ($crs['visible'] == "0") ? "selected" : "";?>>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-10">
                                                    <button type="submit" class="btn btn-info" name="updCrsBtn">Save</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="Courses.php">Cancel</button>
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