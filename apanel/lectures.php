<?php
include("apanel.php");
if(isset($_SESSION['lect_title'])) {
    unset($_SESSION['lect_title']);
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
                            <li class="breadcrumb-item active text-" aria-current="page">Lectures</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Lectures</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="add_lecture.php" class="btn btn-danger">Add New Lecture</a>
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
                                                        <th>Lecture Title</th>
                                                        <th>Date</th>
                                                        <th>Posted By</th>
                                                        <th>P A P E R S</th>
                                                        <th>A C T I O N S</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $lectures = $apanel->list_all('tbl_lecture');
                                                        $sn = 0;
                                                        foreach($lectures as $lecture) {
                                                            $sn++
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sn; ?></td>
                                                        <td><?php echo $lecture['lect_title']; ?></td>
                                                        <td><?php echo $lecture['lect_date']; ?></td>
                                                        <td><?php echo $lecture['addedby']; ?></td>
                                                        <td>
                                                            <a href="papers.php?lecture=<?php echo $lecture['lect_id']; ?>&lect_title=<?php echo $lecture['lect_title']; ?>">Manage Papers</a>
                                                        </td>
                                                        <td>
                                                            <a href="edit_lecture.php?lectid=<?php echo $lecture['lect_id']; ?>">Edit</a> | 
                                                            <a href="?pg=lectures.php&pk=lect_id&id=<?php echo $lecture['lect_id']; ?>&tbl=tbl_lectures" class="do-delete">Delete</a>
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