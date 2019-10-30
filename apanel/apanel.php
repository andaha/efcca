<?php
session_start();
include("config.php");

function loadClasses($class) {
    $path = "classes/";
    require_once("{$path}{$class}.php");
}

spl_autoload_register('loadClasses');

//Instantiating the academy App Class
$apanel = new Academy;

//Database connection using the connect() method in the academy App Class
$conn = $apanel->connect($db_host, $db_user, $db_password, $database);

# Delete Photo
if(isset($_GET['photo']) && $_GET['task'] === "delete_photo") {
    $pg = $_GET['pg'];
    $id = $_GET['id'];
    $pk = $_GET['pk'];
    $tbl = $_GET['tbl'];
    $ph = $_GET['photo'];
    $task = $_GET['task'];
    
    $photo = "../images/gallery/photos/{$_GET['photo']}";
    $delete_photo = null;
    if(file_exists($photo)) {
        $delete_photo = unlink($photo);
    }        
    if($delete_photo) {
        $apanel->delete($tbl, $pk, $id, $pg);
    }
} else if(isset($_GET['pg'], $_GET['id'], $_GET['tbl'], $_GET['pk'])) {
    // Generic Delete Block
    $pg = $_GET['pg'];
    $id = $_GET['id'];
    $pk = $_GET['pk'];
    $tbl = $_GET['tbl'];
    $apanel->delete($tbl, $pk, $id, $pg);
}
//Login User
if(isset($_POST['loginBtn'])) {
    $loginfld = $_POST['login'];
    $passwdfld = $_POST['password'];
    
    $login = $apanel->login("SELECT a.*, CONCAT(a.surname, ', ', a.othernames) AS fullname, b.* FROM tbl_user_accts a, tbl_user_grp b WHERE ((a.username='{$loginfld}' OR email='{$loginfld}') AND a.password='{$passwdfld}') AND a.group_id=b.group_id");
    
    if($login) {
        if($login === "Error") {
            $_SESSION['loginErr'] = $login;
            $apanel->redirect("index.php?{$_SESSION['loginErr']}");
        } else {
            $apanel->redirect("home.php");
        }
    }
}

//logout User
if(isset($_GET['action'], $_GET['logout'])) {
    $action = $_GET['action'];
    $check = $_GET['logout'];
    $logout = $apanel->logout($action, $check);
    if($logout) {
        $apanel->redirect("index.php?page=HOMEPAGE");
    }
}

#CRUD Operation

/**
* Announcement Operations
*/

# Add Announcement
if(isset($_POST['addAnnBtn'])) {
    $addAnnouncement = $apanel->add_rec("tbl_announce", $_POST, array(), true);
    if($addAnnouncement) {
        $apanel->redirect("announcements.php?stat=1");
    }
}

#Update Announcement
if(isset($_POST['updAnnBtn'])) {
    $condition = array("clause"=>"ann_id", "value"=>$_POST['ann_id']);
    $updannouncement = $apanel->upd_rec("tbl_announce", $_POST, $condition, array(), true);
    if($updannouncement) {
        $apanel->redirect("announcements.php?stat=1");
    }
}

/**
* Events Operations
*/

# Add Event
if(isset($_POST['addEventBtn'])) {
    $addEvent = $apanel->add_rec("tbl_events", $_POST, array(), true);
    if($addEvent) {
        $apanel->redirect("events.php?stat=1");
    }
}

#Update Event
if(isset($_POST['updEventBtn'])) {
    $condition = array("clause"=>"eventid", "value"=>$_POST['eventid']);
    $updEvent = $apanel->upd_rec("tbl_events", $_POST, $condition, array(), true);
    if($updEvent) {
        $apanel->redirect("events.php?stat=1");
    }
}

/**
* Lectures Operations
*/

# Add Lectures
if(isset($_POST['addLectureBtn'])) {
    $addLecture = $apanel->add_rec("tbl_lecture", $_POST, array(), true);
    if($addLecture) {
        $apanel->redirect("lectures.php?stat=1");
    }
}

#Update Lectures
if(isset($_POST['updLectureBtn'])) {
    $condition = array("clause"=>"lect_id", "value"=>$_POST['lect_id']);
    $updLecture = $apanel->upd_rec("tbl_lecture", $_POST, $condition, array(), true);
    if($updLecture) {
        $apanel->redirect("lectures.php?stat=1");
    }
}

/**
* Lectures Papers Operations
*/

# Add Lectures Papers
if(isset($_POST['addPaperBtn'])) {
    $file = $_FILES['paperfile'];
    $uploadPaper = move_uploaded_file($file['tmp_name'], "../downloads/papers/{$file['name']}");
    $format = array(
        "paper"=>$file['name'],
        "paper_type"=>$file['type'],
        "paper_size"=>$file['size'],
        "date_added"=>date('y-m-d')
    );
    if($uploadPaper) {
        $addPaper = $apanel->add_rec("tbl_lecture_papers", $_POST, $format, true);
        if($addPaper) {
            $apanel->redirect("papers.php?stat=1&lecture={$_POST['lect_id']}");
        }
    } else {
        $apanel->redirect("papers.php?stat=0&task=upld_paper&lecture={$_POST['lect_id']}");
    }
}

/**
* Photo Operations
*/

# Add Photo(s)
if(isset($_POST['addPhotoBtn'])) {
    $upload_photos = $apanel->upload_multiple_files('photo', "../images/gallery/photos/");
    if($upload_photos) {
        foreach($upload_photos as $photo) {
            $format = array(
                "photo_filename"=>$photo['name']
            );
            $apanel->add_rec('gallery_photos', $_POST, $format, true);
        }
        
        $apanel->redirect("photos.php?event={$_GET['event']}");
    }
}

/**
* News Operations
*/

# Add News
if(isset($_POST['addNewsBtn'])) {
    $addNews = $apanel->add_rec("tbl_news", $_POST, array(), true);
    if($addNews) {
        $apanel->redirect("news.php?stat=1");
    }
}

#Update News
if(isset($_POST['updNewsBtn'])) {
    $condition = array("clause"=>"news_id", "value"=>$_POST['news_id']);
    $updNews = $apanel->upd_rec("tbl_news", $_POST, $condition, array(), true);
    if($updNews) {
        $apanel->redirect("news.php?stat=1");
    }
}

/**
* Pages Operation
*/

# Add Page
if(isset($_POST['addPageBtn'])) {
    $addpage = $apanel->add_rec("tbl_pg_intros", $_POST, array(), true);
    if($addpage) {
        $apanel->redirect("pages.php?stat=1");
    }
}

#Update Page
if(isset($_POST['updPageBtn'])) {
    $condition = array("clause"=>"pagename", "value"=>$_POST['pagename']);
    $updpage = $apanel->upd_rec("tbl_pg_intros", $_POST, $condition, array(), true);
    if($updpage) {
        $apanel->redirect("pages.php?stat=1");
    }
}

/**
* Users Operation
*/

# Add User
if(isset($_POST['addUserBtn'])) {
    $addUser = $apanel->add_rec("tbl_user_accts", $_POST, array(), true);
    if($addUser) {
        $apanel->redirect("users.php?stat=1");
    }
}

#Update User
if(isset($_POST['updUserBtn'])) {
    $condition = array("clause"=>"user_id", "value"=>$_POST['user_id']);
    $updUser = $apanel->upd_rec("tbl_user_accts", $_POST, $condition, array(), true);
    if($updUser) {
        $apanel->redirect("users.php?stat=1");
    }
}

/**
* User Groups Operation
*/

# Add User Group
if(isset($_POST['addUserGrpBtn'])) {
    $addUserGrp = $apanel->add_rec("tbl_user_grp", $_POST, array(), true);
    if($addUserGrp) {
        $apanel->redirect("usergroups.php?stat=1");
    }
}

#Update User Group
if(isset($_POST['updUserGrpBtn'])) {
    $condition = array("clause"=>"group_id", "value"=>$_POST['group_id']);
    $updUserGrp = $apanel->upd_rec("tbl_user_grp", $_POST, $condition, array(), true);
    if($updUserGrp) {
        $apanel->redirect("usergroups.php?stat=1");
    }
}


/**
* Courses CRUD
*/

# Add Course
if(isset($_POST['addCrsBtn'])) {
    $addUserGrp = $apanel->add_rec("tbl_courses", $_POST, array(), true);
    if($addUserGrp) {
        $apanel->redirect("courses.php?stat=1");
    }
}

#Update User Group
if(isset($_POST['updCrsBtn'])) {
    $condition = array("clause"=>"course_id", "value"=>$_POST['course_id']);
    $updUserGrp = $apanel->upd_rec("tbl_courses", $_POST, $condition, array(), true);
    if($updUserGrp) {
        $apanel->redirect("courses.php?stat=1");
    }
}

/**
* Courses CRUD
*/

# Add Course
if(isset($_POST['addCrsBtn'])) {
    $addUserGrp = $apanel->add_rec("tbl_courses", $_POST, array(), true);
    if($addUserGrp) {
        $apanel->redirect("courses.php?stat=1");
    }
}

#Update Course
if(isset($_POST['updCrsBtn'])) {
    $condition = array("clause"=>"course_id", "value"=>$_POST['course_id']);
    $updUserGrp = $apanel->upd_rec("tbl_courses", $_POST, $condition, array(), true);
    if($updUserGrp) {
        $apanel->redirect("courses.php?stat=1");
    }
}



/**
* Training Units CRUD
*/

# Add Training Unit
if(isset($_POST['addTruBtn'])) {
    $addTru = $apanel->add_rec("tr_units", $_POST, array(), true);
    if($addTru) {
        $apanel->redirect("training_units.php?stat=1");
    }
}

#Update Training Unit
if(isset($_POST['updTruBtn'])) {
    $condition = array("clause"=>"tr_uid", "value"=>$_POST['tr_uid']);
    $updTru = $apanel->upd_rec("tr_units", $_POST, $condition, array(), true);
    if($updTru) {
        $apanel->redirect("training_units.php?stat=1");
    }
}


/**
* Training Schedule CRUD
*/

# Add Training Schedule
if(isset($_POST['addTruBtn'])) {
    $addTrSchd = $apanel->add_rec("tbl_tr_schdl", $_POST, array(), true);
    if($addTrSchd) {
        $apanel->redirect("training_units.php?stat=1");
    }
}

#Update Training Schedule
if(isset($_POST['updTruBtn'])) {
    $condition = array("clause"=>"schd_id", "value"=>$_POST['schd_id']);
    $updTrSchd = $apanel->upd_rec("tbl_tr_schdl", $_POST, $condition, array(), true);
    if($updTrSchd) {
        $apanel->redirect("training_units.php?stat=1");
    }
}

/**
* Facility CRUD
*/

# Add Facility
if(isset($_POST['addFacBtn'])) {
    $addFac = $apanel->add_rec("tbl_facilities", $_POST, array(), true);
    if($addFac) {
        $apanel->redirect("facilities.php?stat=1");
    }
}

#Update Facility
if(isset($_POST['updFacBtn'])) {
    $condition = array("clause"=>"fac_id", "value"=>$_POST['fac_id']);
    $updFac = $apanel->upd_rec("tbl_facilities", $_POST, $condition, array(), true);
    if($updFac) {
        $apanel->redirect("facilities.php?stat=1");
    }
}

/**
* Research CRUD
*/

# Add Research
if(isset($_POST['addResBtn'])) {
    $addRes = $apanel->add_rec("researchprop", $_POST, array(), true);
    if($addRes) {
        $apanel->redirect("researchprops.php?stat=1");
    }
}

#Update Research
if(isset($_POST['updResBtn'])) {
    $condition = array("clause"=>"res_id", "value"=>$_POST['res_id']);
    $updRes = $apanel->upd_rec("researchprop", $_POST, $condition, array(), true);
    if($updRes) {
        $apanel->redirect("researchprops.php?stat=1");
    }
}


