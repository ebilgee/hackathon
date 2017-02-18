<?php
require_once("include/config.php");
$info ='';
if($mmodel->CheckLogin())
{
	$info = "<a class='button green'>Take Picture</a><a class='button red-dark'>Record Video</a>";

}else{

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


<body class="wide" >
	

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
            <h1 >Live: Omaha Nebraska</h1>
            
        </div>
        
    </div>
</section>
<!-- END: PAGE TITLE -->


<!-- SECTION -->
<section>
	<div class="container">
		<div class="col-md-11" style=" text-align:center">
			 <video autoplay style="height:500px; width: 720px;" id="vid"></video>
			 <h1 id="timerdd"><time>00:00:00</time></h1>
      			<p><button class="btn btn-lg btn-primary" onclick="getStream()">Start Record</button><button class="btn btn-lg btn-primary" onclick="download()">Finish & Download!</button></p>
		</div>
		

		<div class="col-md-12" style="margin-top:80px">
		

		</div>
	</div>
</section>
<!-- END: SECTION -->


</div>
<script type="text/javascript">
    	
var h1 = document.getElementById('timerdd'),
    seconds = 0, minutes = 0, hours = 0,
    t;

function add() {
    seconds++;
    if (seconds >= 60) {
        seconds = 0;
        minutes++;
        if (minutes >= 60) {
            minutes = 0;
            hours++;
        }
    }
    
    h1.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

    timer();
}
function timer() {
    t = setTimeout(add, 1000);
}


    </script>
 <script>
      
      function getUserMedia(options, successCallback, failureCallback) {
  var api = navigator.getUserMedia || navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia || navigator.msGetUserMedia;
  if (api) {
    return api.bind(navigator)(options, successCallback, failureCallback);
  }
  alert('User Media API not supported.');
}

var theStream;
var theRecorder;
var recordedChunks = [];

var video = document.querySelector("#vid");
 
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
 
if (navigator.getUserMedia) {       
    navigator.getUserMedia({video: true}, handleVideo, videoError);
}
 
function handleVideo(stream) {
    video.src = window.URL.createObjectURL(stream);
}
 
function videoError(e) {
    // do something
}

function getStream() {
  var constraints = {video: true, audio: true};
  timer();
  getUserMedia(constraints, function (stream) {
    var mediaControl = document.querySelector('video');
    if (navigator.mozGetUserMedia) {
      mediaControl.mozSrcObject = stream;
    } else {
      mediaControl.srcObject = stream;
      mediaControl.src = (window.URL || window.webkitURL).createObjectURL(stream);
    }
    
    theStream = stream;
    try {
      recorder = new MediaRecorder(stream, {mimeType : "video/webm"});
    } catch (e) {
      console.error('Exception while creating MediaRecorder: ' + e);
      return;
    }
    theRecorder = recorder;
    console.log('MediaRecorder created');
    recorder.ondataavailable = recorderOnDataAvailable;
    recorder.start(100);
  }, function (err) {
    alert('Error: ' + err);
  });
}

function Record(){

}

function recorderOnDataAvailable (event) {
  if (event.data.size == 0) return;
  recordedChunks.push(event.data);
}

function download() {
	clearTimeout(t);
	h1.textContent = "00:00:00";
    seconds = 0; minutes = 0; hours = 0;

  console.log('Saving data');
  theRecorder.stop();
  theStream.getTracks()[0].stop();

  var blob = new Blob(recordedChunks, {type: "video/webm"});
  var url = (window.URL || window.webkitURL).createObjectURL(blob);
  var a = document.createElement("a");
  document.body.appendChild(a);
  a.style = "display: none";
  a.href = url;
  a.download = 'record.webm';
  a.click();
  
  // setTimeout() here is needed for Firefox.
  setTimeout(function () {
      (window.URL || window.webkitURL).revokeObjectURL(url);
  }, 100); 
}
    </script>

    


</body>
</html>
