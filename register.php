<?php
require_once("include/config.php");
if(!isset($_SESSION)){
    session_start(); 
}

if(isset($_POST['submitted']))
{
	

   	if($mmodel->RegisterUser())
   	{
		$mmodel->RedirectToURL("index.php");
   	}
}?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="fontawesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">
	<link href="animateit/animate.min.css" rel="stylesheet">
	<!--Custom css-->

	<link href="css/base.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">


	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800" rel="stylesheet" type="text/css" />

	<script src="jquery/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/plugins-compressed.js"></script>
	</head>


<body class="wide">
	

	<!-- WRAPPER -->
	<div class="wrapper">

		<!-- HEADER -->
		<header id="header" class="header-transparent header-dark header-fullwidth">
			<div id="header-wrap">
				<div class="container">

					<!--lOOGO-->
					<div id="logo">
						<a href="index.php" class="logo" data-dark-logo="images/logo.png">
							<img src="images/logo.png">
						</a>
					</div>

					<!--NAVIGATION-->
					<div class="navbar-collapse collapse main-menu-collapse navigation-wrap">
						<div class="container">
							<nav id="mainMenu" class="main-menu mega-menu">
								<ul class="main-menu nav nav-pills">
									<li class="dropdown"><a href="index.php">About</a>
									</li>
									<li class="dropdown"><a href="index.php">Contact</a>
									</li>
									
									<li class="dropdown mega-menu-item"> <a href="#">Locations<i class="fa fa-angle-down"></i></a>
										<ul class="dropdown-menu">
											<li class="mega-menu-content">
												<div class="row">
													<div class="col-md-4">
														<ul>
														<li class="mega-menu-title">Europe</li>
														</ul>
														<div class="col-md-6">
															<ul>
																<li> <a href="#">France</a> </li>
																<li> <a href="#">Germany</a> </li>
																<li> <a href="#">Netherland</a> </li>
																<li> <a href="#">Sweden</a> </li>
																<li> <a href="#">Finland</a> </li>
															</ul>
														</div>
														<div class="col-md-6">
															<ul>
																<li> <a href="#">Italy</a> </li>
																<li> <a href="#">Portugal</a> </li>
																<li> <a href="#">Spain</a> </li>
																<li> <a href="#">Russia</a> </li>
																<li> <a href="#">Turkey</a> </li>
															</ul>
														</div>
													</div>
													<div class="col-md-4">
														<ul>
															<li class="mega-menu-title">Asia/Pacific</li>
														</ul>
														<div class="col-md-6">
															<ul>
																<li> <a href="#">Singapore</a> </li>
																<li> <a href="#">Malaysia</a> </li>
																<li> <a href="#">Australia</a> </li>
																<li> <a href="#">China</a> </li>
																<li> <a href="#">New Zealand</a> </li>
																<li> <a href="#">Vietnam</a> </li>
															</ul>
														</div>
														<div class="col-md-6">
															<ul>
																<li> <a href="#">Indonesia</a> </li>
																<li> <a href="#">Japan</a> </li>
																<li> <a href="#">South Korea</a> </li>
																<li> <a href="#">Mongolia</a> </li>
																<li> <a href="#">Phillipines</a> </li>
															</ul>
														</div>
													</div>
													<div class="col-md-2">
														<ul>
															<li class="mega-menu-title">America</li>
															<li> <a href="#">USA</a> </li>
															<li> <a href="#">Canada</a> </li>
															<li> <a href="#">Brasilia</a> </li>
															<li> <a href="#">Mexico</a> </li>
															<li> <a href="#">Costa Rica</a> </li>
														</ul>
													</div>
													<div class="col-md-2">
														<ul>
															<li class="mega-menu-title">Africa</li>
															<li> <a href="#">South Africa</a> </li>
															<li> <a href="#">Tunisia</a> </li>
															<li> <a href="#">Morocco</a> </li>
															<li> <a href="#">Congo</a> </li>
															<li> <a href="#">Togo</a> </li>
														</ul>
													</div>
													<div class="col-md-12 m-t-20">
														<ul>
															<li class="mega-menu-title"><span class="label label-danger">LOCATIONS</span> NAVIGATE</li>
														</ul>
														<div class="col-md-2">
															<ul>
																<li> <a href="#">Featured</a> </li>
															</ul>
														</div>
														<div class="col-md-2">
															<ul>
																<li> <a href="#">Top Places</a> </li>
															</ul>
														</div>
														<div class="col-md-2">
															<ul>
																<li> <a href="#">All Locations</a> </li>
															</ul>
														</div>
														<div class="col-md-2">
															<ul>
																<li> <a href="#">Recommended</a> </li>
															</ul>
														</div>
														<div class="col-md-2">
															<ul>
																<li> <a href="#">Your friends</a> </li>
															</ul>
														</div>
														
														
													</div>
												</div>
											</li>
										</ul>
									</li>
									
								</ul>
							</nav>
						</div>
					</div>
					<!--END: NAVIGATION-->
				</div>
			</div>
		</header>


		<!-- SECTION -->
		<section class="parallax fullscreen">
			<div class="background-overlay"></div>
			<div class="container container-fullscreen">
				<div class="text-middle text-light">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 p-30">
							<div class="col-md-12">
								<h3>Register New Account</h3>
								<p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
							</div>
							<form class="form-transparent-fields" action='<?php echo $mmodel->GetSelfScript(); ?>' method='post'>
								<div class="col-md-6 form-group">
									<label class="sr-only">First Name</label>
									<input type="text" value="" placeholder="First Name" class="form-control input-lg" name="firstname">
								</div>
								<div class="col-md-6 form-group">
									<label class="sr-only">Last Name</label>
									<input type="text" value="" placeholder="Last Name" class="form-control input-lg" name="lastname">
								</div>
								<div class="col-md-12 form-group">
									<label class="sr-only">Email</label>
									<input type="text" value="" placeholder="Email" class="form-control input-lg" name="email">
								</div>
								<div class="col-md-12 form-group">
									<label class="sr-only">Password</label>
									<input type="password" value="" placeholder="Password" class="form-control input-lg" name="password">

								</div>

								
								<div class="col-md-12 form-group">
									<label class="sr-only">Country</label>
									<input type="text" value="" placeholder="Country" class="form-control input-lg" name="country">
								</div>
								<input type='hidden' name='submitted' id='submitted' value='1'/>
								<div class="col-md-12 form-group">
									<input type="submit" class="button black-light rounded" >
								</div>
							</form>

							

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- END: SECTION -->


	</div>
	<!-- END: WRAPPER -->




</body>

</html>
