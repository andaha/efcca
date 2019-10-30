<?php
    include("apanel.php");
    if(!isset($_SESSION['event_title'])) {
        $_SESSION['event_title'] = $_GET['event_title'];
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <?php include("includes/head.phtml"); ?>
        
        <title>EFCC Academy</title>

	</head>

    <body>

    <!-- <body class="app"> 

		<div id="spinner"></div>
        -->

        <div id="app">
			<!--<div class="main-wrapper" >
                 Main Site Navigation (NavBar) -->
            <div>
				<?php include("includes/main_nav.phtml"); ?>

				<!-- Side Navigation -->
                <?php include("includes/aside.phtml"); ?>

				<!-- Content -->
               <div class="app-content">
                    <section class="section">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="text-muted">Admininistration</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Photos</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2><?php echo $_SESSION['event_title']; ?> : Photos</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="events.php" class="btn btn-danger">Back to Events</a>
                                                    <a href="add_photo.php?event=<?php echo $_GET['event']; ?>" class="btn btn-danger">Add Photo</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table datatable table-striped table-bordered border-t0 text-nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Photo</th>
                                                        <th>Date</th>
                                                        <th>Posted By</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $photos = $apanel->get_rec("SELECT * FROM gallery_photos WHERE event_id='{$_GET['event']}'");
                                                        $sn = 0;
                                                        foreach($photos as $photo) {
                                                            $sn++
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sn; ?></td>
                                                        <td><?php echo $photo['photo_filename']; ?></td>
                                                        <td><?php echo $photo['datecreated']; ?></td>
                                                        <td><?php echo $photo['createdby']; ?></td>
                                                        <td>
                                                            <a href="?pg=gallery.php?event=<?php echo $_GET['event']; ?>&pk=photo_id&id=<?php echo $photo['photo_id']; ?>&tbl=gallery_photos" class="do-delete">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- / End Content -->

                <!-- Footer -->
				<?php include("includes/footer.phtml"); ?>

			</div>
		</div>

		<?php include("includes/scripts.phtml"); ?>
	</body>
</html>