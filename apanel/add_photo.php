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
                            <li class="breadcrumb-item"><a href="photos.php?event=<?php echo $_GET['event']; ?>" class="text-muted">Photos</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">New Photo</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h2><?php echo $_SESSION['event_title']; ?> : Add Photo</h2>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pull-right">
                                                    <a href="photos.php?event=<?php echo $_GET['event']; ?>" class="btn btn-danger">Show all Photos</a>
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
                                        <h4>New Photo</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="event_id" value="<?php echo $_GET['event']; ?>">
                                            <div class="form-group row">
                                                <label for="txtPaperName" class="col-md-2 col-form-label">Caption</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="photo_caption" id="txtPhotoCaption" placeholder="Photo Caption">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="pickPaper" class="col-md-2 col-form-label">Photo(s)</label>
                                                <div class="col-md-9">
                                                    <input type="file" name="photo[]" multiple id="pickPhoto" placeholder="Select Photo">
                                                    <input type="hidden" name="photo_filename">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="selVisible" class="col-md-2 col-form-label">Visible</label>
                                                <div class="col-md-2">
                                                    <select name="visible" id="selVisible" class="form-control">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-9">
                                                    <input type="hidden" value="<?php echo $_SESSION['username']; ?>" name="createdby">
                                                    <button type="submit" class="btn btn-info" name="addPhotoBtn">Add</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="photos.php?event=<?php echo $_GET['event']; ?>">Cancel</button>
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