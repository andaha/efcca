<?php
include("apanel.php");
if(isset($_SESSION['event_title'])) {
    unset($_SESSION['event_title']);
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
                            <li class="breadcrumb-item active text-" aria-current="page">User Groups</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>User Groups</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="users.php" class="btn btn-danger">User Accounts</a>
                                                    <a href="add_usergrp.php" class="btn btn-danger">Add User Group</a>
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
                                                        <th>Group Name</th>
                                                        <th>Description</th>
                                                        <th>A C T I O N S</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $usergrps = $apanel->list_all('tbl_user_grp');
                                                        $sn = 0;
                                                        foreach($usergrps as $usergrp) {
                                                            $sn++
                                                    ?>
                                                    <tr class="linkrow" data-row-link="edit_user.php?user=<?php echo $usergrp['user_id']; ?>">
                                                        <td><?php echo $sn; ?></td>
                                                        <td><?php echo $usergrp['group_name']; ?></td>
                                                        <td><?php echo $usergrp['group_desc']; ?></td>
                                                        <td>
                                                            <a href="edit_usergrp.php?group=<?php echo $usergrp['group_id']; ?>">Edit</a> | 
                                                            <a href="?pg=usergroups.php&pk=group_id&id=<?php echo $usergrp['group_id']; ?>&tbl=tbl_user_grp" class="do-delete">Delete</a>
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