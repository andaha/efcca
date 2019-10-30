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
                            <li class="breadcrumb-item"><a href="papers.php?lecture=<?php echo $_GET['lecture']; ?>" class="text-muted">Papers</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">New Paper</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2><?php echo $_SESSION['lect_title']; ?> : Add Paper</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="papers.php?lecture=<?php echo $_GET['lecture']; ?>" class="btn btn-danger">Show all Papers</a>
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
                                        <h4>New Paper</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="lect_id" value="<?php echo $_GET['lecture']; ?>">
                                            <input type="hidden" name="paper">
                                            <input type="hidden" name="paper_type">
                                            <input type="hidden" name="paper_size">
                                            <input type="hidden" name="date_added">
                                            <div class="form-group row">
                                                <label for="txtPaperName" class="col-md-3 col-form-label">Paper Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="paper_name" id="txtPaperName" placeholder="Paper Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="pickPaper" class="col-md-3 col-form-label">Paper</label>
                                                <div class="col-md-9">
                                                    <input type="file" name="paperfile" id="pickPaper" placeholder="Select Paper">
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-9">
                                                    <input type="hidden" value="<?php echo $_SESSION['username']; ?>" name="added_by">
                                                    <button type="submit" class="btn btn-info" name="addPaperBtn">Add</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="papers.php?lecture=<?php echo $_GET['lecture']; ?>">Cancel</button>
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