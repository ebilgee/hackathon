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
									<li class="dropdown"><a href="index.php">My Account</a>
									</li>
									<li class="dropdown"><a href="watch.php">Locations</a>
									</li>
									<li class="dropdown"><a href="logout.php">Log Out</a>
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
<section>
	<div class="container">
		<h3>My Recordings</h3>
		<div class="col-md-3">
			<img style="width:100%" src="images/locations/1.jpg">
		</div>
		<div class="col-md-3">
			<img style="width:100%" src="images/locations/1.jpg">
		</div>
		<div class="col-md-3">
			<img style="width:100%" src="images/locations/1.jpg">
		</div>
		<div class="col-md-3">
			<img style="width:100%" src="images/locations/1.jpg">
		</div>
		<a class="button red">Show</a>

		<div class="col-md-12" style="margin-top:80px"></div>
	</div>

	<div class="container">
		<h3>My Pictures</h3>
		<a class="button red">Show</a>
		<div class="col-md-12" style="margin-top:80px"></div>
	</div>

	<div class="container">
		<h3>Near Live Cams</h3>
		<div class="col-md-12">
			
		</div>
		<div id="mapdiv" style="width:100%; height:300px"></div>
  <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
  <script>
    map = new OpenLayers.Map("mapdiv");
    map.addLayer(new OpenLayers.Layer.OSM());

    var lonLat = new OpenLayers.LonLat( -0.1279688 ,51.5077286 )
          .transform(
            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
            map.getProjectionObject() // to Spherical Mercator Projection
          );
     
    var zoom=16;

    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map.addLayer(markers);
    
    markers.addMarker(new OpenLayers.Marker(lonLat));
    
    map.setCenter (lonLat, zoom);
  </script>
	</div>
</section>
<!-- END: SECTION -->


</div>



</body>
</html>
