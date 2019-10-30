<?php
session_start();

require_once("config.php");
function loadClasses($class) {
    $path = "classes/";
    require_once("{$path}{$class}.php");
}

spl_autoload_register('loadClasses');

//Instantiating the academy App Class
$academy = new academy;

//Database connection using the connect() method in the academy App Class
$conn = $academy->connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// //Bank Crude Operations
// //List Banks
// $banks = $academy->list_all("tbl_banks");

// Generic Delete Block
if(isset($_GET['pg'], $_GET['id'], $_GET['tbl'], $_GET['pk'])) {
    $pg = $_GET['pg'];
    $id = $_GET['id'];
    $pk = $_GET['pk'];
    $tbl = $_GET['tbl'];

    $academy->delete($tbl, $pk, $id, $pg);

}
/*
if(isset($_SESSION['staff_no'], $_SESSION['email'], $_SESSION['phone'])) {
    $_SESSION['corg'] = $_SESSION['org'];
    $getOrg = $academy->get_rec("SELECT id AS fac_id FROM tbl_orgs WHERE name='{$_SESSION['org']}'");
    $org = $getOrg->fetch_assoc();
    
    if($org !== false) {
        $_SESSION['fac_id'] = $org['fac_id'];
    }
}


*/

//fac Crude Operations

//List Facilities
function list_facs() {
    global $conn;
    $sql = "SELECT * FROM tbl_facilities order by fac_name";
    $result = $conn->query($sql);
    
    return $result;
}

//Get Specifit fac
function get_fac($id) {
    global $conn;
    $sql = "SELECT * FROM tbl_facilities WHERE id={$id} order by fac_name";
    $result = $conn->query($sql);
    
    return $result;
}

//Add fac
if(isset($_POST['addFacBtn'])) {
    $fac_name = $_POST['fac_name'];
    $fac_desc = $_POST['fac_desc'];
    $fac_date = $_POST['fac_date'];
    //$fac_id = $_POST['fac_id'];
    
    $sql = "INSERT INTO tbl_facilities(fac_desc, fac_name, fac_date) VALUES ('$fac_desc', '$fac_name', '$fac_date')";
    $insert = $conn->query($sql);
    
    if($insert === TRUE) {
        $academy->redirect("facilities.php?s=1");
    } else {
        $academy->redirect("add_fac.php?s=0");
    }
}

//Edit fac
if(isset($_POST['updFacBtn'])) {
    $fac_name = $_POST['fac_name'];
    $fac_desc = $_POST['fac_desc'];
    $fac_date = $_POST['fac_date'];
    $fac_id = $_POST['fac_id'];
    
    $sql = "UPDATE tbl_Facilities SET fac_id='$fac_id', fac_name='$fac_name', , fac_desc='fac_desc', fac_date='$fac_date' WHERE id={$id}";
    $update = $conn->query($sql) or die($conn->error);
    
    if($update === TRUE) {
        $academy->redirect("facilities.php?s=1");
    } else {
        $academy->redirect("?id={$id}&s=0");
    }
}
