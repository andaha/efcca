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
                            <li class="breadcrumb-item"><a href="users.php" class="text-muted">User Groups</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">New User Group</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>New User Group</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="usergroups.php" class="btn btn-danger">Show all Users Groupd</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <?php
                            $get_usrgrp = $apanel->get_rec("SELECT * FROM tbl_user_grp WHERE group_id='{$_GET['group']}'");
                            $usergrp = $get_usrgrp->fetch_assoc();
                        ?>
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Group Description</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post">
                                            <input type="hidden" name="group_id" value="<?php echo $usergrp['group_id']; ?>">
                                            <div class="form-group row">
                                                <label for="txtGroupName" class="col-md-3 col-form-label">Group Name</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="group_name" id="txtGroupName" placeholder="Group Name" value="<?php echo $usergrp['group_name']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtDescription" class="col-md-3 col-form-label">Description</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="group_desc" id="txtDescription" placeholder="Description" value="<?php echo $usergrp['group_desc']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row overflow-hidden">
                                                <label class="col-md-3 col-form-label">Is Group Active ?</label>
                                                <div class="col-md-3">
                                                    <label class="custom-switch">
                                                        <input type="checkbox" name="active" value="1" <?php if($usergrp['active'] === "1") { echo "checked"; } ?> class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
													</label>
                                                </div>
                                            </div>
                                            <div class="form-group row overflow-hidden">
                                                <label for="selOrg" class="col-md-9 col-form-label">P E R M I S S I O N S</label>
                                            </div>
                                            <div class="form-group row overflow-hidden">
                                                <label class="col-md-3"></label>
                                                <label for="swCanAdd" class="col-md-2 col-form-label">Can Add</label>
                                                <div class="col-md-3">
                                                    <label class="custom-switch">
                                                        <input type="checkbox" name="can_add" value="1" class="custom-switch-input" <?php if($usergrp['can_add'] === "1") { echo "checked"; } ?>>
                                                        <span class="custom-switch-indicator"></span>
													</label>
                                                </div>
                                            </div>
                                            <div class="form-group row overflow-hidden">
                                                <label class="col-md-3"></label>
                                                <label for="swCanDel" class="col-md-2 col-form-label">Can Delete</label>
                                                <div class="col-md-3">
                                                    <label class="custom-switch">
                                                        <input type="checkbox" name="can_del" value="1" class="custom-switch-input" <?php if($usergrp['can_del'] === "1") { echo "checked"; } ?>>
                                                        <span class="custom-switch-indicator"></span>
													</label>
                                                </div>
                                            </div>
                                            <div class="form-group row overflow-hidden">
                                                <label class="col-md-3"></label>
                                                <label for="swCanUpd" class="col-md-2 col-form-label">Can Update</label>
                                                <div class="col-md-3">
                                                    <label class="custom-switch">
                                                        <input type="checkbox" name="can_upd" value="1" class="custom-switch-input" <?php if($usergrp['can_upd'] === "1") { echo "checked"; } ?>>
                                                        <span class="custom-switch-indicator"></span>
													</label>
                                                </div>
                                            </div>
                                            <div class="form-group row overflow-hidden">
                                                <label class="col-md-3">&nbsp;</label>
                                                <label for="swCanAdm" class="col-md-2 col-form-label">Can Admin</label>
                                                <div class="col-md-3">
                                                    <label class="custom-switch">
                                                        <input type="checkbox" name="can_adm" value="1" class="custom-switch-input" <?php if($usergrp['can_adm'] === "1") { echo "checked"; } ?>>
                                                        <span class="custom-switch-indicator"></span>
													</label>
                                                </div>
                                            </div>
                                            <div class="form-group row overflow-hidden">
                                                <label class="col-md-3">&nbsp;</label>
                                                <label for="sswCanApprv" class="col-md-2 col-form-label">Can Approve</label>
                                                <div class="col-md-3">
                                                    <label class="custom-switch">
                                                        <input type="checkbox" name="can_apprv" value="1" class="custom-switch-input" <?php if($usergrp['can_apprv'] === "1") { echo "checked"; } ?>>
                                                        <span class="custom-switch-indicator"></span>
													</label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="addedby" value="<?php echo $_SESSION['username']; ?>">
                                            <div class="form-group row overflow-hidden">
                                            </div>
                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-9">
                                                    <button type="submit" class="btn btn-info" name="updUserGrpBtn">Save</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="usergroups.php">Cancel</button>
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