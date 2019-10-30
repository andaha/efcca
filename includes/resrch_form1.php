 <?php  
	// include("chkin.php");
 ?>
 
 <?php
	// Setup memory variables equivalent to each session variable, to be used in the Form
	/*
	$adm_group_desc = $_SESSION['adm_group_desc'];
	$adm_can_add = $_SESSION['adm_can_add'];
	$adm_can_aud = $_SESSION['adm_can_aud'];
	$adm_can_chk = $_SESSION['adm_can_chk'];
	$adm_can_adm = $_SESSION['adm_can_adm'];
	*/        
	$addedby = $_SESSION['username'];
	$adm_user_id = $_SESSION['adm_user_id'];
	$adm_group_id = $_SESSION['adm_group_id'];
	$adm_username = $_SESSION['adm_username'];
	$adm_password = $_SESSION['adm_password'];
	$adm_group_name = $_SESSION['adm_group_name'];
	$adm_fullname = $_SESSION['adm_fullname'];
	$adm_email = $_SESSION['adm_email'];
	$adm_gsm = $_SESSION['adm_gsm'];
	$adm_secret_quest = $_SESSION['adm_secret_quest'];
	$adm_secret_answer = $_SESSION['adm_secret_answer'];
	$adm_designation = $_SESSION['adm_designation'];
	$adm_surname = $_SESSION['adm_surname'];
	$adm_othernames = $_SESSION['adm_othernames'];
	$adm_fileno = $_SESSION['adm_fileno'];
	$retype_pwd = "";
	
	// Get the User Groups to be used to populate the 'group name' listbox
	
	require_once("includes/connection.php");
	$qry = "select * from tbl_user_grp order by group_name ";
	$rs_usergrp = get_user_grp ($qry);    // returns the rows found to $rs_Vouch_Desc
	
	// get the number of rows in the result
	$numrows = mysql_num_rows($rs_usergrp);
	if ($numrows == 0)  {
		echo "<br /><br /><br /><label>User Group must established before you continue </b></label><br /><br />";
		echo "<label> [  <a href=\"admin_login.php\">Log In</a>  ] </b></label>&nbsp;&nbsp;";
		echo "&nbsp;&nbsp;<label> [  <a href=\"index.php\">Close</a>  ] </b></label>";
		exit;
	
	}

?>
<?php include("officelogo.php"); ?>

<h2 align='center'>Research Topic</h2>

<strong>
<form method="post" action="<?php echo $_SERVER['../PHP_SELF']; ?>" enctype="multipart/form-data">
  <table width="97%" border="0">
    <tr>
      <th width="31%" align="left" scope="row">Research Title:</th>
      <td width="69%"><textarea name="res_title" cols="80" rows="2" id="res_title"><?php echo $res_title; ?></textarea></td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th align="left" scope="row">Status:</th>
      <td><select name="res_status" id="res_status">
        <option>Select Status...</option>
        <option value="Completed">Completed</option>
        <option value="Ongoing">Ongoing</option>
        <option value="Proposal">Proposal</option>
      </select></td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th align="left" scope="row">Category:</th>
      <td><p>
        <select name="res_category" id="res_category">
          <option value="0" selected="selected">Select Category...</option>
          <option value="egov">Economic Governance</option>
          <option value="aff">Adv. Fee Fraud</option>
          <option value="cscam">Contract Scam</option>
          <option value="atmf">ATM Fraud Inv.</option>
        </select>
      </p></td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th align="left" scope="row">Research Officer:</th>
      <td><input name="res_officer" type="text" id="res_officer" size="45" value="<?php echo $res_officer; ?>"/>
        <select name="file_no" size="1" id="file_no">
          <option value="file_1">file1</option>
          <option value="file_2">file2</option>
          <option value="file_3">file3</option>
        </select></td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th align="left" scope="row">Sponsor(s):</th>
      <td><textarea name="res_sponsor" cols="80" rows="2" id="res_sponsor"><?php echo $res_sponsor; ?></textarea></td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th align="left" scope="row">Research Grant/Amount (N):</th>
      <td><input type="text" name="res_amount" id="res_amount" value="<?php echo $res_amount; ?>" /></td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th align="left" scope="row">Abstract:</th>
      <td><textarea class="ckeditor" name="res_abstract" id="res_abstract" cols="80" rows="10">
					  		<?php echo $res_abstract; ?></textarea></td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th align="left" scope="row">Details:</th>
      <td><textarea class="ckeditor" name="res_detail" cols="80" rows="40" id="res_detail">
					  		<?php echo $res_detail; ?></textarea></td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th align="left" scope="row">Keyword(s):</th>
      <td><textarea name="res_keywords" cols="80" rows="4" id="res_keywords">
					  		<?php echo $res_keywords; ?></textarea></td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th align="left" scope="row">Record Control:</th>
      <td valign="middle"><input name="visible" type="checkbox" id="visible" value="1" checked="checked" />
        Show record</td>
    </tr>
    <tr>
      <th align="left" scope="row">&nbsp;</th>
      <td align="center" valign="middle"><p>&nbsp;</p>
        <p>
          <input type="submit" name="save2" id="save2" value="Save Record" />
          <input type="submit" name="reset" id="reset" value="Cancel" />
        </p></td>
    </tr>
  </table>
  <p>
    <input type="hidden" name="adm_user_id" id="adm_user_id" value="<?php echo $adm_user_id; ?>"/>
    <b></b>  </p>
  <p><b>Note</b>: All boxes marked  <span style="color:red"> <b>*</b></span> are compulsory.</p>
<p align="center">
<input name="save" type="submit" id="save" value="save" />&nbsp;&nbsp;
    <input name="cancel" type="submit" id="cancel" value="cancel" 
            onclick="return confirm('This will discard all entries made. Are you sure?')" />
</p>

</form>
