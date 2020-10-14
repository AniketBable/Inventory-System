 
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
	
	 if(isset($_GET['computerperipherals-id']))
	 {
		$computerperipherals_id = $_GET['computerperipherals-id'];		
		$_SESSION['computerperipherals_id'] = $computerperipherals_id;
	 }
	 else if(isset($_SESSION['computerperipherals_id']))
	 {
		 $computerperipherals_id = $_SESSION['computerperipherals_id'];
	 }
 
	$selected_name_error	=	"";	
	$image_error			=	"";
	$image_error1			=	"";
	$flag					=	0;
	$flag1					=	0;
	$flag2					=	0;
	$flag3					=	0;
	
	 
	$computerperipherals_data		=	array();
	$computerperipherals_data		=	$db->fetch_computerperipherals_full_details_by_id($computerperipherals_id);
			
	
	$result_id					=	"";
	$result_g_no				=	"";
	$result_challan 			=	"";
	$result_challan_image       =	"";
	$result_bill         		=	"";
	$result_bill_image         	=	"";
	$result_supplier			=	"";
	$result_description			=	"";
	$result_unit				=	"";
	$result_received 			=	"";
	$result_rejected	    	=	"";
	$result_accepted			=	"";
	$result_amount				=	"";
	$result_total	 			=	"";
	$result_date				=	"";
	$result_time				=	"";

	
	if(!empty($computerperipherals_data))
	{	
		 
	$result_id					=	$computerperipherals_data[0];
	$result_g_no				=	$computerperipherals_data[1];
	$result_challan 			=	$computerperipherals_data[2];
	$result_challan_image   	=	$computerperipherals_data[3];
	$result_bill         		=	$computerperipherals_data[4];
	$result_bill_image         	=	$computerperipherals_data[5];
	$result_supplier			=	$computerperipherals_data[6];
	$result_description			=	$computerperipherals_data[7];
	$result_unit				=	$computerperipherals_data[8];
	$result_received 			=	$computerperipherals_data[9];
	$result_rejected	    	=	$computerperipherals_data[10];
	$result_accepted			=	$computerperipherals_data[11];
	$result_amount				=	$computerperipherals_data[12];
	$result_total	 			=	$computerperipherals_data[13];
	$result_date				=	$computerperipherals_data[14];
	$result_time				=	$computerperipherals_data[15];
			
	}
	if(isset($_POST['edit']))
	{
		$g_no			=	$_POST['g_no'];  
		$challan		=	$_POST['challan']; 
		$bill			=	$_POST['bill'];   
		$supplier		=	$_POST['supplier']; 
		$description	=	$_POST['description'];
		$unit			=	$_POST['unit'];		
		$received		=	$_POST['received'];
		$rejected		=	$_POST['rejected'];
		$accepted		=	$_POST['accepted'];
		$amount 		=	$_POST['amount'];
		$total			=	$_POST['total'];
			 
			if($db->update_computerperipherals_full_details_by_id($g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$computerperipherals_id))
			{
					  $common_msg	=	" Computer & Peripherals Records Updated Successfully.";
			}
			else
			{
					$common_msg1	= "Failed";
					 
			}
		
	}   
	
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <title> Admin | Edit  Computer & Peripherals Details </title>

 

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
                                            <h5 class="m-b-10"> Computer & Peripherals Reports</h5>
                                            <p class="text-muted m-b-10">You can edit your  Computer & Peripherals Details ..</p>
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard.php"> <i class="fa fa-home"></i> </a>
                                                </li> 
                                                <li class="breadcrumb-item"><a href="computer&peripherals-reports.php"> Computer & Peripherals Reports</a>
                                                </li>
												 <li class="breadcrumb-item"><a href="edit-computer&peripherals-details.php">Edit  Computer & Peripherals</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Edit Computer & Peripherals</h5>
                                                        <span>Please fill the Computer & Peripherals details..</span>
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

                                                                    <<div class="j-row">
																		
																		<div class="j-unit">
																			<div class="j-input"> 
																				<input type="text" name="g_no" placeholder="Enter G.R.R No." required  value="<?php echo $result_g_no;?>"> 
																			</div>
																		</div>
																	
																		<div class="j-unit">
																			<div class="j-input">
																				<input type="text" name="challan" placeholder="Enter Challan No./Date" required  value="<?php echo $result_challan;?>">
																			</div>
																		</div>
																		
																		<div class="j-unit">
																			<div class="j-input">
																			 
																				<label class="col-sm-4 col-form-label">Change challan Image</label>
																				<div class="col-sm-10">
																					<input  type="file" name="challanimg" ><?php echo $result_challan_image ; ?></input>
																					<span class="messages"></span>
																					<span class="error_msgs"><?php echo $image_error; ?></span>
																				</div>
																			 
																			 </div>
																		</div>
																		
																		<div class="j-unit">
																			<div class="j-input">
																				<input type="text" name="bill" placeholder="Enter Bill No./Date" required  value="<?php echo $result_bill;?>">
																			</div>
																		</div>
																	 	
																		<div class="j-unit">
																			<div class="j-input">
																			 
																				<label class="col-sm-4 col-form-label">Change Bill Image</label>
																				<div class="col-sm-10">
																					<input  type="file" name="billimg" ><?php echo $result_bill_image ?>  </input>
																					<span class="messages"></span>
																					<span class="error_msgs"><?php echo $image_error1; ?></span>
																				</div>
																			 
																			 </div>
																		</div>
						 												 
                                                                    </div>
																	<div class="j-row">
																		
																		 <div class="j-unit">
																			<div class="j-input">
																				<textarea spellcheck="false" name="supplier"  placeholder="Enter Name Of Supplier & Address" required ><?php echo $result_supplier;?></textarea>
																				<span class="j-tooltip j-tooltip-right-top">Enter Name Of Supplier & Address</span>
																			</div>
																		</div>
																		
																		 <div class="j-unit">
																			<div class="j-input">
																				<textarea name="description"  placeholder="Enter Description Of Material" required id="description"><?php echo $result_description;?></textarea>
																				<span class="j-tooltip j-tooltip-right-top">Enter Description Of Material</span>
																			</div>
																		</div>
																	  
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                             
                                                                                <input type="text" name="unit" placeholder="Enter Unit" required  value="<?php echo $result_unit;?>">
																				<span class="j-tooltip j-tooltip-right-top">Enter Unit</span>
																			</div>
                                                                        </div>
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                
                                                                                <input type="text" name="received" placeholder="Enter Quantity Received" required  value="<?php echo $result_received;?>">
                                                                                <span class="j-tooltip j-tooltip-right-top">Enter Quantity Received</span>
                                                                            </div>
                                                                        </div>
																	  
                                                                    </div>
																	  
																	<div class="j-row"> 													  
																		
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                 
                                                                                <input type="text" name="rejected" placeholder="Enter Quantity Rejected" required  value="<?php echo $result_rejected;?>">
																				<span class="j-tooltip j-tooltip-right-top">Enter Quantity Rejected</span>
																			</div>
                                                                        </div>
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                 
                                                                                <input type="text" name="accepted" placeholder="Enter Quantity Accepted" required  value="<?php echo $result_accepted;?>">
                                                                                <span class="j-tooltip j-tooltip-right-top">Enter Quantity Received</span>
                                                                            </div>
                                                                        </div>
																		 
                                                                    </div>
																	
																	<div class="j-row"> 													  
																		
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                 
                                                                                <input type="text" name="amount" placeholder="Enter amount" required  value="<?php echo $result_amount;?>">
																				<span class="j-tooltip j-tooltip-right-top">Enter Amount</span>
																			</div>
                                                                        </div>
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                 
                                                                                <input type="text" name="total" placeholder="Enter Total" required  value="<?php echo $result_total;?>">
                                                                                <span class="j-tooltip j-tooltip-right-top">Enter Total</span>
                                                                            </div>
                                                                        </div>
																		 
                                                                    </div>
													
																	<div class="j-response"></div>

                                                                </div>

                                                                <div class="j-footer"> 
																	<input type="submit" value="Update" name="edit" class="btn btn-primary" />		
																	<a href="computer&peripherals-reports.php" class="btn btn-primary">Back</a>
                                                                </div>

                                                            </form>
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
	
	<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'decription' ); 
	</script> 
	
</body>
</html>