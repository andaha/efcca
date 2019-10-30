<?php include("functions.php"); ?>
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
         Something

				<!-- Side Navigation -->
                <?php include("includes/aside.phtml"); ?>

				<!-- Content -->
               <div class="app-content">
                    <section class="section">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="text-muted">Admininistration</a></li>
                            <li class="breadcrumb-item"><a href="facilities.php" class="text-muted">Facilities</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Images of Facility</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Facility Images</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="add_fac_image.php" class="btn btn-primary">Add an Image</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="row">

<!--
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table datatable table-striped table-bordered border-t0 text-nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Facility</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                      /*  $facs = $academy->list_all('tbl_facilities');
                                                        $count_facs = $facs->num_rows;
                                                        $sn = 0;
                                                        foreach($facs as $fac) {
                                                            $sn++
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sn; ?></td>
                                                        <td><?php echo $fac['fac_name']; ?></td>
                                                        <td>
                                                            <a href="edit_fac.php?fac_id=<?php echo $fac['fac_id']; ?>">Edit</a> | 
                                                            <a href="?pg=lgas.php&tbl=tbl_lgas&pk=id&id=<?php echo $lga['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        } 
                                                    */
                                                     ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


-->

                            <?php
                            if(isset($_GET['fac_id'])){
                                $facid=$_GET['fac_id'];

                               
                                $query = "SELECT * FROM tbl_fac_images where fac_id={$facid} ORDER BY img_id DESC";


                            }

                            $stmt = $connect->prepare($query);
                            //$output = '';
                            $output = '<div class="row">';
                            if($stmt->execute())
                            {
                                $result = $stmt->fetchAll();

                                   

                                foreach ($result as $row) {
                                    $output .= '
                                       <div class="card gks">
                                           <a href="#">
                                                <img src="data:image/png;base64,'.base64_encode($row['images']).'" class="img-thumbnail" />
                                           </a>
                                            <div class="card-body">
                                                <h6 class="card-title gkstitle"><b>HRH Alh. Adamu Mailanga</b></h6>
                                                <p class="card-text gkstitle2"><b>Ngolo Ngas</b></p>
                                                <p class="card-text gkstitle2">Pankshin, Plateau State Ngas</p>
                                                <p class="card-text gkstitle2">(+234)8143058493) - </p>
                                             </div>';
                                             if ($admin==1) {
                                                $output .= '
                                                 <div class="card-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div>';
                                        }
                                        $output .= '
                                        </div>
                                    ';
                                }

                            }
                            $output .= '</div>';
                            echo $output;

                            ?>

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