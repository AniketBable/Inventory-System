 
<?php
	require_once("lib/class/functions.php");
	$db = new functions();
	
	if(!isset($_SESSION['current_admin']))
	{	
		header("Location:index.php");
	}
	
	if(isset($_SESSION['current_admin']))
	{	
		$current_admin = $_SESSION['current_admin'];
	}
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Inventory System | Admin Dashboard</title>
      <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />
      <link rel="icon" href="http://html.codedthemes.com/gradient-able/files/assets/images/favicon.ico" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">
      <link rel="stylesheet" type="text/css" href="files/assets/icon/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="files/assets/css/jquery.mCustomScrollbar.css">
      <link rel="stylesheet" href="files/assets/pages/chart/radial/css/radial.css" type="text/css" media="all">
      <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
   </head>
   <body>
      <div class="theme-loader">
         <div class="loader-track">
            <div class="loader-bar"></div>
         </div>
      </div>
      <div id="pcoded" class="pcoded">
         <div class="pcoded-overlay-box"></div>
         <div class="pcoded-container navbar-wrapper">
			<?php require_once('include/navigation.php'); ?>			
             
			<div class="pcoded-main-container">
               <div class="pcoded-wrapper">
                
				<?php require_once('include/dashboard-left-part.php'); ?>
				 
				 <img src="/images/aissmsce.jpg" alt="college-img" style="width:1700px;height:750px;padding-left:230px;">	   
				
				</div>
            </div>
			 
			
         </div>
      </div>
       
      <script src="files/bower_components/jquery/js/jquery.min.js"></script>
      <script src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
      <script src="files/bower_components/popper.js/js/popper.min.js"></script>
      <script src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>
      <script src="files/assets/pages/widget/excanvas.js"></script>
	  <script src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
      <script src="files/bower_components/modernizr/js/modernizr.js"></script>
      <script src="files/assets/js/SmoothScroll.js"></script>
      <script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="files/bower_components/chart.js/js/Chart.js"></script>
      <script src="files/assets/pages/widget/amchart/amcharts.js"></script>
      <script src="files/assets/pages/widget/amchart/serial.js"></script>
      <script src="files/assets/pages/widget/amchart/light.js"></script>
      <script src="files/assets/js/pcoded.min.js"></script>
      <script src="files/assets/js/navbar-image/vertical-layout.min.js"></script>
      <script src="files/assets/pages/dashboard/custom-dashboard.js"></script>
      <script src="files/assets/js/script.js"></script>
   </body>
 </html>