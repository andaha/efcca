<?php
    include("apanel.php");
    if(!isset($_SESSION['event_title'], $_SESSION['event'])) {
        $_SESSION['event_title'] = $_GET['event_title'];
        $_SESSION['event'] = $_GET['event'];
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
                                                    <a href="add_photo.php?event=<?php echo $_SESSION['event']; ?>" class="btn btn-danger">Add Photo</a>
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
                                    <div class="card-header">
                                        <h5>Photos</h5>
                                    </div>
                                    <div class="card-body pt-3 pb-3">
                                        <div class="memberblock mb-0">
                                            <div class="row ">
                                                <?php 
                                                    $photos = $apanel->get_rec("SELECT * FROM gallery_photos WHERE event_id='{$_SESSION['event']}'");
                                                    $sn = 0;
                                                    foreach($photos as $photo) {
                                                        $sn++
                                                ?>
                                                <div class="col-lg-2 pl-1 pr-1 m-t-5 m-b-5">
                                                    <a href="" class="member"> <img src="../images/gallery/photos/<?php echo $photo['photo_filename']; ?>" alt="">
                                                    </a>
                                                        <div class="memmbername">
                                                            <span class="pull-left">
                                                                <?php echo $photo['photo_caption']; ?>
                                                            </span>
                                                            
                                                            <span class="pull-right">
                                                                <a href="edit_phhoto.php?photo=<?php echo $photo['photo_id']; ?>"><i class="fa fa-edit"></i></a>
                                                                <a href="?pg=photos.php&tbl=gallery_photos&pk=photo_id&id=<?php echo $photo['photo_id']; ?>&photo=<?php echo $photo['photo_filename']; ?>&task=delete_photo"><i class="fa fa-close"></i> </a>
                                                            </span>
                                                        </div>
                                                    <div class="text-center"></div>
                                                </div>
                                                <?php } ?>
                                            </div>
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