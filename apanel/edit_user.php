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
                            <li class="breadcrumb-item"><a href="users.php" class="text-muted">Users</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">Edit User</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Edit User</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="users.php" class="btn btn-danger">Show all Users</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <?php
                            $get_user = $apanel->get_rec("SELECT * FROM tbl_user_accts WHERE user_id='{$_GET['user']}'");
                            $user = $get_user->fetch_assoc();
                        ?>
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Account Description</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post">
                                            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                                            <div class="form-group row">
                                                <label for="txtUsername" class="col-md-3 control-label">Username</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="username" class="form-control" id="txtUsername" placeholder="Username" value="<?php echo $user['username']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtPassword" class="col-md-3 control-label">Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" name="password" class="form-control" placeholder="Password" id="txtPassword">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtConfirmPassword" class="col-md-3 control-label">Confirm Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" placeholder="Confirm Password" id="txtConfirmPassword">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="selUserGroup" class="col-md-3 control-label">User Group</label>
                                                <div class="col-md-3">
                                                    <select name="group_id" class="form-control select2" id="selUserGroup">
                                                        <?php
                                                            $usergroups = $apanel->list_all("tbl_user_grp");
                                                            foreach($usergroups as $usergroup) {
                                                        ?>
                                                        <option value="<?php echo $usergroup['group_id']; ?>" <?php if($usergroup['group_id'] === $user['group_id']) { echo "selected"; } ?>>
                                                            <?php echo $usergroup['group_name']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="selSecretQuestion" class="col-md-3 control-label">Secret Question</label>
                                                <div class="col-md-4">
                                                    <select name="secret_quest" class="form-control select2" id="selSecretQuestion">
                                                        <option value="1"<?php if($user['group_id'] === "1") { echo "selected"; } ?>>What is your Mother's Maiden name?</option>
                                                        <option value="2"<?php if($user['group_id'] === "2") { echo "selected"; } ?>>What is the name of your Primary School?</option>
                                                        <option value="3"<?php if($user['group_id'] === "3") { echo "selected"; } ?>>Where did your first meet your spouse?</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtAnswer" class="col-md-3 control-label">Answer</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="secret_answer" class="form-control" placeholder="Answer to Secret Question" id="txtAnswer" value="<?php echo $user['secret_answer']; ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <strong class="col-md-3">Profile Information</strong>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="txtSurname" class="col-md-3">Surname</label>
                                                <div class="col-md-3">
                                                    <input type="text" name="surname" class="form-control" placeholder="Surname" id="txtSurname" value="<?php echo $user['surname']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtOthernames" class="col-md-3 control-label">Othernames</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="othernames" class="form-control" placeholder="Firstname Othername" id="txtOthernames" value="<?php echo $user['othernames']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtDesignation" class="col-md-3 control-label">Designation</label>
                                                <div class="col-md-4">
                                                    <input type="text" name="designation" class="form-control" placeholder="Designation" id="txtDesignation" value="<?php echo $user['designation']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtPhone" class="col-md-3 control-label">Phone</label>
                                                <div class="col-md-3">
                                                    <input type="text" name="gsm" class="form-control" placeholder="Phone Number" id="txtPhone" value="<?php echo $user['gsm']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="txtEmail" class="col-md-3 control-label">Email Address</label>
                                                <div class="col-md-4">
                                                    <input type="email" name="email" class="form-control" placeholder="Email Address" id="txtEmail" value="<?php echo $user['email']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <input type="hidden" name="addedby" value="<?php echo $_SESSION['username']; ?>">
                                            </div>
                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-9">
                                                    <button type="submit" class="btn btn-info" name="updUserBtn">Save</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="users.php">Cancel</button>
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