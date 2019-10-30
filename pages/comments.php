<?php
	if($resproject_details['opentoforum']==1) {
		//Post Comments
		if(isset($_POST['postBtn'])) {
			$question_id = $_POST['question'];
			$response = htmlspecialchars($_POST['response']);
			$user = $_POST['usrname'] . " - " . $_POST['usremail'];
			$post_res_query = sprintf("INSERT INTO `comments` (ques_id, response, added_by) VALUES (%s, '%s', '%s')", $question_id, $response, $user);
			$post_res_result = mysqli_query($db_conn, $post_res_query) or die(mysqli_error($db_conn));
			
			if(!$post_res_result) {
				$notice = "<span style=\"color:red;\">Oops... There was a problem posting your response. Please try again later</span>";
			} else {
				$notice = "<span style=\"color:green;\">Thank you... you response was posted sucessfully.</span>";
			}	
            unset($_POST['postBtn']);		
		}
		
		//Fetch Comments
		$get_res_query = sprintf("SELECT * FROM comments WHERE ques_id=%d AND visible=%d ORDER BY response_id DESC", $resproject_details['res_id'], 1);
		$get_res_result = mysqli_query($db_conn, $get_res_query) or die(mysqli_error($db_conn));
		$rs_response = mysqli_fetch_assoc($get_res_result);
		$total_num_response = mysqli_num_rows($get_res_result);
?>
<?php
	if($total_num_response == 0) {
		echo "<i>No reponse posted yet</i>"; //Show message if no comments posted at all
	} else { //Else Show all comments from user 
?>
	<h4><strong>Comments from users</strong></h4>
    <?php 
		do { ?>
            <hr/>
            From: <strong><?php echo $rs_response['added_by']; ?></strong><br />
            Posted on: <strong><?php echo $rs_response['date_added']; ?></strong><br /><br />
            <?php echo $rs_response['response'] . "<br /><br />"; 
		} while($rs_response = mysqli_fetch_assoc($get_res_result)); ?><br /><hr />
<?php } ?>

    
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Discussion</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post">

                        <input type="hidden" name="question" value="<?php echo $resproject_details['res_id']; ?>" />

                        <div class="form-group row">
                            <label for="usrname" class="col-md-3 col-form-label">Your Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="usrname" id="txtusrname" placeholder="Your Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="usremail" class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="usremail" id="txtusremail" placeholder="Your Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="txtresponse" class="col-md-3 col-form-label">Your Response</label>
                            <div class="col-md-9">
                                <textarea rows="7" class="form-control" name="response" id="txtresponse" placeholder="Your Response"></textarea>
                            </div>
                        </div>
                        
                        <input type="submit" name="postBtn" class="btn btn-success pull-right" value="Post Response" />

                    </form>
                </div> <!-- End of Card-Body    -->
            </div> <!-- End of Card-header    -->
        </div> <!-- End of col-    -->
    </div> <!-- End of row-    -->


<?php } ?>