<?php
//Database Connection
require_once("connection.php");

//EFCC Front-end Functions

include("functions.php");

//Page Header include() Function
function page_header() {
	include("header.php");
}

//Page Footer include() Function
function footer() {
	include("footer.php");
}

//Main Navigation (Menu)
function efcc_main_site_nav() {
	include("main_nav.php");
}