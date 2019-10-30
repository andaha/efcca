<?php 
	$courseid = $_GET['tr_schdl'];
	$schdlid = $_GET['id'];
?>


<form method="post" class="form-signin" role="form" enctype="multipart/form-data" action="pages/do_participate.php">
	<!-- <div class="alert alert-success">Your registration is successful, we will get back to you.</div> -->
	<h2 class="form-signin-header">Course Participation:</h2>
    <p>Please fill the form below to participate in the scheduled course</p>
    <input type="hidden" name="schdid" value="<?php echo $schdlid; ?>" />
    <input type="hidden" name="courseid" value="<?php echo $courseid; ?>" />
    <input type="text" name="firstname" class="form-control" placeholder="Surname" />
    <input type="text" name="othernames" class="form-control" placeholder="Other Names" />
    <select name="external" id="opExternal" class="form-control">
    	<option value="">EFCC Academy Staff?</option>
        <option value="1">Yes</option>
        <option value="-1">No</option>
    </select>
    <script>
    	var external = document.getElementById('opExternal');
		
		external.onchange = function() {
			if(external.selectedIndex == 1) {
				document.getElementById('staffFileNo').innerHTML = "<input type='text' name='fileno' class='form-control' placeholder='File Number' /><input type='hidden' name='external' value='1' />";
			} else if(external.selectedIndex == 0) {
				document.getElementById('staffFileNo').innerHTML = "<span style='color:orange;' class='form-control'>please select yes or no whether you are a staff of EFCC Academy</span>";
			} else {
				document.getElementById('staffFileNo').innerHTML = "";
			}
		}
    </script>
    <div id="staffFileNo">
    	<span style='color:orange;' class='form-control'>please select 'Yes' to enter your file number if you are a staff of EFCC Academy else 'No'</span>
    </div>
    <textarea name="address" cols="" rows="" class="form-control" placeholder="Address"></textarea>
    <input type="text" name="gsm" class="form-control" placeholder="GSM" />
    <input type="text" name="email"  class="form-control" placeholder="Email address" />
    <input type="text" name="office" class="form-control" placeholder="Office" />
    <textarea name="part_remark" class="form-control" placeholder="Participant Remark"></textarea>
	<input type="year" name="year" id="txtYear" class="form-control" placeholder="Year:" />
    <input type="file" name="photo" class="form-control" /><br />
    <input type="submit" name="coursePartBtn" id="coursePartBtn" value="Participate" class="btn btn-lg btn-primary btn-block" />
</form>