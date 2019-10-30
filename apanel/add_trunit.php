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
                            <li class="breadcrumb-item">Training</li>
                            <li class="breadcrumb-item"><a href="training_units.php" class="text-muted">Training Units</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Add Training Unit</li>
                        </ol>
                       
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Training Units</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="researchprops.php" class="btn btn-danger">Show all Units</a>
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
                                        <h4>New Training Unit</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post">
                                            <div class="form-group row">
                                                <label for="txttr_udesc" class="col-md-2 col-form-label">Name of Unit</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="tr_udesc" id="txttr_udesc" placeholder="Name of Unit" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txttr_uoverview" class="col-md-2 col-form-label">Overview of the Unit</label>
                                                <div class="col-md-10">
                                                    <textarea rows="30" rows="30" class="form-control" name="tr_uoverview" id="txttr_uoverview" placeholder="Overview of the Unit"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txttr_uhod" class="col-md-2 col-form-label">Head of Unit</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="tr_uhod" id="txttr_uhod" placeholder="Head of Unit">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="txttr_udate" class="col-md-2 col-form-label">Date Created</label>
                                                <div class="col-md-2">
                                                    <input type="Date" class="form-control" name="tr_udate" id="txttr_udate" placeholder="Date Created">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="txttr_uremark" class="col-md-2 col-form-label">Remarks</label>
                                                <div class="col-md-10">
                                                    <textarea rows="60" rows="60" class="form-control" name="tr_uremark" id="txttr_uremark" placeholder="Remarks"></textarea>
                                                </div>
                                            </div>   
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
                                                    <button type="submit" class="btn btn-info" name="addTruBtn">Save</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="training_units.php">Cancel</button>
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