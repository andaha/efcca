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
                            <li class="breadcrumb-item"><a href="announcements.php" class="text-muted">Announcements</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Edit Announcement</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Announcements</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="announcements.php" class="btn btn-danger">Show all Announcements</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <?php
                            $get_announcement = $apanel->get_rec("SELECT * FROM tbl_announce WHERE ann_id='{$_GET['annid']}'");
                            $announcement = $get_announcement->fetch_assoc();
                        ?>
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Announcement</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post">
                                            <input type="hidden" name="ann_id" value="<?php echo $announcement['ann_id']; ?>">
                                            <div class="form-group row">
                                                <label for="annTitle" class="col-md-3 col-form-label">Title</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="ann_title" id="annTitle" placeholder="Announcement Title" value="<?php echo $announcement['ann_title']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="pagename" class="col-md-3 col-form-label">Date Created</label>
                                                <div class="col-md-6">
                                                    <input type="date" class="form-control" name="ann_date" id="annDate" value="<?php echo $announcement['ann_date']; ?>">
                                                </div>
                                                <label for="selvisible" class="col-md-1 col-form-label">Visible</label>
                                                <div class="col-md-2">
                                                    <select name="visible" class="form-control" id="selvisible">
                                                        <option value="1" <?php if($announcement['visible'] === "1") { echo "selected"; } ?>>Yes</option>
                                                        <option value="0" <?php if($announcement['visible'] === "0") { echo "selected"; } ?>>No</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="annText" class="col-md-3 col-form-label">Content</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="ann_text" id="annText" placeholder="Content" rows="35"><?php echo $announcement['ann_text']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-9">
                                                    <input type="hidden" value="<?php echo ($announcement['ann_id'] !== "")? $announcement['ann_by'] : $_SESSION['username']; ?>" name="ann_by">
                                                    <button type="submit" class="btn btn-info" name="updAnnBtn">Save</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="announcements.php">Cancel</button>
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