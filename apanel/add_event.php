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
                            <li class="breadcrumb-item"><a href="events.php" class="text-muted">Events</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">New Event</li>
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
                                                    <a href="events.php" class="btn btn-danger">Show all Events</a>
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
                                        <h4>New Event</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post">

                                            <div class="form-group row">
                                                <label for="eventTitle" class="col-md-2 col-form-label">Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="event_desc" id="eventTitle" placeholder="Event Title">
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <label for="txtStartDate" class="col-md-2 col-form-label">Start Date</label>
                                                <div class="col-md-2">
                                                    <input type="date" name="startdate" class="form-control" id="txtStartDate" placeholder="dd/mm/yyyy">
                                                </div>

                                                <label for="txtEndDate" class="col-md-2 col-form-label">End Date</label>
                                                <div class="col-md-2">
                                                    <input type="date" name="enddate" class="form-control" id="txtEndDate" placeholder="mm/dd/yyyy">
                                                </div>
                                 

                                            </div>
                                            
                                            <div class="form-group row">

                                                <label for="selopenforreg" class="col-md-3 col-form-label">Open for Registration</label>
                                                <div class="col-md-2">
                                                    <select name="openforreg" class="form-control" id="selopenforreg">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>        

                                                <label for="selvisible" class="col-md-2 col-form-label">Visible</label>
                                                <div class="col-md-2">
                                                    <select name="visible" class="form-control" id="selvisible">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>                                                           
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="eventText" class="col-md-3 col-form-label">Content</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="eventdetails" id="eventText" placeholder="Content" rows="35"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="pagename" class="col-md-3 col-form-label">Contact Information</label>
                                                <div class="col-md-4">
                                                    <input type="text" name="contactperson" id="txtContactPerson" class="form-control" placeholder="Contact Person">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="email" name="email" class="form-control" id="txtEmail" placeholder="Email Address">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="gsm" class="form-control" placeholder="Phone" id="txtPhone">
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-9">
                                                    <input type="hidden" value="<?php echo $_SESSION['username']; ?>" name="added_by">
                                                    <button type="submit" class="btn btn-info" name="addEventBtn">Save</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="events.php">Cancel</button>
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