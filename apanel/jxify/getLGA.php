<?php
include("../app.php");
$stateid = $_POST['stateid'];

$lgas = $paysoft->get_rec("SELECT * FROM tbl_lga WHERE state_id={$stateid}");
$count = $lgas->num_rows;

if($count > 0) {
    echo '<option value="" selected>- Select -</option>';
    foreach($lgas as $lga) {
        echo "<option value=\"{$lga['lga']}\">{$lga['lga']}</option>";
    }
}