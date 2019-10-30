<?php include("functions.php"); ?>
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
                            <li class="breadcrumb-item"><a href="Facilitiess.php" class="text-muted">Facilities</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Add A Facility</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Facility Details</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="Facilitiess.php" class="btn btn-primary">Show all Facilities</a>
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
                                        <h4>New Facility</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post">
                                            <div class="form-group row">
                                                <label for="txtFac_name" class="col-md-3 col-form-label">Name of Facility</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="fac_name" id="txtFac_name" placeholder="Facility Name">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="txtfac_desc" class="col-md-3 col-form-label">Facility Description</label>
                                                <div class="col-md-9">
                                                    <textarea rows="30" class="form-control" name="fac_desc" id="txtfac_desc" placeholder="Facility Description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtfac_date" class="col-md-3 col-form-label">Date Entered</label>
                                                <div class="col-md-5">
                                                    <input type="date" class="form-control" name="fac_date" id="txtfac_date" placeholder="Date Created">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="selvisible" class="col-md-3 col-form-label">Visible</label>
                                                <div class="col-md-5">
                                                    <select name="visible" class="form-control" id="selvisible">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>                                                    
                                            </div>
                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-9">
                                                    <button type="submit" class="btn btn-info" name="addFacBtn">Save</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="facilities.php">Cancel</button>
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