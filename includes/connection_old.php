<?php 

require("constants.php");

// 1. Create a database db_conn

$db_conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
if (!$db_conn) {
	die("Database db_conn failed: " . mysqli_error());	
}

// 2. Select a database to use

$db_select = mysqli_select_db(DB_NAME, $db_conn);
if (!$db_select) { 
	die("Database selection failed: " . mysqli_error()); 
}

?>
