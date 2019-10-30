<?php include("apanel.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <?php include("includes/head.phtml"); ?>
        
        <title>EFCC Academy</title>

	</head>

	<body class="app ">

		<!-- <div id="spinner"></div> -->

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
                            <li class="breadcrumb-item"><a href="home.php" class="text-muted">Administration</a></li>
                            <li class="breadcrumb-item"><a href="researcheprops.php" class="text-muted">Researches</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Update A Research</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Research Details</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="researchprops.php" class="btn btn-danger">Show all Researches</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <?php
                            $get_res = $apanel->get_rec("SELECT * FROM researchprop WHERE res_id={$_GET['res_id']}");
                            $rs = $get_res->fetch_assoc();
                        ?>
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Update Research</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post">
                                            <input type="hidden" name="res_id" value="<?php echo $rs['res_id']; ?>">
                                        
                                            <div class="form-group row">
                                                <label for="txtres_title" class="col-md-2 col-form-label">Research Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="res_title" id="txtres_title" placeholder="Research Title" required="required" value="<?php echo $rs['res_title']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtres_abstract" class="col-md-2 col-form-label">Research Abstract</label>
                                                <div class="col-md-10">
                                                    <textarea rows="30" class="form-control" name="res_abstract" id="txtres_abstract" placeholder="Research Abstract" ><?php echo $rs['res_abstract']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtres_keywords" class="col-md-2 col-form-label">Keyword(s)</label>
                                                <div class="col-md-10">
                                                    <textarea rows="30" class="form-control" name="res_keywords" id="txtres_keywords" placeholder="Keywords"><?php echo $rs['res_keywords']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtres_date" class="col-md-2 col-form-label">Date Entered</label>
                                                <div class="col-md-3">
                                                    <input type="Date" class="form-control" name="res_date" id="txtres_date" placeholder="Research date" value="<?php echo $rs['res_date']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="txtres_detail" class="col-md-2 col-form-label">Details</label>
                                                <div class="col-md-10">
                                                    <textarea rows="60" class="form-control" name="res_detail" id="txtres_detail" placeholder="Research Details"> <?php echo $rs['res_detail']; ?></textarea>
                                                </div>
                                            </div>   

                                            <div class="form-group row">
                                                <label for="txtres_category" class="col-md-2 col-form-label">Category</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="res_category" id="txtres_category" placeholder="category" value="<?php echo $rs['res_category']; ?>">
                                                </div>

                                                <label for="txtres_status" class="col-md-2 col-form-label">Status</label>
                                                <div class="col-md-2">
                                                <select class="form-control" name="res_status">
                                                    <option value="Proposal" <?php echo ($rs['res_category'] == "Proposal") ? "selected" : ""; ?>>Proposal</option>
                                                    <option value="Ongoing" <?php echo ($rs['res_category'] == "Ongoing") ? "selected" : ""; ?>>Ongoing</option>
                                                    <option value="Completed" <?php echo ($rs['res_category'] == "Completed") ? "selected" : ""; ?>>Completed</option>
                                                </select>
                                                </div>                                                
                                            </div>


                                            <div class="form-group row">
                                                <label for="txtres_sponsor" class="col-md-2 col-form-label">Sponsor</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="res_sponsor" id="txtres_sponsor" placeholder="Sponsor" value="<?php echo $rs['res_sponsor']; ?>">
                                                </div>
                                            </div>
<!--
                                            <div class="form-group row">
                                                <label for="txtres_amount" class="col-md-2 col-form-label">Amount</label>
                                                <div class="col-md-3">
                                                    <input type="double" class="form-control" name="res_amount" id="txtres_amount" placeholder="Amount">
                                                </div>
                                            </div>

                                            <br /><legend class="small-head" style=" font-size: small; font-weight: bolder; font-style: italic; border-top:  solid; border-bottom:  solid">Contact Person</legend>
                                            

-->
                                            <br /><legend style=" font-size: small; font-weight: bolder; font-style: italic; ">Contact Person</legend><hr />


                                            <div class="form-group row">
                                                <label for="txtres_officer" class="col-md-2 col-form-label">Research Officer</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="res_officer" id="txtres_officer" placeholder="Research Officer" value="<?php echo $rs['res_officer']; ?>">
                                                </div>

                                                <label for="txtres_file" class="col-md-1 col-form-label">File No</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="fileno" id="txtres_file" placeholder="File No" value="<?php echo $rs['fileno']; ?>">
                                                </div>
                                            </div>                                            

                                            <div class="form-group row">
                                                <label for="txtres_offr_gsm" class="col-md-2 col-form-label">Phone No</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="res_offr_gsm" id="txtres_offr_gsm" placeholder="Phone No" value="<?php echo $rs['res_offr_gsm']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtres_offr_addr" class="col-md-2 col-form-label">Contact Address</label>
                                                <div class="col-md-10">
                                                    <textarea rows="30" class="form-control" name="res_offr_addr" id="txtres_offr_addr" placeholder="Contact Address"><?php echo $rs['res_offr_addr']; ?></textarea>
                                                </div>
                                            </div>                                            


                                            <br /><legend style=" font-size: small; font-weight: bolder; font-style: italic; ">Control</legend><hr />

                                            <div class="form-group row">
                                                <label for="txtopentoforum" class="col-md-2 col-form-label">Open to Forum</label>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="opentoforum">
                                                        <option value="1"  <?php echo ($rs['res_category'] == "1") ? "selected" : ""; ?>>Yes</option>
                                                        <option value="0"  <?php echo ($rs['res_category'] == "0") ? "selected" : ""; ?>>No</option>
                                                    </select>
                                                </div>

                                                <label for="txtvisible" class="col-md-2 col-form-label">Visible</label>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="visible">
                                                        <option value="1"  <?php echo ($rs['visible'] == "1") ? "selected" : ""; ?>>Yes</option>
                                                        <option value="0"  <?php echo ($rs['visible'] == "0") ? "selected" : ""; ?>>No</option>
                                                    </select>
                                                </div>

                                            </div>


                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-10">
                                                    <button type="submit" class="btn btn-info" name="updResBtn">Save</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="Researches.php">Cancel</button>
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