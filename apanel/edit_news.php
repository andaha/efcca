<?php include("apanel.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <?php include("includes/head.phtml"); ?>
        
        <title>EFCC Academy</title>

	</head>

	<body class="app ">

		<div id="spinner"></div>

		<div id="app">
			<div class="main-wrapper" >
                <!-- Main Site Navigation (NavBar) -->
				<?php  include("includes/main_nav.phtml"); ?>

				<!-- Side Navigation -->
                <?php  include("includes/aside.phtml"); ?>

				<!-- Content -->
                <div class="app-content">
                    <section class="section">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-muted">Administration</a></li>
                            <li class="breadcrumb-item"><a href="news.php" class="text-muted">News</a></li>
                            <li class="breadcrumb-item active text-" aria-current="page">New News</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2>News</h2>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pull-right">
                                                    <a href="news.php" class="btn btn-danger">Show all News</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <?php
                            $get_news = $apanel->get_rec("SELECT * FROM tbl_news WHERE news_id='{$_GET['newsid']}'");
                            $news = $get_news->fetch_assoc();
                        ?>
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>New News</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post">
                                            <input type="hidden" name="news_id" value="<?php echo $news['news_id']; ?>">
                                            <div class="form-group row">
                                                <label for="newsTitle" class="col-md-3 col-form-label">Title</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="news_title" id="newsTitle" placeholder="News Title" value="<?php echo $news['news_title']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newsDate" class="col-md-3 col-form-label">Date Created</label>
                                                <div class="col-md-3">
                                                    <input type="date" class="form-control" name="news_date" id="newsDate" value="<?php echo $news['news_date']; ?>">
                                                </div>
                                                <label for="selvisible" class="col-md-1 col-form-label">Visible</label>
                                                <div class="col-md-2">
                                                    <label class="custom-switch">
                                                        <input type="checkbox" name="visible" value="1" class="custom-switch-input" <?php if($news['visible'] === 1) { echo "checked='checked'"; } ?>>
                                                        <span class="custom-switch-indicator"></span>
													</label>
                                                </div>
                                                <div class="col-md-3">&nbsp;</div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="newsText" class="col-md-3 col-form-label">Content</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="news_text" id="newsText" placeholder="Content" rows="35"><?php echo $news['news_text']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                                <div class="col-md-9">
                                                    <input type="hidden" value="<?php echo $_SESSION['username']; ?>" name="news_by">
                                                    <button type="submit" class="btn btn-info" name="updNewsBtn">Save</button>
                                                    <button type="button" class="btn btn-primary cancel-btn" data-cancel-link="news.php">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </section>
                </div>
                <!-- / End Content -->

                <!-- Footer -->
				<?php  include("includes/footer.phtml"); ?>

			</div>
		</div>

		<?php include("includes/scripts.phtml"); ?>
	</body>
</html>