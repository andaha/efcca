<?php
include("apanel.php");
if(isset($_SESSION['event_title'], $_SESSION['event'])) {
    unset($_SESSION['event_title']);
    unset($_SESSION['event']);
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
                            <li class="breadcrumb-item active text-" aria-current="page">Events</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>Events</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="add_event.php" class="btn btn-danger">Create New Event</a>
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
                                                        <th>Event</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>G A L L E R Y</th>
                                                        <th>A C T I O N S</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $events = $apanel->list_all('tbl_events');
                                                        $num_ann = $events->num_rows;
                                                        $sn = 0;
                                                        foreach($events as $event) {
                                                            $sn++
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sn; ?></td>
                                                        <td><?php echo $event['event_desc']; ?></td>
                                                        <td><?php echo $event['startdate']; ?></td>
                                                        <td><?php echo $event['enddate']; ?></td>
                                                        <td>
                                                            <a href="photos.php?event=<?php echo $event['eventid']; ?>&event_title=<?php echo $event['event_desc']; ?>">Manage Photos</a>
                                                        </td>
                                                        <td>
                                                            <a href="edit_event.php?eventid=<?php echo $event['eventid']; ?>">Edit</a> | 
                                                            <a href="?pg=events.php&pk=eventid&id=<?php echo $event['eventid']; ?>&tbl=tbl_events" class="do-delete">Delete</a>
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