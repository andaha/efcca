<?php require_once("includes/includes.php"); ?>
<?php page_header(); ?>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>

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
            if (!isset($_GET['page'])) 
            {
			     efcc_main_site_nav();
            }
            else
            {
                $page = $_GET['page'];

     			if($page == "research" 
     				|| $page == "lecture_series"
     				|| $page == "research_project_list"
     				|| $page == "project_details") {
     					include("includes/research_nav.php");
     			} else if($page == "training" 
     				|| $page == "training_unit" 
     				|| $page == "tr_courses" 
     				|| $page == "training_schedule" 
     				|| $page == "training_cal"
     				|| $page == "unit_details"
     				|| $page == "course_details"
     				|| $page == "training_schedule_details") {
     					include("includes/training_nav.php");
     			} else if($page == "administration") {
     					include("includes/admin_nav.php");
     			} else {
     				efcc_main_site_nav();
     			}
            }

		?>
  
  </div><!--/left-->
  
  <!--center-->
  <div class="col-sm-6">
    <div class="row">
      <div class="col-xs-12">
      <?php
					//Research Project List
                	if(isset($_REQUEST['page']) =="research_project_list") {
//                	if((isset($_REQUEST['page'])) AND ($_REQUEST['page']=="research_project_list")) {
						$thispage = $_GET['page'];
						echo "<h2>Research and Development</h2>";
						echo "<img src=\"images/libraryimgs/lib1.jpg\" alt=\"First slide\" class=\"img-thumbnail\">";
 						include("pages/res_prjct_list.php");
					
					//Announcement Details	
					} else if(isset($_GET['ann_id'])) {
						include("pages/ann_details.php");
					
					//Photo Gallery [ Album ] Page	
					} else if(isset($_GET['page']) == "photo_gallery") {
//					} else if(isset($_GET['page']) && isset($_GET['page']) == "photo_gallery") {
						include("pages/album.php");
					
					//Photo Gallery ( photos ) Page	
					} else if(isset($_GET['page']) == "photos") {
//					} else if((isset($_GET['page'])) && isset($_GET['page'] == "photos")) {
						include("pages/photos.php");
					
					//Announcement Details	
					} else if(isset($_REQUEST['page']) == "lecture_series") {
//					} else if((isset($_REQUEST['page'])) AND ($_REQUEST['page']=="lecture_series")) {
						echo "<h2>Commandant's Lecture Series</h2>";
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
					
					} else if(isset($_GET['page'])=="event" && isset($_GET['action'])=="registration" && isset($_GET['evid'])) {
						include("pages/event_registration.php");
						
					} else if(isset($_GET['page'])=="unit_details" && isset($_GET['unit'])) {//Get Training Unit Details
						include("pages/unit_details.php");
						
					} else if(isset($_GET['page'])=="training_unit") {//Get Training Unit Page
						include("pages/training_units.php");
						
					} else if(isset($_GET['page'])=="course_details" && isset($_GET['course'])) {//Get Course Details
						include("pages/course_details.php");
						
					} else if(isset($_GET['page'])=="tr_courses") {//Get Courses Page
						include("pages/courses.php");
						
					} else if(isset($_GET['page'])=="training_schedule_details" && isset($_GET['tr_schdl'])) {//Get Training Schedule Details
						include("pages/tr_schedule_details.php");
						
					} else if(isset($_GET['page'])=="course_participation" && isset($_GET['action'])=="participate" && isset($_GET['tr_schdl'])) {
						include "pages/participate.php";
						
					} else if(isset($_GET['page'])=="training_schedule") {//Get Training Schedules Page
						include("pages/training_schedules.php");
						
					} else if(isset($_GET['project_id']) && isset($_GET['page']) == "project_details") {//Research Project Details
						include("pages/resproj_details.php");
						
                        include("pages/comments.php");
						// include("pages/res_project.php");
						
						
					} else if(isset($_GET['page']) == "downloads") {//Downloads Page
						include("pages/downloads.php");
						
//					} else if(isset($_REQUEST['page'])) {//Gets content from tbl_pg_intros table
					} else if(isset($_REQUEST['page'])) {//Gets content from tbl_pg_intros table
						$thispage = $_REQUEST['page'];
						
						//select page content from tbl_pg_intros based on linked clicked
						$page_query = "SELECT * FROM `tbl_pg_intros` WHERE `pagename`='$thispage' AND `visible`=1";
						$page_result = mysql_query($page_query, $db_conn) or die(mysql_error());
						$rs_page = mysql_fetch_assoc($page_result);
						
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
						
						$rs_intro = get_intro($thispage);
						
						// get the number of rows in the result
						$numrows = mysql_num_rows($rs_intro);
						
						if ($numrows == 0)  
						{
							echo "<h1>This page is under construction</h1>";
						}
						else
						{
							while ($intro_row = mysql_fetch_array($rs_intro))
							{
								$intro_id = $intro_row['pagename'];
								$intro_title = $intro_row['intro_title'];
								$intro_text = $intro_row['intro_text'];
							
								echo "<h2>".$intro_title."</h2>";
								echo "<img src=\"images/efccacademy/adminblock.jpg\" alt=\"First slide\" class=\"img-thumbnail\">";
								echo "<p>".$intro_text."</p>";
							}
						}
					}
														
		?>
      </div>
    </div>
    
    <!-- Load Extra modules -->
    <?php include("pages/extras_mod.php"); ?>
    <!-- /Load extra modules -->
    
  </div><!--/center-->

  <!--right-->
  <?php include("includes/right.php"); ?>
  <!--/right-->
  
<?php footer(); ?>