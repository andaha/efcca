<form method="post" class="form-signin" role="form" enctype="multipart/form-data" action="pages/do_event_reg.php">
    <!-- <span class="alert alert-success alert-dismissable">Your registration is successful, we will get back to you.</span> -->
    <h2 class="form-signin-header">Event Registration:</h2>
    <p>Please fill the form below to register for the selected event</p>
    <input type="hidden" name="event" value="<?php echo $_GET['evid']; ?>" />
    <input type="text" name="title" class="form-control" placeholder="Title" />
    <input type="text" name="surname" class="form-control" placeholder="Surname" />
    <input type="text" name="othernames" class="form-control" placeholder="Other Names" />
    <input type="text" name="rank" class="form-control" placeholder="Designation / Rank" />
    <input type="text" name="organization" class="form-control" placeholder="Organization" />
    <input type="text" name="country" class="form-control" placeholder="Country" />
    <input type="text" name="email"  class="form-control" placeholder="Email address" />
    <input type="text" name="gsm" class="form-control" placeholder="GSM" />
    <input type="file" name="photo" class="form-control" /><br />
    <input type="submit" name="eventRegBtn" id="eventRegBtn" value="Register" class="btn btn-lg btn-primary btn-block" />
</form>