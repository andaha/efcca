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
                            <li class="breadcrumb-item"><a href="#" class="text-muted">Admininistration</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Research Titles</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Research Titles</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="add_res.php" class="btn btn-danger">Add A Research</a>
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
                                                        <th>Research</th>
                                                        <th>A C T I O N S</th>
                                                        <th>Outcome</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $rs = $apanel->list_all('researchprop');
                                                        $count_res = $rs->num_rows;
                                                        $sn = 0;
                                                        foreach($rs as $res) {
                                                            $sn++
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sn; ?></td>
                                                        <td><?php echo $res['res_title']; ?></td>
                                                        <td><a href="edit_res.php?res_id=<?php echo $res['res_id']; ?>">Edit</a> | 
                                                            <a href="?pg=researchprops.php&tbl=researchprops&pk=res_id&id=<?php echo $res['res_id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');" class="do-delete">Delete</a></td>

                                                        <td><a href="#"></i> Manage Images</a></td>
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