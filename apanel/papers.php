<?php
    include("apanel.php");
    if(!isset($_SESSION['lect_title'])) {
        $_SESSION['lect_title'] = $_GET['lect_title'];
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
                            <li class="breadcrumb-item active text-" aria-current="page">Lecture Papers</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2><?php echo $_SESSION['lect_title']; ?> : Papers</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="lectures.php" class="btn btn-danger">Back to Lectures</a>
                                                    <a href="add_paper.php?lecture=<?php echo $_GET['lecture']; ?>" class="btn btn-danger">Add Paper</a>
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
                                                        <th>Paper Title</th>
                                                        <th>Date</th>
                                                        <th>Posted By</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $papers = $apanel->get_rec("SELECT * FROM tbl_lecture_papers WHERE lect_id='{$_GET['lecture']}'");
                                                        $sn = 0;
                                                        foreach($papers as $paper) {
                                                            $sn++
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sn; ?></td>
                                                        <td><?php echo $paper['paper']; ?></td>
                                                        <td><?php echo $paper['date_added']; ?></td>
                                                        <td><?php echo $paper['added_by']; ?></td>
                                                        <td>
                                                            <a href="?pg=papers.php?lecture=<?php echo $_GET['lecture']; ?>&pk=paper_id&id=<?php echo $paper['paper_id']; ?>&tbl=tbl_lecture_papers" class="do-delete">Delete</a>
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