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
                            <li class="breadcrumb-item active text-" aria-current="page">Users</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Users</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="usergroups.php" class="btn btn-danger">User Group</a>
                                                    <a href="add_user.php" class="btn btn-danger">Add User</a>
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
                                                        <th>User</th>
                                                        <th>Full Name</th>
                                                        <th>User Group</th>
                                                        <th>A C T I O N S</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $users = $apanel->list_all('tbl_user_accts');
                                                        $sn = 0;
                                                        foreach($users as $user) {
                                                            $sn++
                                                    ?>
                                                    <tr data-row-link="edit_user.php?user=<?php echo $user['user_id']; ?>">
                                                        <td><?php echo $sn; ?></td>
                                                        <td><?php echo $user['username']; ?></td>
                                                        <td><?php echo "{$user['surname']}, {$user['othernames']}"; ?></td>
                                                        <td>
                                                            <?php
                                                                $get_grp = $apanel->get_rec("SELECT group_name FROM tbl_user_grp WHERE group_id='{$user['group_id']}'");
                                                                $grp = $get_grp->fetch_assoc();
                                                                echo $grp['group_name'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="edit_user.php?user=<?php echo $user['user_id']; ?>">Edit</a> | 
                                                            <a href="?pg=users.php&pk=user_id&id=<?php echo $user['user_id']; ?>&tbl=tbl_user_accts" class="do-delete">Delete</a>
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