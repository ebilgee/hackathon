<?php
header('Content-type: text/html; charset=utf-8');
require_once("include/config.php");
if(!isset($_SESSION)){
    session_start(); 
}

if($mmodel->CheckLogin()){
	 $mmodel->RedirectToURL("./dash.php");
}

if(isset($_POST['loginsubmit']))
{
	
   if($mmodel->Login())
   {
        $mmodel->RedirectToURL("./dash");
   }
}

?>
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
						<a href="index.html" class="logo" data-dark-logo="images/logo.png">
							<img src="images/logo.png">
						</a>
					</div>

					<!--NAVIGATION-->
					<div class="navbar-collapse collapse main-menu-collapse navigation-wrap">
						<div class="container">
							<nav id="mainMenu" class="main-menu mega-menu">
								<ul class="main-menu nav nav-pills">
									<li class="dropdown"><a href="index.html">About</a>
									</li>
									<li class="dropdown"><a href="index.html">Contact</a>
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
																<li> <a href="locations.php?l=FR">France</a> </li>
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
<section class="fullscreen text-light fullscreen">
	<div class="background-overlay"></div>
	<div class="container container-fullscreen">
		<div class="text-middle text-light">
			<div class="row">
				<div class="col-md-3 center">
					<h3>Login to your Account</h3>
					<form class="form-grey-fields" action='<?php echo $mmodel->GetSelfScript(); ?>' method='post'>
						<div class="form-group">
							<label class="sr-only"> Email</label>
							<input type="text" placeholder="Email" class="form-control" name="email">

						</div>
						<div class="form-group m-b-5">
							<label class="sr-only">Password</label>
							<input type="password" placeholder="Password" class="form-control" name="password">
							<input type='hidden' name='loginsubmit' id='loginsubmit' value='1'/>
						</div>
						<div class="form-group form-inline text-left m-b-10 ">

							<div class="checkbox">
								<label>
									<input type="checkbox"><small> Remember me</small>
								</label>
							</div>
							<a class="right" href="#"><small>Lost your Password?</small></a>
						</div>
						<div class="text-left form-group">
							<button class="btn btn-danger red" type="submit">Login</button>
							
						</div>
					</form>
					
					<p class="text-left">Login with your social account
					</p>
					<a class="button blue-dark fullwidth rounded" href="#"><i class="fa fa-facebook"></i>  Facebook</a>
					<a class="button blue fullwidth rounded" href="#"><i class="fa fa-twitter"></i>  Twitter</a>
					<a class="button black-light fullwidth rounded" href="#"><i class="fa fa-linkedin"></i>  Linkedin</a>
<br>
					<p class="text-left">Don't have an account yet? <a href="#">Register New Account</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END: SECTION -->
		
		
	</div>

</body>

</html>