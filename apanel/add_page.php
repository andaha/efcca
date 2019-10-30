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
                            <li class="breadcrumb-item"><a href="pages.php" class="text-muted">Pages</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Add A Page</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Page Details</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="pages.php" class="btn btn-danger">Show all Pages</a>
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
                                        <h4>New Page</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post">
                                            <div class="form-group row">
                                                <label for="pagetitle" class="col-md-3 col-form-label">Page Title</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="intro_title" id="pagetitle" placeholder="Page Title">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="pagename" class="col-md-3 col-form-label">Page Name</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="pagename" id="pagename" placeholder="Page Name">
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
                                                <label for="txtfac_desc" class="col-md-3 col-form-label">Page Content</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="intro_text" id="intro_text" placeholder="Page Content" rows="35"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-9">
                                                    <button type="submit" class="btn btn-info" name="addPageBtn">Save</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="pages.php">Cancel</button>
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