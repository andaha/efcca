<?php include("apanel.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <?php include("includes/head.phtml"); ?>
        
        <title>EFCC Academy</title>

	</head>

	<body class="app ">

		<div id="spinner"></div>

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
                            <li class="breadcrumb-item">Trainings</li>
                            <li class="breadcrumb-item"><a href="Courses.php" class="text-muted">Courses</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Add Course</li>
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
                                                    <a href="researchprops.php" class="btn btn-danger">Show all Courses</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>New Course</h4>
                                    </div>
                                    <div class="card-body">
                        
                                        <form class="form-horizontal" method="post">

                                            <input type="hidden" name="course_id" value="<?php echo $tru['course_id']; ?>">

                                            <div class="form-group row">
                                            <label for="txtvisible" class="col-md-2 col-form-label">Training Unit</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="tr_uid">
 
                                                    <?php

                                                        $get_trunit = $apanel->get_rec("SELECT tr_uid, tr_udesc, tr_uhod FROM tr_units order by tr_udesc");

                                                        foreach ($get_trunit as $tru) {
                                                    ?>
                                                        <option value="<?php echo $tru['tr_uid']; ?>">
                                                            <?php echo $tru['tr_udesc']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="txtcoursetitle" class="col-md-2 col-form-label">Course Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="coursetitle" id="txtcoursetitle" placeholder="Course Title" required="required">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="txtCourseid" class="col-md-2 col-form-label">Course Code</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="courseid" id="txtCourseid" placeholder="Course Code">
                                                </div>
                                            </div>                                         
                                                     
                                            <div class="form-group row">
                                                <label for="txtprerequisite" class="col-md-2 col-form-label">Pre-requisite</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="prerequisite" id="txtprerequisite" placeholder="Pre-requisite">
                                                </div>
                                            </div>                                         
                                                                                                      
                                            <div class="form-group row">
                                                <label for="txtparticipants" class="col-md-2 col-form-label">Participants</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="participants" id="txtparticipants" placeholder="Category of Participants">
                                                </div>
                                            </div>                                         
                                                                                                                    
                                            <div class="form-group row">
                                                <label for="txtskill_level" class="col-md-2 col-form-label">Skill Level</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="skill_level" id="txtskill_level" placeholder="Skill Level">
                                                </div>
                                            </div>                                         
                                                                                     
                                            <div class="form-group row">
                                                <label for="txttopics" class="col-md-2 col-form-label">Topics</label>
                                                <div class="col-md-10">
                                                    <textarea rows="30" rows="30" class="form-control" name="topics" id="txttopics" placeholder="topics"></textarea>
                                                </div>
                                            </div>                                            
                                                     
                                            <div class="form-group row">
                                                <label for="txtmethodology" class="col-md-2 col-form-label">Methodology</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="methodology" id="txtmethodology" placeholder="Methodology">
                                                </div>
                                            </div>                                         
                                                               
                                            <div class="form-group row">
                                                <label for="txtcourseoffc" class="col-md-2 col-form-label">Course Officer</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="courseoffc" id="txtcourseoffc" placeholder="Course Officer">
                                                </div>
                                            </div>                                         

                                            <div class="form-group row">
                                                <label for="txtCoursecat" class="col-md-2 col-form-label">Course Category</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="coursecat" id="txtCoursecat" placeholder="Course Category">
                                                </div>
                                            </div>
                                                                                     
                                            <div class="form-group row">
                                                <label for="txtCourseobj" class="col-md-2 col-form-label">Course Objective</label>
                                                <div class="col-md-10">
                                                    <textarea rows="30" rows="30" class="form-control" name="courseobj" id="txtCourseobj" placeholder="Overview of the Course"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="txtCoursefee" class="col-md-2 col-form-label">Course Fee</label>
                                                <div class="col-md-10">
                                                    <input type="number" class="form-control" name="coursefee" id="txtCoursefee" placeholder="Course Fee">
                                                </div>
                                            </div> 

                                            <div class="form-group row">
                                                <label for="txtCourseduratn" class="col-md-2 col-form-label">Course Duration</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="courseduratn" id="txtCourseduratn" placeholder="Course Duration">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="txtdatecreated" class="col-md-2 col-form-label">Date Added</label>
                                                <div class="col-md-2">
                                                    <input type="Date" class="form-control" name="datecreated" id="txtdatecreated" placeholder="Date Added">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                            <label for="txtvisible" class="col-md-2 col-form-label">Visible</label>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="visible">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-10">
                                                    <button type="submit" class="btn btn-info" name="addCrsBtn">Save</button>
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