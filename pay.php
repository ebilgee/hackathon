<?php
require_once("include/config.php");
$info ='';
$total='';
$duration='';

if(isset($_POST['dur'])){
	$duration=$_POST['dur'];
	$total=$duration/10+1;
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
		<header id="header" class="background-dark header-dark">
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

    

<!-- PAGE TITLE -->
<section id="page-title" class="background-dark text-light no-padding">
    <div class="container">
        <div class="page-title col-md-8" style="margin-top:15px">
            <h1 >Buy Recording</h1>
            
        </div>
        
    </div>
</section>
<!-- END: PAGE TITLE -->

<!-- SHOP CHECKOUT -->
<section id="shop-checkout">
	<div class="container">
		<div class="shop-cart">
			<form method="post" class="sep-top-md">
				<div class="row">
					<div class="col-md-6 no-padding">
						<div class="col-md-12">
							<h4 class="upper">Billing & Shipping Address</h4>
						</div>
						<div class="col-md-12 form-group">
							<label class="sr-only">Card Number</label>
							<input type="text" class="form-control input-lg" placeholder="Card Number" value="">
						</div>
						<div class="col-md-6 form-group">
							<label class="sr-only">First Name</label>
							<input type="text" class="form-control input-lg" placeholder="First Name" value="">
						</div>
						<div class="col-md-6 form-group">
							<label class="sr-only">Last Name</label>
							<input type="text" class="form-control input-lg" placeholder="Last Name" value="">
						</div>
						<div class="col-md-12 form-group">
							<label class="sr-only">CVV</label>
							<input type="text" class="form-control input-lg" placeholder="CVV" value="">
						</div>
						<div class="col-md-12 form-group">
							<label class="sr-only">Address</label>
							<input type="text" class="form-control input-lg" placeholder="Address" value="">
						</div>
						<div class="col-md-6 form-group">
							<label class="sr-only">Town / City</label>
							<input type="text" class="form-control input-lg" placeholder="Town / City" value="">
						</div>
						<div class="col-md-6 form-group">
							<label class="sr-only">State / County</label>
							<input type="text" class="form-control input-lg" placeholder="State / County" value="">
						</div>
						<div class="col-md-6 form-group">
							<label class="sr-only">Postcode / Zip</label>
							<input type="text" class="form-control input-lg" placeholder="Postcode / Zip" value="">
						</div>
						<div class="col-md-6 form-group">
							<label class="sr-only">Phone</label>
							<input type="text" class="form-control input-lg" placeholder="Phone" value="">
						</div>
						
					</div>

					<div class="col-md-6">
					<div class="table-responsive">
						<h4>Order Total</h4>

						<table class="table">
							<tbody>
								<tr>
									<td class="cart-product-name">
										<strong>Order Fixed</strong>
									</td>

									<td class="cart-product-name text-right">
										<span class="amount">$1</span>
									</td>
								</tr>
								<tr>
									<td class="cart-product-name">
										<strong>Record Duration</strong>
									</td>

									<td class="cart-product-name  text-right">
										<span class="amount"><?php echo $duration;?></span>
									</td>
								</tr>
								<tr>
									<td class="cart-product-name">
										<strong>Per second</strong>
									</td>

									<td class="cart-product-name  text-right">
										<span class="amount">10 cents</span>
									</td>
								</tr>
								<tr>
									<td class="cart-product-name">
										<strong>Total</strong>
									</td>

									<td class="cart-product-name text-right">
										<span class="amount color lead"><strong>$<?php echo $total;?></strong></span>
									</td>
								</tr>
							</tbody>

						</table>

					</div>
				</div>
				<div class="col-md-6">
					<h4 class="upper">Payment Method</h4>

					<table class="payment-method table table-bordered table-condensed table-responsive">
						<tbody>
							<tr>
								<td>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" value=""><b class="dark">Direct Bank Transfer</b>
											<br>
										</label>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" value=""  checked=""> <b class="dark">Credit Card Payment</b>
										</label>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios" value="" >Paypal
										</label>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					<a class="button color button-3d rounded icon-left float-right" href="#"><span>Pay</span></a>
				</div>

					
				</div>



			</form>




		</div>
	</div>
</section>
<!-- END: SHOP CHECKOUT -->


</div>



</body>
</html>
