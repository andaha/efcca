<?php require_once("includes/includes.php"); ?>
<?php page_header();?>

<!--
<div class="well well-sm text-danger" style="background-image: url(images/clip3.jpg);">
	<h2>EFCC Academy <small class="text">Economic and Financial Crimes Commission Academy</small></h2>  
</div>
-->

<div class="container-fluid">
  
  <!--left-->
  <div class="col-sm-3">
        <!-- <h2>Side</h2> -->
        <?php
        /*
        if (isset($_GET['page'])){
        	$xx = $_GET['page'];
        	echo 'Page is = "'.$xx.'"<br>';
       }

       	$xx = $_GET['page'];
        //echo $xx."<br>";
        //die("End of discussion");
*/
       	// $cur_modl = "";

//Side Navigation
			if((isset($_GET['page'])) && ($_GET['page'] == "research" 
			|| $_GET['page'] == "lecture_series"
			|| $_GET['page'] == "research_project_list"
			|| $_GET['page'] == "library"
			|| $_GET['page'] == "project_details")) {
				include("includes/research_nav.php");
			// $cur_modl = "research";
			} else if(isset($_GET['page']) && ($_GET['page'] == "training" 

			|| $_GET['page'] == "training_unit" 
			|| $_GET['page'] == "cadet" 
			|| $_GET['page'] == "career_dev" 
			|| $_GET['page'] == "stakeholders" 
			|| $_GET['page'] == "foreign_training" 
			|| $_GET['page'] == "tr_courses" 
			|| $_GET['page'] == "training_schedule" 
			|| $_GET['page'] == "training_cal"
			|| $_GET['page'] == "unit_details"
			|| $_GET['page'] == "course_details"
			|| $_GET['page'] == "training_schedule_details")) {
				include("includes/training_nav.php");
				// $cur_modl = "training";
			} else if(isset($_GET['page']) && $_GET['page'] == "administration") {
				include("includes/admin_nav.php");
				// $cur_modl = "admin";
			} else {
				efcc_main_site_nav();
				$cur_modl = "home";
			}
		?>
  </div><!--/left-->
  
  <!--center-->
  <div class="col-sm-6">
    <div class="row">
      <div class="col-xs-12">
      <?php
					//Research Project List
                	if((isset($_GET['page'])) && ($_GET['page']=="research_project_list")) {
						$thispage = $_GET['page'];
						//echo "<h2>Research and Development</h2>";
						//echo "<img src=\"images/libraryimgs/lib1.jpg\" alt=\"First slide\" class=\"img-thumbnail\">";
 						include("pages/res_prjct_list.php");
					
					//Announcement Details	
					} else if(isset($_GET['ann_id'])) {
						include("pages/ann_details.php");
					
					//Photo Gallery [ Album ] Page	
					} else if((isset($_GET['page'])) && ($_GET['page'] == "photo_gallery")) {
						include("pages/album.php");
					
					//Photo Gallery ( photos ) Page	
					} else if((isset($_GET['page'])) && ($_GET['page'] == "photos")) {
						include("pages/photos.php");
					
					//Announcement Details	
					} else if((isset($_GET['page'])) && ($_GET['page']=="lecture_series")) {
						//echo "<h2>Commandant's Lecture Series</h2>";
						//echo "<br>Here is a compilation of the monthly Lectures<br>";
						include("pages/list_lectures.php");
					
					//News Details	
					} else if(isset($_GET['news_id'])) {
						include("pages/news_details.php");
					
					//Commandant's Lecture Series	
					} else if(isset($_GET['lect_id'])) {
						include("pages/lectures.php");
					
					//Get Event Details	
					} else if(isset($_GET['event_id'])) {
						include("pages/event_details.php");
					
					//Fetch and Display Events	
					} else if(isset($_GET['page']) && $_GET['page'] == "events") {
						include("pages/events_list.php");
					
					} else if((isset($_GET['page']) && $_GET['page'] =="event") && (isset($_GET['action']) && $_GET['action'] =="registration") && (isset($_GET['evid']))) {
						include("pages/event_registration.php");
						
					} else if((isset($_GET['page']) && $_GET['page']=="unit_details") && (isset($_GET['unit']))) {//Get Training Unit Details
						include("pages/unit_details.php");
						
					} else if(isset($_GET['page']) && $_GET['page'] =="training_unit") {//Get Training Unit Page
						include("pages/training_units.php");
						
					} else if((isset($_GET['page']) && $_GET['page'] =="course_details") && (isset($_GET['course']))) {//Get Course Details
						include("pages/course_details.php");
						
					} else if(isset($_GET['page']) && $_GET['page'] =="tr_courses") {//Get Courses Page
						include("pages/courses.php");
						
					} else if((isset($_GET['page']) && $_GET['page'] =="training_schedule_details") && (isset($_GET['tr_schdl']))) {//Get Training Schedule Details
						include("pages/tr_schedule_details.php");
						
					} else if(isset($_GET['page']) && $_GET['page'] =="course_participation" && $_GET['action']=="participate" && isset($_GET['tr_schdl'])) {
						include "pages/participate.php";
						
					} else if(isset($_GET['page']) && $_GET['page'] =="training_schedule") {//Get Training Schedules Page
						include("pages/training_schedules.php");
						
					} else if((isset($_GET['project_id'])) && ($_GET['page'] == "project_details")) {//Research Project Details
						include("pages/resproj_details.php");
						
                        include("pages/comments.php");
						// include("pages/res_project.php");
						
						
					} else if(isset($_GET['page']) && $_GET['page'] == "downloads") {//Downloads Page
						include("pages/downloads.php");
						
					} else if(isset($_GET['page'])) {//Gets content from tbl_pg_intros table
						$thispage = strtoupper($_GET['page']);
                        echo $thispage."<br/>";
						
						//select page content from tbl_pg_intros based on linked clicked
						$page_query = "SELECT * FROM `tbl_pg_intros` WHERE upper(pagename)='$thispage'";
//						$page_query = "SELECT * FROM `tbl_pg_intros` WHERE `pagename`='$thispage' AND `visible`=1";
						$page_result = mysqli_query($db_conn, $page_query) or die(mysqli_error($db_conn));
						$rs_page = mysqli_fetch_assoc($page_result);
						
						$pg_title = $rs_page['intro_title'];
						$pg_text = $rs_page['intro_text'];
						
						if(!empty($pg_text)) {
							echo "<h2>".$pg_title."</h2>";
							echo "<p>".$pg_text."</p>";
							
							if($thispage == "research") {
								include("pages/res_project.php");
							} else if($thispage == "training") {
								include("pages/tr_units.php");
							}
						} else {
							echo "No content found for this page";
						}
						
					} else { //Get's the Home Page Content Directly without any link click (on page entry)
						//Get the Page Intro from table tbl_pg_intro
						$thispage = 'HOMEPAGE';
						displayIntro($thispage);
						
						// $rs_intro = get_intro($thispage);
						
						// // get the number of rows in the result
						// $numrows = mysqli_num_rows($rs_intro);
						
						// if ($numrows == 0)  
						// {
						// 	echo "<h1>This page is under construction</h1>";
						// }
						// else
						// {
						// 	while ($intro_row = mysqli_fetch_array($rs_intro))
						// 	{
						// 		$intro_id = $intro_row['pagename'];
						// 		$intro_title = $intro_row['intro_title'];
						// 		$intro_text = $intro_row['intro_text'];
							
						// 		echo "<h2>".$intro_title."</h2>";
						// 		// echo "<img src=\"images/efccacademy/adminblock.jpg\" alt=\"First slide\" class=\"img-thumbnail\">";
						// 		echo "<p>".$intro_text."</p>";
						// 		displayIntro($intro_id, $intro_title, $intro_text);
						// 	}
						// }
					}

					$pageIntroPhotos = get_page_intro_photos(isset($_GET['page']));
					$numOfPhotos = mysqli_num_rows($pageIntroPhotos);

					if($numOfPhotos > 0) {
						foreach($pageIntroPhotos as $photo) {
							
						}
					}

														
		?>
      </div>
    </div>
    
    <!-- Load Extra modules -->
    <?php // include("pages/extras_mod.php"); ?>
    <!-- /Load extra modules -->
    
  </div><!--/center-->

  <!--right-->
  <?php include("includes/right.php"); ?>
  <!--/right-->
  
<?php footer(); ?>