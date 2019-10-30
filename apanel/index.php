<?php 
    include("apanel.php");
    @$apanel->logged_in($_SESSION['username'], "home.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <?php include("includes/head.phtml"); ?>
        
        <title>PaySoft</title>

	</head>

	<body class="bg-danger">

	<div id="app">
			<section class="section section-2">
                <div class="container">
					<div class="row">
						<div class="single-page single-pageimage construction-bg cover-image " data-image-src="assets/img/news/img14.jpg">
							<div class="row">
								<div class="col-lg-6">
									<div class="wrapper wrapper2">
										<form id="login" class="card-body" tabindex="500" method="post">
											<h3>Login</h3>
											<div class="mail">
												<input type="text" name="login" placeholder="Username">
												<label>Username</label>
											</div>
											<div class="passwd">
												<input type="password" name="password" placeholder="Password">
												<label>Password</label>
											</div>
											<div class="submit">
												<button type="submit" class="btn btn-danger btn-block" name="loginBtn">Login</button>
											</div>
											<p class="mb-2"><a href="forgot.html" class="text-danger ml-1">Forgot Password</a></p>
											<p class="text-dark mb-0">Don't have account?<a href="register.html" class="text-danger ml-1">Sign UP</a></p>
										</form>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="log-wrapper text-center">
										<!-- <img src="assets/img/brand/logo-white.png" class="mb-2 mt-4 mt-lg-0 " alt="logo"> -->
										<!-- <h1 class="brand-name">PaySoft</h1> -->
										<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure</p>
										<a class="btn btn-danger mt-3" href="#">Read More</a>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</section>
		</div>

		<?php include("includes/scripts.phtml"); ?>
	</body>
</html>
