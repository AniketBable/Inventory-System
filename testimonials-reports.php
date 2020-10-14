 <?php
	require_once("../lib/class/functions.php");
	$db = new functions();
	if(!isset($_SESSION['current_admin']))
	{	
		header("Location:/admin/index.php");
	}
	 
	$common_msg	=	"";
	 
	 if(isset($_GET['del_client_id']))
	 {
		$delete_id = $_GET['del_client_id'];		
		
		$db->delete_testimonials_by_id($delete_id);
		$common_msg	=	"client review deleted successfully.";
	 }
	 
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Testimonial Reports  </title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#" />
    <meta name="keywords" content="#" />
    <meta name="author" content="#" />

    <link rel="icon" href="http://html.codedthemes.com/gradient-able/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">

    <link rel="stylesheet" type="text/css" href="files/assets/icon/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
	
	<link rel="stylesheet" type="text/css" href="files/assets/css/stylesheet.css">
		
    <link rel="stylesheet" type="text/css" href="files/assets/css/jquery.mCustomScrollbar.css">
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
				
									
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-header card">
                                        <div class="card-block">
                                            <h5 class="m-b-10">All Websites Testimonial Reports</h5>
                                            <p class="text-muted m-b-10">You can view all clients Reviews about our website.</p>
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard.php"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="add-testimonials.php">Add Testimonials</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="testimonials-reports.php">Testimonials Reports</a>
                                                </li>
                                            </ul>
                                        </div> 
										<div class="form-group row">
														<div class="col-md-12"> 
															<div class="common_msg" style="color:red;font-size:17px;margin-left: 340px;">
																<?php
																	echo $common_msg;
																?>
															</div>
														</div>
										</div> 
										
                                    </div>


                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
												 
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>All Testimonials By Multi-Column Ordering</h5>
                                                        <span>DataTables allows ordering by multiple columns at the same time, which can be activated in a number of different ways</span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        
																		<th style="width=30;text-align:center;" >Sr. no</th>
																		<th style="width=30;text-align:center;" >Client Name</th> 
																		<th style="width=30;text-align:center;" >Age</th> 
																		<th style="word-wrap: break-word;min-width:40px;max-width: 60px;text-align:center;" >Review</th>  
																		<th style="width=30;text-align:center;">Option</th>								
																		<th style="width=30;text-align:center;">Option</th>	
																		
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
																<?php
																$got_details	=	$db->fetch_testimonial_details();
																		if(!empty($got_details))
																		{
																			$counter	=	0;
																			
																			foreach($got_details as $record)
																			{
																				$got_id					=	$got_details[$counter][0];	
																				$got_client_name	    =	$got_details[$counter][1];
																				$got_client_age	    	=	$got_details[$counter][2]; 
																				$got_client_review    	=	$got_details[$counter][3]; 																				
																				  
																			?>
                                                                    <tr>
                                                                        	<td><?php echo $counter + 1 ;?></td>
																			<td><?php echo $got_client_name ;?></td> 
																			<td><?php echo $got_client_age ;?></td> 
																			<td><?php echo $got_client_review ;?></td>  	
																			
																			<td><a href="/admin/edit-testimonials.php?client-name=<?php echo $got_client_name; ?>" target="_blank" class="Edit_option">Edit</a></td>
																				
																			<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?del_client_id=<?php echo $got_id; ?>" class="delete_option">Delete</a></td>
																		
                                                                    </tr>
																	<?php
																		$counter++;
																		}
																		
																	}
																	else
																	{
																?>		<tr>
																			<td colspan="8">No data to list</td>
																		</tr>
																<?php
																	}				
																?>	
                                                                    
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th style="width=30;text-align:center;" >Sr. no</th>
																		<th style="width=30;text-align:center;" >Client Name</th> 
																		<th style="width=30;text-align:center;" >Age</th> 
																		<th style="word-wrap: break-word;min-width:40px;max-width: 60px;text-align:center;">Review</th>  
																		<th style="width=30;text-align:center;">Option</th>								
																		<th style="width=30;text-align:center;">Option</th>	
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div id="styleSelector">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->


    <script src="files/bower_components/jquery/js/jquery.min.js"></script>
    <script src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script src="files/bower_components/popper.js/js/popper.min.js"></script>
    <script src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>

    <script src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

    <script src="files/bower_components/modernizr/js/modernizr.js"></script>
    <script src="files/bower_components/modernizr/js/css-scrollbars.js"></script>

    <script src="files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="files/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="files/assets/pages/data-table/js/data-table-custom.js"></script>
    <script src="files/assets/js/pcoded.min.js"></script>
    <script src="files/assets/js/navbar-image/vertical-layout.min.js"></script>
    <script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="files/assets/js/script.js"></script>
</body>
 </html>