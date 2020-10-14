 
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
	$flag7	=	0;
	$common_msg	="";
	$common_msg1="";
	
	 if(isset($_GET['printingstationary-id']))
	 {
		$printingstationary_id = $_GET['printingstationary-id'];		
		$_SESSION['printingstationary_id'] = $printingstationary_id;
	 }
	 else if(isset($_SESSION['printingstationary_id']))
	 {
		 $printingstationary_id = $_SESSION['printingstationary_id'];
	 }
 
	$selected_name_error	=	"";	
	$image_error			=	"";
	$flag					=	0;
	$flag1					=	0;
	$flag2					=	0;
	$flag3					=	0;
	
	 
	$printingstationary_data		=	array();
	$printingstationary_data		=	$db->fetch_printingstationary_full_details_by_id($printingstationary_id);
			
	
	$result_id					=	"";
	$result_g_no				=	"";
	$result_challan 			=	"";
	$result_challan_image		=	"";
	$result_bill         		=	"";
	$result_bill_image			=	"";   
	$result_supplier			=	"";
	$result_description			=	"";
	$result_unit				=	"";
	$result_received 			=	"";
	$result_rejected	    	=	"";
	$result_accepted			=	"";
	$result_amount				=	"";
	$result_total	 			=	"";
	 

	
	if(!empty($printingstationary_data))
	{	
		 
	$result_id					=	$printingstationary_data[0];
	$result_g_no				=	$printingstationary_data[1];
	$result_challan 			=	$printingstationary_data[2];
	$result_challan_image  		=	$printingstationary_data[3];
	$result_bill				=	$printingstationary_data[4];
	$result_bill_image			=	$printingstationary_data[5];
	$result_supplier			=	$printingstationary_data[6];
	$result_description			=	$printingstationary_data[7];
	$result_unit				=	$printingstationary_data[8];
	$result_received 			=	$printingstationary_data[9];
	$result_rejected	    	=	$printingstationary_data[10];
	$result_accepted			=	$printingstationary_data[11];
	$result_amount				=	$printingstationary_data[12];
	$result_total	 			=	$printingstationary_data[13];
	 
			
	}
	if(isset($_POST['add-entry']))
	{ 
		$description	=	$_POST['description'];
		$accepted		=	$_POST['accepted'];
		$department		=	$_POST['department'];	 
		$staff_name		=	$_POST['staff_name'];
		$lab_no			=	$_POST['lab_no']; 
		$date 			=	$_POST['date'];
		$given_quantity	=	$_POST['given_quantity'];
		$remaining_quantity	=	$_POST['remaining_quantity'];	 
		
			if($db->add_printingstationary_full_details($description,$accepted,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity))
			{
					 $common_msg	=	"Printing Stationary Records added Successfully.";
			}
			else
			{
					$common_msg1	= "Failed";
					 
			}
		
	}   
	if(isset($_GET['del_printingstationary_id']))
	 {
		$delete_id = $_GET['del_printingstationary_id'];		
		
		$db->delete_printingstationary_details_by_id($delete_id);
		$common_msg	=	"Printing Stationary record deleted successfully.";
	 }
	
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <title> Admin |   Printing Stationary Details </title>

 

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

    <link rel="stylesheet" type="text/css" href="files/assets/pages/j-pro/css/demo.css">
    <link rel="stylesheet" type="text/css" href="files/assets/pages/j-pro/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="files/assets/pages/j-pro/css/j-pro-modern.css">

    <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="files/assets/css/jquery.mCustomScrollbar.css">
	<!--Ck Editor -->
	<script src="https://cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script>    
	
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
                                            <h5 class="m-b-10">  Printing Stationary Details</h5>
                                            <p class="text-muted m-b-10">You can edit your Printing Stationary Details..</p>
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard.php"> <i class="fa fa-home"></i> </a>
                                                </li> 
                                                <li class="breadcrumb-item"><a href="printingstationary-reports.php">Printing Stationary Reports</a>
                                                </li>
												<li class="breadcrumb-item"><a href="edit-printingstationary-details.php">Printing Stationary Details</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5> Printing Stationary Details</h5>
                                                        <span>Please fill the Printing Stationary Details..</span>
                                                    </div>
													<div class="form-group row">
														<div class="col-md-12"> 
															<div class="common_msg" style="color:green;font-size:17px;margin-left: 340px;">
																<?php
																	echo $common_msg;
																?>
															</div>
														</div>
													</div> 
													<div class="form-group row">
														<div class="col-md-12"> 
															<div class="common_msg" style="color:red;font-size:17px;margin-left: 340px;">
																<?php
																	echo $common_msg1;
																?>
															</div>
														</div>
													</div> 
                                                      <div class="card-block">
                                                        <div class="j-wrapper j-wrapper-640">
                                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="j-pro" id="j-pro" enctype="multipart/form-data" >

                                                                <div class="j-content">

                                                                    <div class="j-row">
																		
																		<div class="j-unit">
																			<div class="j-input"> 
																				<label>Description Of Material</label>
																				<input type="text" name="description"  value="<?php echo $result_description;?>" > 
																			</div>
																		</div>
																	
																		<div class="j-unit">
																			<div class="j-input">
																				<label>Quantity Accepted</label>
																				<input type="text" name="accepted" id="total_quantity"  value="<?php echo $result_accepted;?>">
																			</div>
																		</div>
																		
																		<div class="j-unit">
																			<div class="j-input">
																				<label>Select Department</label>
																				 <select name="department"> 
																				  <option value="Comp" selected>Comp</option>
																				  <option value="IT">IT</option>
																				  <option value="Mech">Mech</option>
																				  <option value="Civil">Civil</option>
																				  <option value="E&TC">E&TC</option>
																				</select>
																				
																			</div>
																		</div>
																		
																		<div class="j-unit">
																			<div class="j-input"> 
																				<input type="text" name="staff_name" placeholder="Enter Staff Name" required >
																			</div>
																		</div>
																		 
                                                                    </div>

																	<div class="j-row">
																		 
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input"> 
                                                                                <input type="text" name="lab_no" placeholder="Enter Lab No." required >
																				<span class="j-tooltip j-tooltip-right-top">Enter Lab No.</span>
																			</div>
                                                                        </div>
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input"> 
                                                                                <input type="text" name="date" placeholder="Enter Date" required >
                                                                                <span class="j-tooltip j-tooltip-right-top">Enter Date</span>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
																	  
																	<div class="j-row"> 	 
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input"> 
                                                                                <input type="text" name="given_quantity" id="given_quantity" placeholder="Enter Quantity" required >
																				<span class="j-tooltip j-tooltip-right-top">Enter Quantity</span>
																			</div>
                                                                        </div>
                                                                        
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input"> 
                                                                                <input type="text" name="remaining_quantity" placeholder="Remaining Quantity" id="remaining">
																				<span class="j-tooltip j-tooltip-right-top">Remaining Quantity</span>
																			</div>
                                                                        </div>	
																		 
                                                                    </div>
																	 
																	<div class="j-response"></div>

                                                                </div>

                                                                <div class="j-footer"> 
																	 
																	<input type="submit" value="Submit" name="add-entry" class="btn btn-primary" />		
																	<a href="printingstationary-reports.php" class="btn btn-primary">Back</a>
                                                                </div>

                                                            </form>
                                                        </div> 
                                                    </div>
													
													 <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        
																				<th style="width=30;text-align:center;" >Sr. No</th>
																				<th style="width=30;text-align:center;" >Description Of Material</th> 
																				<th style="width=30;text-align:center;" >Quantity Accepted</th> 
																				<th style="width=30;text-align:center;" >Department</th> 
																				<th style="width=30;text-align:center;" >Staff Name</th> 
																				<th style="width=30;text-align:center;" >Lab No.</th> 
																				<th style="width=30;text-align:center;" >Date</th> 						
																				<th style="width=30;text-align:center;" >Quantity</th>
																				<th style="width=30;text-align:center;">Remaining</th>	 
																				<th style="width=30;text-align:center;">Option</th>	
																				<th style="width=30;text-align:center;">Option</th>	
																																
																	</tr>
																	
                                                                </thead>
                                                                <tbody>
																<?php
																	$got_details	=	$db->fetch_full_printingstationary_details();
																			if(!empty($got_details))
																			{
																				$counter	=	0;
																				
																				foreach($got_details as $record)
																				{
																					$got_id					=	$got_details[$counter][0];	
																					$got_description	    =	$got_details[$counter][1];
																					$got_accepted	    	=	$got_details[$counter][2];  
																					$got_department 		=	$got_details[$counter][3];
																					$got_staff_name	    	=	$got_details[$counter][4]; 
																					$got_lab_no		    	=	$got_details[$counter][5];
																					$got_date   			=	$got_details[$counter][6]; 
																					$got_given_quantity	    =	$got_details[$counter][7];
																					$got_remaining_quantity	=	$got_details[$counter][8];
																				 
																					  
																				?>
                                                                    <tr>
                                                                    	<td><?php echo $counter + 1 ;?></td>
																		<td><?php echo $got_description ;?></td> 
																		<td><?php echo $got_accepted ;?></td> 
																		 <td><?php echo $got_department ;?></td> 
																		<td><?php echo $got_staff_name ;?></td> 
																		<td><?php echo $got_lab_no ;?></td> 	 	
																		<td><?php echo $got_date ;?></td> 
																		<td><?php echo $got_given_quantity ;?></td> 
																		<td><?php echo $got_remaining_quantity ;?></td> 	 	
																		 
																		<td><a href="/edit-printingstationary-details.php?printingstationary-id=<?php echo $got_id; ?>" target="_blank" class="Edit_option">Edit</a></td>
																			
																		<td><a href="/view-printingstationary-details.php?del_printingstationary_id=<?php echo $got_id; ?>" class="delete_option">Delete</a></td>
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
																				<th style="width=30;text-align:center;" >Description Of Material</th> 
																				<th style="width=30;text-align:center;" >Quantity Accepted</th> 
																				<th style="width=30;text-align:center;" >Department</th> 
																				<th style="width=30;text-align:center;" >Staff Name</th> 
																				<th style="width=30;text-align:center;" >Lab No.</th> 
																				<th style="width=30;text-align:center;" >Date</th> 						
																				<th style="width=30;text-align:center;" >Quantity</th>
																				<th style="width=30;text-align:center;">Remaining</th>	 
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
    </div>
  
    <script src="files/bower_components/jquery/js/jquery.min.js"></script>
    <script src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script src="files/bower_components/popper.js/js/popper.min.js"></script>
    <script src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>

    <script src="files/assets/pages/j-pro/js/jquery.ui.min.js"></script>
    <script src="files/assets/pages/j-pro/js/jquery.maskedinput.min.js"></script>
    <script src="files/assets/pages/j-pro/js/jquery.j-pro.js"></script>

    <script src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

    <script src="files/bower_components/modernizr/js/modernizr.js"></script>
    <script src="files/bower_components/modernizr/js/css-scrollbars.js"></script>

    <!--<script src="files/assets/pages/j-pro/js/custom/form-job.js"></script> -->
    <script src="files/assets/js/pcoded.min.js"></script>
    <script src="files/assets/js/navbar-image/vertical-layout.min.js"></script>
    <script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="files/assets/js/script.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>