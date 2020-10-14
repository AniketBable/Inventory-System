	
<?php
	require_once("lib/class/functions.php");
	$db = new functions();
	if(!isset($_SESSION['current_admin']))
	{	
		header("Location:index.php");
	}
	$flag4	=	0;
	$flag5	=	0;
	$flag6	=	0;
	$common_msg ="";
	
	if(isset($_GET['del_stationary_id']))
	 {
		$delete_id = $_GET['del_stationary_id'];		
		
		$db->delete_stationary_full_details_by_id($delete_id);
		$common_msg	=	"Stationary record deleted successfully.";
	 }
	 
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inventory System |  Stationary Reports  </title>

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
                                            <h5 class="m-b-10">Stationary Reports</h5>
                                            <p class="text-muted m-b-10">You can view all Stationary Details below..</p>
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard.php"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="add-stationary-details.php">Add Stationary</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="stationary-reports.php">Stationary Reports</a>
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
                                                        <h5>All Blogs By Multi-Column Ordering</h5>
                                                        <span>DataTables allows ordering by multiple columns at the same time, which can be activated in a number of different ways</span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        
																				<th style="width=30;text-align:center;" >Sr. No</th>
																				<th style="width=30;text-align:center;" >G.R.R No</th> 
																				<th style="width=30;text-align:center;" >Challan No./Date</th> 
																				<th style="width=30;text-align:center;" >Challan Image</th> 
																				<th style="width=30;text-align:center;" >Bill No./Date</th> 
																				<th style="width=30;text-align:center;" >Bill Image</th> 
																				<th style="width=30;text-align:center;" >Supplier & Address</th> 						
																				<th style="width=30;text-align:center;" >Description Of Material</th>
																				<th style="width=30;text-align:center;">Unit</th>	
																				<th style="width=30;text-align:center;">Quantity Received</th> 	
																				<th style="width=30;text-align:center;" >Quantity Rejected</th>
																				<th style="width=30;text-align:center;">Quantity Accepted</th>	
																				<th style="width=30;text-align:center;">Amount</th> 
																				<th style="width=30;text-align:center;">Total</th>								
																				<th style="width=30;text-align:center;">Option</th>	
																				<th style="width=30;text-align:center;">Option</th>	
																				<th style="width=30;text-align:center;">Option</th>	
																																
																	</tr>
																	
                                                                </thead>
                                                                <tbody>
																<?php
																	$got_details	=	$db->fetch_stationary_details();
																			if(!empty($got_details))
																			{
																				$counter	=	0;
																				
																				foreach($got_details as $record)
																				{
																					$got_id					=	$got_details[$counter][0];	
																					$got_g_no	    		=	$got_details[$counter][1];
																					$got_challan	    	=	$got_details[$counter][2];  
																					$got_challan_image 		=	$got_details[$counter][3];
																					$got_bill	    		=	$got_details[$counter][4]; 
																					$got_bill_image	    	=	$got_details[$counter][5];
																					$got_supplier   		=	$got_details[$counter][6]; 
																					$got_description	    =	$got_details[$counter][7];
																					$got_unit		    	=	$got_details[$counter][8];
																					$got_received			=	$got_details[$counter][9];
																					$got_rejected			=	$got_details[$counter][10];
																					$got_accepted		    =	$got_details[$counter][11];
																					$got_amount		   		=	$got_details[$counter][12];
																					$got_total				=	$got_details[$counter][13];
																					$got_date				=	$got_details[$counter][14];
																					$got_time				=	$got_details[$counter][15];
																					
																					  
																				?>
                                                                    <tr>
                                                                    	<td><?php echo $counter + 1 ;?></td>
																		<td><?php echo $got_g_no ;?></td> 
																		<td><?php echo $got_challan ;?></td> 
																		<td><a href="/images/challan/<?php echo $got_challan_image; ?>" target="_blank" ><?php echo $got_challan_image ;?> <br> View </a></td> 
																		<td><?php echo $got_bill ;?></td> 
																		<td><a href="/images/bill/<?php echo $got_bill_image; ?>" target="_blank" ><?php echo $got_bill_image ;?> <br> View </a></td> 
																		<td><?php echo $got_supplier ;?></td>  
																		<td><?php echo $got_description ;?></td> 
																		<td><?php echo $got_unit ;?></td> 
																		<td><?php echo $got_received ;?></td> 	 	
																		<td><?php echo $got_rejected ;?></td> 
																		<td><?php echo $got_accepted ;?></td> 
																		<td><?php echo $got_amount ;?></td> 	 	
																		<td><?php echo $got_total ;?></td> 
																		 
																		<td><a href="/view-stationary-details.php?stationary-id=<?php echo $got_id; ?>" target="_blank" class="Edit_option">View</a></td>
																		 
																		<td><a href="/edit-stationary-details.php?stationary-id=<?php echo $got_id; ?>" target="_blank" class="Edit_option">Edit</a></td>
																			
																		<td><a href="/stationary-reports.php?del_stationary_id=<?php echo $got_id; ?>" class="delete_option">Delete</a></td>
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
                                                                        <th style="width=30;text-align:center;" >Sr. No</th>
																		<th style="width=30;text-align:center;" >G.R.R No</th> 
																		<th style="width=30;text-align:center;" >Challan No./Date</th> 
																		<th style="width=30;text-align:center;" >Challan Image</th> 
																		<th style="width=30;text-align:center;" >Bill No./Date</th> 
																		<th style="width=30;text-align:center;" >Bill Image</th> 
																		<th style="width=30;text-align:center;" >Supplier & Address</th> 						
																		<th style="width=30;text-align:center;" >Description Of Material</th>
																		<th style="width=30;text-align:center;">Unit</th>	
																		<th style="width=30;text-align:center;">Quantity Received</th> 	
																		<th style="width=30;text-align:center;" >Quantity Rejected</th>
																		<th style="width=30;text-align:center;">Quantity Accepted</th>	
																		<th style="width=30;text-align:center;">Amount</th> 
																		<th style="width=30;text-align:center;">Total</th>								
																		<th style="width=30;text-align:center;">Option</th>	 
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

                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

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