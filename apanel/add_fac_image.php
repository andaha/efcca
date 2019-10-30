<?php include("app.php"); ?>
<?php

//if(isset($_POST['addStaffBtn'])) {
//    $fields = "";
//    $vals = "";
//    
//    foreach($_POST as $field=>$val) {
//        $fields .= ", {$field}";
//        $vals .= ", {$val}";
//    }
//    $sql = "INSERT INTO tbl_staffs({$fields}) VALUES ({$vals})";
//    echo $sql;
//}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <?php include("includes/head.phtml"); ?>
        
        <title>PaySoft</title>

	</head>

	<body class="app ">

		<div id="spinner"></div>

		<div id="app">
			<div class="main-wrapper" >
                <!-- Main Site Navigation (NavBar) -->
				<?php include("includes/main_nav.phtml"); ?>

				<!-- Side Navigation -->
                <?php include("includes/aside.phtml"); ?>

				<!-- Content -->
                <div class="app-content">
                    <section class="section">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-muted">Staff Records</a></li>
                            <li class="breadcrumb-item"><a href="documentation.php" class="text-muted">Staff Documentation</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">New Staff</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Staff Documentation</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="documentation.php" class="btn btn-primary">Show All Staffs</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-horizontal" method="post" id="addStaffForm">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>New Staff</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <ul class="nav nav-tabs" id="staffTabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="official-tab" data-toggle="tab" href="#official" role="tab" aria-controls="personal" aria-selected="true">Official</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="authentication-tab" data-toggle="tab" href="#authentication" role="tab" aria-controls="authentication" aria-selected="true">Authentication</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content tab-bordered" id="staffTabsContent">
                                                        <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab2">
                                                            <div class="form-group row">
                                                                <label for="txtStaffNo" class="col-md-2 col-form-label lead">Staff No.</label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="staff_no" id="txtStaffno" placeholder="Staff No.">
                                                                </div>
                                                                <label for="txtTitle" class="col-md-2 col-form-label">Title</label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="title" id="txtTitle" placeholder="Title">
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group row">
                                                                <label for="txtFirstName" class="col-md-2 col-form-label">Staff Name</label>
                                                                <div class="col-md-3">
                                                                    <input type="text" class="form-control" name="firstname" id="txtFirstName" placeholder="First Name">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="text" class="form-control" name="surname" id="txtSurname" placeholder="Surname">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="othername" id="txtOthername" placeholder="Other Name">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="txtDoB" class="col-md-2 col-form-label">Date Of Birth</label>
                                                                <div class="col-md-3">
                                                                    <input type="date" class="form-control datepicker" name="dob" id="txtDoB" placeholder="Date Of Birth">
                                                                </div>
                                                                <label for="txtPoB" class="col-md-3 col-form-label">Place of Birth</label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="pob" id="txtPoB" placeholder="Place of Birth">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="txtSex" class="col-md-2 col-form-label">Sex</label>
                                                                <div class="col-md-3">
                                                                    <select class="form-control select2" name="sex">
                                                                        <option value="">Select...</option>
                                                                        <option value="Female">Female</option>
                                                                        <option value="Male">Male</option>
                                                                    </select>
                                                                </div>
                                                                <label for="txtMaritalStatus" class="col-md-2 col-form-label">Marital Status</label>
                                                                <div class="col-md-5">
                                                                    <select class="form-control select2" name="marital_status">
                                                                        <option value="">Select...</option>
                                                                        <option value="Divorced">Divorced</option>
                                                                        <option value="Divorcee">Divorcee</option>
                                                                        <option value="Married">Married</option>
                                                                        <option value="Single">Single</option>
                                                                        <option value="Widow">Widow</option>
                                                                        <option value="Widower">Widower</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="txtAddress" class="col-md-2 col-form-label">Address</label>
                                                                <div class="col-md-10">
                                                                    <textarea class="form-control" name="address" id="txtAddress" placeholder="Address"></textarea>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="txtNationality" class="col-md-2 col-form-label">Nationality</label>
                                                                <div class="col-md-10">
                                                                    <select class="form-control select2" name="nationality">
                                                                        <option value="">Nationality</option>
                                                                        <option value="Nigeria" selected>Nigeria</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="selState" class="col-md-2 col-form-label">State</label>
                                                                <div class="col-md-4">
                                                                    <select class="form-control select2" id="selState">
                                                                        <option value="">State of Origin</option>
                                                                        <?php 
                                                                            $states = $paysoft->list_all("tbl_states");
                                                                            foreach($states as $state) {
                                                                        ?>
                                                                        <option value="<?php echo $state['id']; ?>"><?php echo $state['state']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <input type="hidden" id="stateVal" name="state" value="">
                                                                </div>
                                                                <label for="selLGA" class="col-md-2 col-form-label">LGA</label>
                                                                <div class="col-md-4">
                                                                    <select class="form-control select2" name="lga" id="selLGA">
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="tab-pane fade" id="official" role="tabpanel" aria-labelledby="official-tab2">
                                                            
                                                            <div class="form-group row">
                                                                <label for="selOrg" class="col-md-2 col-form-label">Organization</label>
                                                                <div class="col-md-4">
                                                                    <select class="form-control" name="org" id="selOrg">
                                                                        <option value="">Select...</option>
                                                                        <?php 
                                                                            $orgs = $paysoft->list_all("tbl_orgs");
                                                                            foreach($orgs as $org) {
                                                                        ?>
                                                                        <option value="<?php echo $org['name']; ?>"><?php echo $org['name']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <label for="selDept" class="col-md-2 col-form-label">Department</label>
                                                                <div class="col-md-4">
                                                                    <select class="form-control" name="dept" id="selDept">
                                                                        <option value="">Select...</option>
                                                                        <?php 
                                                                            $depts = $paysoft->list_all("tbl_depts");
                                                                            foreach($depts as $dept) {
                                                                        ?>
                                                                        <option value="<?php echo $dept['dept']; ?>"><?php echo $dept['dept']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="selRank" class="col-md-2 col-form-label">Rank</label>
                                                                <div class="col-md-4">
                                                                    <select class="form-control" name="rank" id="selRank">
                                                                        <option value="">Select...</option>
                                                                        <?php 
                                                                            $ranks = $paysoft->list_all("tbl_ranks");
                                                                            foreach($ranks as $rank) {
                                                                        ?>
                                                                        <option value="<?php echo $rank['rank_desc']; ?>"><?php echo $rank['rank_desc']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <label for="selCadre" class="col-md-1 col-form-label">Cadre</label>
                                                                <div class="col-md-5">
                                                                    <select class="form-control" name="cadre" id="selCadre">
                                                                        <option value="">Select...</option>
                                                                        <?php 
                                                                            $cadres = $paysoft->list_all("tbl_cadres");
                                                                            foreach($cadres as $cadre) {
                                                                        ?>
                                                                        <option value="<?php echo $cadre['id']; ?>"><?php echo $cadre['cadre']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="selGrade" class="col-md-2 col-form-label">Grade Level</label>
                                                                <div class="col-md-3">
                                                                    <select class="form-control" name="gl" id="selGrade">
                                                                        <option value="">Select...</option>
                                                                        <?php 
                                                                            $grades = $paysoft->list_all("tbl_grades");
                                                                            foreach($grades as $grade) {
                                                                        ?>
                                                                        <option value="<?php echo $grade['grade']; ?>"><?php echo $grade['grade']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <label for="selSteps" class="col-md-1 col-form-label">Steps</label>
                                                                <div class="col-md-2">
                                                                    <input type="number" class="form-control" name="step" min="1" max="20">
                                                                </div>
                                                                <label for="selUnion" class="col-md-1 col-form-label">Union</label>
                                                                <div class="col-md-3">
                                                                    <select class="form-control" name="unionid" id="selUnion">
                                                                        <option value="">Select...</option>
                                                                        <?php 
                                                                            $staffunions = $paysoft->list_all("tbl_staffunion");
                                                                            foreach($staffunions as $staffunion) {
                                                                        ?>
                                                                        <option value="<?php echo $staffunion['uniondesc']; ?>"><?php echo $staffunion['uniondesc']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="txtPAppt" class="col-md-2 col-form-label">Present Appt.</label>
                                                                <div class="col-md-3">
                                                                    <input type="date" class="form-control datepicker" name="appt_date" id="txtPAppt">
                                                                </div>
                                                                <label for="selApptType" class="col-md-3 col-form-label">Type of Appointment</label>
                                                                <div class="col-md-4">
                                                                    <select class="form-control" name="appt_type" id="selApptType">
                                                                        <option value="">Select...</option>
                                                                        <option value="Attachment">Attachment</option>
                                                                        <option value="Casual">Casual</option>
                                                                        <option value="Contract">Contract</option>
                                                                        <option value="NYSC">NYSC</option>
                                                                        <option value="Permanent">Permanent</option>
                                                                        <option value="Sabatical">Sabatical</option>
                                                                        <option value="Temporary">Temporary</option>
                                                                        <option value="Other">Other</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="selSalGrp" class="col-md-2 col-form-label">Salary Group</label>
                                                                <div class="col-md-4">
                                                                    <select class="form-control" name="ssgrpid" id="selSalGrp">
                                                                        <option value=""></option>
                                                                        <?php 
                                                                            $salgrps = $paysoft->list_all("tbl_salgrp");
                                                                            foreach($salgrps as $salgrp) {
                                                                        ?>
                                                                        <option value="<?php echo $salgrp['id']; ?>"><?php echo $salgrp['name']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <label for="txtFAppt" class="col-md-3 col-form-label">First Appointment</label>
                                                                <div class="col-md-3">
                                                                    <input type="date" class="form-control datepicker" name="first_appt" id="txtFAppt">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="selPensions" class="col-md-2 col-form-label">Pensions No.</label>
                                                                <div class="col-md-3">
                                                                    <input type="text" class="form-control" name="pensions">
                                                                </div>
                                                                <label for="txtNHFNo" class="col-md-2 col-form-label">NHF No.</label>
                                                                <div class="col-md-5">
                                                                    <input type="text" class="form-control" name="nhfacno" id="txtNHFNo">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="selBank" class="col-md-2 col-form-label">Bank</label>
                                                                <div class="col-md-5">
                                                                    <select class="form-control" name="bank" id="selBank">
                                                                        <option value=""></option>
                                                                        <?php
                                                                            foreach($banks as $bank) {
                                                                        ?>
                                                                        <option value="<?php echo $bank['name']; ?>"><?php echo $bank['name']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <label for="txtAcctNum" class="col-md-2 col-form-label">Account No.</label>
                                                                <div class="col-md-3">
                                                                    <input type="text" class="form-control" name="acct_no" id="txtAcctNum">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="selBVN" class="col-md-2 col-form-label">BVN</label>
                                                                <div class="col-md-3">
                                                                    <input type="text" class="form-control" name="bvn">
                                                                </div>
                                                                <label for="txtSortcode" class="col-md-2 col-form-label">Sortcode</label>
                                                                <div class="col-md-5">
                                                                    <input type="text" class="form-control" name="sortcode" id="txtSortcode">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="tab-pane fade" id="authentication" role="tabpanel" aria-labelledby="authentication-tab2">
                                                            <div class="form-group row">
                                                                <label for="txtPassword" class="col-md-2 col-form-label">Password</label>
                                                                <div class="col-md-4">
                                                                    <input type="password" class="form-control" name="password" id="txtPassword" placeholder="Password">
                                                                </div>
                                                                <label for="txtConPasswd" class="col-md-2 col-form-label">Confirm Passwd</label>
                                                                <div class="col-md-4">
                                                                    <input type="password" class="form-control" id="txtConPasswd" placeholder="Confirm Password">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="selUsrGrp" class="col-md-2 col-form-label">User Group</label>
                                                                <div class="col-md-4">
                                                                    <select name="usrgrp" class="form-control" id="selUsrGrp">
                                                                        <option>User Group</option>
                                                                        <?php 
                                                                            try {
                                                                                $usrgrps = $paysoft->list_all("tbl_usrgrps");
                                                                                foreach($usrgrps as $usrgrp) {
                                                                            
                                                                        ?>
                                                                        <option value="<?php echo $usrgrp['usrgrp']; ?>"><?php echo $usrgrp['usrgrp']; ?></option>
                                                                        <?php }
                                                                            } catch(Exception $e) {
                                                                                echo "Error: ".$e->getMessage();
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <label for="" class="col-md-2 col-form-label"></label>
                                                                <div class="col-md-4">
                                                                    <input type="" class="form-control" id="" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="galleryItem card">
                                                        <img class="card-img-top" id="dispPhoto" src="assets/img/news/img01.jpg" alt="Staff Photo" data-text="Staff Photo">
                                                        <input type="hidden" name="picture" id="imgData">
                                                    </div>
                                                    <div class="">
                                                        <input type="file" id="pickPhoto" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                            </div>
                                            
                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-9">
                                                    <button type="submit" class="btn btn-info" name="addStaffBtn" id="addStaffBtn">Add</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="depts.php">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- / End Content -->

                <!-- Footer -->
				<?php include("includes/footer.phtml"); ?>

			</div>
		</div>
        
        <div id="cropImageModal" class="modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                 <h4 class="modal-title">Crop & Insert Image</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                      <h5>
                        <u>Note:</u>
                        <small>
                            <i>Please, adjust the image and position the exact area you want to cut within the inner frame</i>
                        </small>
                      </h5>
                  </div>
                  <div class="col-md-12 text-center">
                      <div id="cropArea" style="width:450px; margin-top: 30px;"></div>
                  </div>
                  <div class="col-md-12" style="padding-top: 30px; text-align: center;">
                      <button type="button" class="btn btn-success" id="cropImageBtn">Cut & Save</button>
                  </div>
                </div>
              </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>

		<?php include("includes/scripts.phtml"); ?>
	</body>
</html>