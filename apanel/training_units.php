<?php include("apanel.php"); ?>
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
                            <li class="breadcrumb-item">Admininistration</li>
                            <li class="breadcrumb-item"><a href="#" class="text-muted">Training</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Training Units</li>
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
                                                    <a href="add_trunit.php" class="btn btn-danger">Add A Unit</a>
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
                                                        <th>Training Unit</th>
                                                        <th>A C T I O N S</th>
                                                        <th>Courses</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $tru = $apanel->list_all('tr_units');
                                                        $count_trunit = $tru->num_rows;
                                                        $sn = 0;
                                                        foreach($tru as $trunit) {
                                                            $sn++
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sn; ?></td>
                                                        <td><?php echo $trunit['tr_udesc']; ?></td>
                                                        <td><a href="edit_trunit.php?tr_uid=<?php echo $trunit['tr_uid']; ?>">Edit</a> | 
                                                            <a href="?pg=training_units.php&tbl=tr_units&pk=tr_uid&id=<?php echo $trunit['tr_uid']; ?>" class="do-delete">Delete</a></td>

                                                        <td><a href="#"></i>Update Courses</a></td>
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