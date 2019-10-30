<?php

// this file is the place to store our basic functions

	function mysqli_prep($value) {
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists("mysqli_real_escape_string"); // i.e. PHP >= v4.3.0
		
		if ($new_enough_php) { // PHP >= v4.3.0 or higher
		//undo any magic quote effects so mysqli_real_escape_string can do the work
		
		if ($magic_quotes_active) { $value = stripslashes ($value); }
		$value = mysqli_real_escape_string ($value);
		} else { //before PHP v4.3.0
		// if  magic quotes aren't already ON then add slashes manually
		if (!$magic_quotes_active) { $value = addslashes($value); }
		// if the magic quotes are active, then the slashes already exist
		
		}
		return $value;
		
		
	}

	function redirect_to ($location = NULL) {

//	function redirect_to ($location ) {
	
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
			
		} else {
			header("Location: index.php");
			exit;
		}
	}

	function confirm_query ($result_set) {
		global $db_conn;
		if (!$result_set) {
		  die("Database query failed:" . mysqli_error($db_conn)); 
		}
	}

/*	
	function get_all_subjects() {
		global $db_conn;
		 $query = "SELECT * FROM subjects ORDER BY position ASC ";
				   
	   $subject_set = mysqli_query($db_conn, $query);

		confirm_query($subject_set); 
		return $subject_set;
	}
	
	function get_pages_for_subject($subject_id) {

		global $db_conn;
		$query = "SELECT * FROM pages WHERE subject_id = {$subject_id} ORDER BY position ASC ";
				  
		$page_set = mysqli_query($db_conn, $query);
		  
		confirm_query($page_set); 
		return $page_set;

	}
		
	function get_subject_by_id ($subject_id) {
		global $db_conn;
		$query = "SELECT * ";
		$query .= "FROM subjects ";
		$query .= "WHERE id = ".$subject_id ." ";
		$query .= "LIMIT 1";
		$result_set = mysqli_query($db_conn, $query);
		confirm_query($result_set);

		if ($subject = mysqli_fetch_array($result_set)) {
		  return $subject;
		} else {
			return NULL;
		}
	}

	function get_page_by_id ($page_id) {
		global $db_conn;
		$query = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE id = ".$page_id ." ";
		$query .= "LIMIT 1";
		$result_set = mysqli_query($db_conn, $query);
		confirm_query($result_set);
		if ($page = mysqli_fetch_array($result_set)) {
		return $page;
		} else {
			return NULL;
		}
	}
	
	function find_selected_page() {
		global $sel_subject;
		global $sel_page;
			
		if (isset($_GET['subj'])) {
			$sel_subject = get_subject_by_id($_GET['subj']);
			$sel_page = NULL;
		} elseif (isset($_GET['page'])){
			$sel_subj = NULL;
			$sel_page = get_page_by_id($_GET['page']);
		} else {
			$sel_subject = NULL;
			$sel_page = NULL;
		}
	}

	function navigation($sel_subject, $sel_page) {
		
		         $sendout =  "<ul class=\"subjects\">";
				  $subject_set = get_all_subjects();
				  
				  while ($subject = mysqli_fetch_array($subject_set)) 
				  {
					  $sendout .= "<li ";
					  if ($subject['id']==$sel_subject['id']){ $sendout .= " class = \"selected\"";}
					  
					   $sendout .= "><a href = \"edit_subject.php?subj=". urlencode($subject['id']). "\">{$subject["menu_name"]}</a></li>";
					  
					  $page_set = get_pages_for_subject($subject['id']);
	
					   $sendout .= "<ul class=\"pages\">";
					  
					  while ($page = mysqli_fetch_array($page_set)) 
					  {
						   $sendout .= "<li ";
						  if ($page['id']==$sel_page['id']){ $sendout .= " class = \"selected\"";}
						  
						   $sendout .= "><a href = \"content.php?page=". urlencode($page['id']). "\">{$page['menu_name']}</a></li>";
					  }				  
					   $sendout .= "</ul>";
					  
				  }
				  
			    $sendout .= "</ul>";
				
				return  $sendout;

	}

*/
	

// EFCC ACADEMY FUNCTIONS

function format_txt ($txt)
{
	// neatly format text to be displayed

/*  $txt = nl2br(str_replace('  ', ' &nbsp;', $txt));
	$txt = nl2br(str_replace(' <p> ', ' <br />', $txt)); 
	$txt = nl2br(str_replace(' </p>', '  ', $txt)); 
	$txt = stripslashes($txt);
	$txt = wordwrap($txt); 
	*/
	
//	return wordwrap(nl2br(str_replace('  ', ' &nbsp;', htmlspecialchars($txt))));

	$txt = wordwrap(nl2br(str_replace('  ', ' &nbsp;', $txt))); 
	return $txt;   

}
// HOME PAGE - NEWS 
	function get_news ($limit_size) {
		$records = !isset($limit_size)? '': " LIMIT ".$limit_size;
		global $db_conn;
		$query = "SELECT * ";
		$query .= "FROM tbl_news WHERE visible=1 order by news_date desc " . $records ;
		$result_set = mysqli_query($db_conn,$query);
		confirm_query($result_set);
//		if ($news = mysqli_fetch_array($result_set)) {
		return $result_set;
//		} else {
//			return NULL;
//		}

	}

// HOME PAGE - TRAINING SCHEDULE
	function get_tschdl ($limit_size) {
		$records = !isset($limit_size)? '': " LIMIT ".$limit_size;
		global $db_conn;
		$query = "SELECT a.*, b.coursetitle ";
		$query .= " FROM tbl_tr_schdl a, tbl_courses b ";
		$query .= " where a.courseid = b.courseid ";
		$query .= " order by startdate desc " . $records ;
		$result_set = mysqli_query($db_conn, $query);
		confirm_query($result_set);
//		if ($news = mysqli_fetch_array($result_set)) {
		return $result_set;
//		} else {
//			return NULL;
//		}

	}
	
	function get_tr_unit($limit_start, $limit_end) {
		//$records = !isset($limit_size)? '': " LIMIT" . $limit_size;
		global $db_conn;
		
		$query = sprintf("SELECT * FROM tr_units LIMIT %d %d", $limit_start, $limit_end);
		$result_set = mysqli_query($db_conn, $query);
		confirm_query($result_set);
		return $result_set;
	}

// HOME PAGE - EVENTS 
	function get_event ($limit_size) {
		$records = !isset($limit_size)? '': " LIMIT ".$limit_size;
		global $db_conn;
		$query = "SELECT * ";
		$query .= "FROM tbl_events order by startdate desc " . $records ;
		$result_set = mysqli_query($db_conn, $query);
		confirm_query($result_set);
//		if ($news = mysqli_fetch_array($result_set)) {
		return $result_set;
//		} else {
//			return NULL;
//		}

	}


// HOME PAGE - DISCUSSION FORUM 
	function get_forums ($limit_size) {
		$records = !isset($limit_size)? '': " LIMIT ".$limit_size;
		global $db_conn;
		$query = "SELECT * ";
		$query .= "FROM tbl_forum_topics order by dateadded desc " . $records ;
		$result_set = mysqli_query($db_conn, $query);
		confirm_query($result_set);
//		if ($news = mysqli_fetch_array($result_set)) {
		return $result_set;
//		} else {
//			return NULL;
//		}

	}

// HOME PAGE - ANNOUNCEMENT 
	function get_announce ($limit_size) {
		$records = !isset($limit_size)? '': " LIMIT ".$limit_size;
		global $db_conn;
		$query = "SELECT * ";
		$query .= "FROM tbl_announce order by ann_date desc " . $records ;
		$result_set = mysqli_query($db_conn, $query);
		confirm_query($result_set);
//		if ($news = mysqli_fetch_array($result_set)) {
		return $result_set;
//		} else {
//			return NULL;
//		}

	}

// PAGE INTRODUCTION 
	function get_intro ($pagenm)  // Get Page Introduction
	{
		$thispage = strtoupper($pagenm);

		global $db_conn;
		$query = "SELECT * FROM tbl_pg_intros WHERE upper(pagename) = '".$pagenm."'";

		$rset=mysqli_query($db_conn, $query);
		$numrows=mysqli_num_rows($rset);
		
		confirm_query($rset);

//	if ($res_list = mysqli_fetch_array($result_set)) {
		return $rset;
//		} else {
//			return NULL;
//		}
	}

	function displayIntro($pg)
	{
		$rs_intro = get_intro($pg);
		
		// get the number of rows in the result
		$numrows = mysqli_num_rows($rs_intro);
		
		if ($numrows == 0)  
		{
			//echo "<h1>This page is under construction</h1>";
		}
		else
		{
			while ($intro_row = mysqli_fetch_array($rs_intro))
			{
				$intro_id = $intro_row['pagename'];
				$intro_title = $intro_row['intro_title'];
				$intro_text = $intro_row['intro_text'];
			
				echo "<h2>".$intro_title."</h2>";
				// echo "<img src=\"images/efccacademy/adminblock.jpg\" alt=\"First slide\" class=\"img-thumbnail\">";
				echo "<p>".$intro_text."</p>";
			}
		}

	}

	function get_page_intro_photos($pagename) {
		global $db_conn;
		$query = "SELECT a.*, b.pgintro_pagename, c.pagename FROM gallery_photos a, gallery_album b, tbl_pg_intros c WHERE a.photo_album=b.album_id AND b.pgintro_pagename='$pagename'";
		$rset=mysqli_query($db_conn, $query);
		//$numrows=mysqli_num_rows($rset);
		
		confirm_query($rset);

		return $rset;
	}

// HOME PAGE - NEWS 
	function get_lecture ($limit_size) {
		$records = !isset($limit_size)? '': " LIMIT ".$limit_size;
		global $db_conn;
		$query = "SELECT * ";
		$query .= "FROM tbl_lecture order by lect_date desc " . $records ;
		$result_set = mysqli_query($db_conn, $query);
		confirm_query($result_set);
//		if ($news = mysqli_fetch_array($result_set)) {
		return $result_set;
//		} else {
//			return NULL;
//		}

	}


function get_user($myusername,$mypassword)
{

		global $db_conn;
		$query = "SELECT a.*, b.group_name, b.can_add, b.can_edit, b.can_del, b.can_view, ";
		$query .= "b.training_mod, b.research_mod, b.general_mod, b.extras_mod, b.users_mod, ";
		$query .= "b.other_mod1, b.other_mod2 ";
		$query .= "FROM efccacad.tbl_user_accts a INNER JOIN efccacad.tbl_user_grp b on a.group_id=b.group_id ";
		$query .= "WHERE a.username='$myusername' AND a.password='$mypassword'" ;

		$result_set = mysqli_query($db_conn, $query);
		confirm_query($result_set);
//		if ($user = mysqli_fetch_array($result_set)) {
			return $result_set;
//		} else {
//			return NULL;
//		}

}


// 1.	RESEARCH MODULE

	function get_research_by_id ($res_id) {
		global $db_conn;
		$query = "SELECT * ";
		$query .= "FROM researchprop ";
		$query .= "WHERE res_id = ".$res_id ." ";
		$query .= "LIMIT 1";
		$result_set = mysqli_query($db_conn, $query);
		confirm_query($result_set);
//		if ($page = mysqli_fetch_array($result_set)) {
		return $result_set;
//		} else {
//			return NULL;
//		}
	}

function get_research_list () {
		global $db_conn;
		$query = "SELECT * FROM researchprop order by res_title ";
		$result_set = mysqli_query($db_conn, $query);
		confirm_query($result_set);
//		if ($res_list = mysqli_fetch_array($result_set)) {
		return $result_set;
//		} else {
//			return NULL;
//		}
	}
	
	
	function get_research_list_by_key ($searchtxt, $range) {
		global $db_conn;
		$query = "select * from researchprop ";
		$query .= "where upper(res_title) like '%$searchtxt%' or upper(res_keywords) like '%$searchtxt%' ";
	//	$query .= " order by res_date desc ".$range;
		$query .= " order by res_title ".$range;
		$result_set=mysqli_query($db_conn, $query);
		$numrows=mysqli_num_rows($result_set);
		
		confirm_query($result_set);

//	if ($res_list = mysqli_fetch_array($result_set)) {
		return $result_set;
//		} else {
//			return NULL;
//		}
	}
	
	function get_Library_list () {
		global $db_conn;
		$query = "SELECT * ";
		$query .= "FROM tbl_library order by pub_title limit 10 ";
		$result_set = mysqli_query($db_conn, $query);
		confirm_query($result_set);
//		if ($res_list = mysqli_fetch_array($result_set)) {
		return $result_set;
//		} else {
//			return NULL;
//		}
	}
	
	function get_publication_by_id ($pub_id) {
		global $db_conn;
		$query = "SELECT * ";
		$query .= "FROM tbl_library ";
		$query .= "WHERE pub_id = ".$pub_id ." ";
		$query .= "LIMIT 1";
		$result_set = mysqli_query($db_conn, $query);
		confirm_query($result_set);
//		if ($page = mysqli_fetch_array($result_set)) {
		return $result_set;
//		} else {
//			return NULL;
//		}
	}	
	
	function get_dept_by_ID ($id) 
	{
		global $db_conn;
		$query = "select * from tbl_depts ";
		$query .= " where dept_id = ".$id." Limit 1 ";
		$result_set=mysqli_query($db_conn, $query);
		$numrows=mysqli_num_rows($result_set);
		
		confirm_query($result_set);

//	if ($res_list = mysqli_fetch_array($result_set)) {
		return $result_set;
//		} else {
//			return NULL;
//		}
	}

	function get_dept_list ($range) 
	{
		global $db_conn;
		$query = "select * from tbl_depts ";
		$query .= " order by dept_desc ".$range;
		$result_set=mysqli_query($db_conn, $query);
		$numrows=mysqli_num_rows($result_set);
		
		confirm_query($result_set);

//	if ($res_list = mysqli_fetch_array($result_set)) {
		return $result_set;
//		} else {
//			return NULL;
//		}
	}
		
		
	function set_session()
	{
		session_destroy();

		//		Reset User Session

		$_SESSION['user_id'] = '';
		$_SESSION['group_id'] = '';
		$_SESSION['username'] = '';
		$_SESSION['group_name'] = '';
		$_SESSION['designation'] = '';
		$_SESSION['fullname'] = '';
		$_SESSION['email'] = '';
		$_SESSION['gsm'] = '';
		
		$_SESSION['can_add'] = 0;		// Can add records
		$_SESSION['can_upd'] = 0;		// Can update records
		$_SESSION['can_del'] = 0;		// Can delete records
		$_SESSION['can_adm'] = 0;		// Can Administer
		$_SESSION['can_apprv'] = 0;		// Can Approve
		
		// other environment settings
		$_SESSION['rs_limit'] = 6; 		// default number of records to return from a query

		// Navigation Control Variables
		$_SESSION['crud_mod'] = ''; // Crud_mod (possible values are 1=ADD; 2=VIEW; 3=EDIT; 4=DELETE
		$_SESSION['modl'] = ''; // Modl (possible values are "New Record"; "Record Update"
		$_SESSION['modldesc'] = ''; // Modl description
		$_SESSION['pgHeading'] = ''; // Page Heading
		
	}
	
	function rset_admin_session()
	{
		// Current USer Access Control (to be used in the Admin Area - i.e. 'User Privileges', 'User Accounts')
		$_SESSION['adm_user_id'] = '';
		$_SESSION['adm_group_id'] = '';
		$_SESSION['adm_username'] = '';
		$_SESSION['adm_password'] = '';
		$_SESSION['adm_group_name'] = '';
		$_SESSION['adm_group_desc'] = '';
		$_SESSION['adm_fullname'] = '';
		$_SESSION['adm_email'] = '';
		$_SESSION['adm_gsm'] = '';
		$_SESSION['adm_secret_quest'] = '';
		$_SESSION['adm_secret_answer'] = '';
		$_SESSION['adm_designation'] = '';
		$_SESSION['adm_surname'] = '';
		$_SESSION['adm_othernames'] = '';
		$_SESSION['adm_fileno'] = '';

		$_SESSION['adm_can_add'] = 0;		// Can add records
		$_SESSION['adm_can_upd'] = 0;		// Can update records
		$_SESSION['adm_can_del'] = 0;		// Can delete records
		$_SESSION['adm_can_adm'] = 0;		// Can Administer
		$_SESSION['adm_can_apprv'] = 0;		// Can Approve
		
	}

	function init_ckeditor () {
		// CKEDITOR Editing tool
	  // Make sure you are using a correct path here. 
	  // include_once 'ckeditor/ckeditor.php';  
	  $ckeditor = new CKEditor(); 
	  $ckeditor->basePath = '/ckeditor/'; 
	  $ckeditor->config['filebrowserBrowseUrl'] = 'ckfinder/ckfinder.html'; 
	  $ckeditor->config['filebrowserImageBrowseUrl'] = 'ckfinder/ckfinder.html?type=Images'; 
	  $ckeditor->config['filebrowserFlashBrowseUrl'] = 'ckfinder/ckfinder.html?type=Flash'; 
	  $ckeditor->config['filebrowserUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'; 
	  $ckeditor->config['filebrowserImageUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	  $ckeditor->config['filebrowserFlashUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'; 
	  $ckeditor->editor('CKEditor1');  
	}
?>