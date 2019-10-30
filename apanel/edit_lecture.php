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
                            <li class="breadcrumb-item"><a href="home.php" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-muted">Administration</a></li>
                            <li class="breadcrumb-item"><a href="lectures.php" class="text-muted">Lectures</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Edit Lecture</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Events</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="lectures.php" class="btn btn-danger">Show all Lectures</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <?php
                            $get_lecture = $apanel->get_rec("SELECT * FROM tbl_lecture WHERE lect_id='{$_GET['lectid']}'");
                            $lecture = $get_lecture->fetch_assoc();
                        ?>
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Lecture</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post">
                                            <input type="hidden" name="lect_id" value="<?php echo $lecture['lect_id']; ?>">
                                            <div class="form-group row">
                                                <label for="lectTitle" class="col-md-2 col-form-label">Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="lect_title" id="lectTitle" placeholder="Lecture Title" value="<?php echo $lecture['lect_title']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtLectKeyword" class="col-md-2 col-form-label">Keyword</label>
                                                <div class="col-md-3">
                                                    <input type="text" name="lect_keyw" class="form-control" id="txtLectKeyword" placeholder="dd/mm/yyyy" value="<?php echo $lecture['lect_keyw']; ?>">
                                                </div>
                                                <label for="txtLectDate" class="col-md-2 col-form-label">Lecture Date</label>
                                                <div class="col-md-2">
                                                    <input type="date" name="lect_date" class="form-control" id="txtLectDate" placeholder="mm/dd/yyyy" value="<?php echo $lecture['lect_date']; ?>">
                                                </div>
                                                <label for="selvisible" class="col-md-1 col-form-label">Visible</label>
                                                <div class="col-md-2">
                                                    <select name="visible" class="form-control" id="selvisible">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="lectAbstract" class="col-md-2 col-form-label">Content</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="lect_abstract" id="lectAbstract" placeholder="Content" rows="35"><?php echo $lecture['lect_abstract']; ?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="pagename" class="col-md-2 col-form-label">Lecturer</label>
                                                <div class="col-md-5">
                                                    <input type="text" name="lecturer" id="txtLecturer" class="form-control" placeholder="Lecturer Name" value="<?php echo $lecture['lecturer']; ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="email" name="lect_email" class="form-control" id="txtEmail" placeholder="Lecturer Email" value="<?php echo $lecture['lect_email']; ?>">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="lect_gsm" class="form-control" placeholder="Lecturer Phone" id="txtPhone" value="<?php echo $lecture['lect_gsm']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-9">
                                                    <input type="hidden" value="<?php echo $_SESSION['username']; ?>" name="addedby">
                                                    <button type="submit" class="btn btn-info" name="updLectureBtn">Save</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="lectures.php">Cancel</button>
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