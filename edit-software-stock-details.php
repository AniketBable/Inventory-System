 
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
	
	 if(isset($_GET['software-id']))
	 {
		$software_id = $_GET['software-id'];		
		$_SESSION['software_id'] = $software_id;
	 }
	 else if(isset($_SESSION['software_id']))
	 {
		 $software_id = $_SESSION['software_id'];
	 }
 
	$selected_name_error	=	"";	
	$image_error			=	"";
	$image_error1			=	"";
	$flag					=	0;
	$flag1					=	0;
	$flag2					=	0;
	$flag3					=	0;
	 
	
	 
	$software_data		=	array();
	$software_data		=	$db->fetch_software_stock_details_by_id($software_id);
			
	
	$result_id					=	"";
	$result_supply_order		=	"";
	$result_bill				=	"";
	$result_D_C					=	"";
	$result_supplier			=	"";
	$result_description			=	"";
	$result_received			=	"";
	$result_amount				=	"";
	$result_total				=	"";
	$result_department			=	"";
	$result_staff_name			=	"";
	$result_lab_no				=	"";
	$result_date				=	"";
	$result_given_quantity		=	"";
	$result_remaining_quantity	=	"";
	 
	
	if(!empty($software_data))
	{	
		 
	$result_id					=	$software_data[0];
	$result_supply_order		=	$software_data[1];
	$result_bill				=	$software_data[2];
	$result_D_C					=	$software_data[3];
	$result_supplier			=	$software_data[4];
	$result_description			=	$software_data[5];
	$result_received			=	$software_data[6];
	$result_amount				=	$software_data[7];
	$result_total				=	$software_data[8];
	$result_department			=	$software_data[9];
	$result_staff_name			=	$software_data[10];
	$result_lab_no				=	$software_data[11];
	$result_date				=	$software_data[12];
	$result_given_quantity		=	$software_data[13];
	$result_remaining_quantity	=	$software_data[14];
	 
			
	}
	if(isset($_POST['update-entry']))
	{
		$supply_order		=	$_POST['supply_order'];
		$bill				=	$_POST['bill'];
		$D_C				=	$_POST['D_C'];
		$supplier			=	$_POST['supplier'];
		$description		=	$_POST['description'];
		$received			=	$_POST['received'];
		$amount				=	$_POST['amount'];
		$total				=	$_POST['total'];
		$department			=	$_POST['department'];	 
		$staff_name			=	$_POST['staff_name'];
		$lab_no				=	$_POST['lab_no']; 
		$date 				=	$_POST['date'];
		$given_quantity		=	$_POST['given_quantity'];
		$remaining_quantity	=	$_POST['remaining_quantity'];
		 
		 
			 
			if($db->update_software_stock_details_by_id($supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity,$software_id))	
			{
					  $common_msg	=	"Software Stock Details Updated Successfully.";
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
    <title> Admin | Edit Software Stock Details </title>

 

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
                                            <h5 class="m-b-10">Edit Software Stock Details</h5>
                                            <p class="text-muted m-b-10">You can edit your Software Stock Details..</p>
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard.php"> <i class="fa fa-home"></i> </a>
                                                </li> 
                                                <li class="breadcrumb-item"><a href="view-software-details.php">Software Reports</a>
                                                </li>
												<li class="breadcrumb-item"><a href="edit-software-stock-details.php">Edit Software Stock</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Edit Software Stock</h5>
                                                        <span>Please fill the Software Stock details..</span>
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
																				<label>Supply Order No./Date</label>
																				<input type="text" name="supply_order" placeholder="Enter Supply Order No./Date" required  value="<?php echo $result_supply_order;?>">
																			</div>
																		</div> 
																		<div class="j-unit">
																			<div class="j-input">
																				<label>Bill No./Date</label>
																				<input type="text" name="bill" placeholder="Enter Bill No./Date" required  value="<?php echo $result_bill;?>">
																			</div>
																		</div>
																		<div class="j-unit">
																			<div class="j-input">
																				<label>D/C No.Date</label> 
																				<input type="text" name="D_C" placeholder="Enter D/C No./Date" required  value="<?php echo $result_D_C;?>">
																			</div>
																		</div> 			
                                                                    </div>


                                                                    <div class="j-row">
																		
																		<div class="j-unit">
																			<div class="j-input">
																				<label>Name Of Supplier & Address</label>
																				<textarea spellcheck="false" name="supplier"  placeholder="Enter Name Of Supplier & Address" required ><?php echo $result_supplier;?></textarea>
																				<span class="j-tooltip j-tooltip-right-top">Enter Name Of Supplier & Address</span>
																			</div>
																		</div>
																		
																		<div class="j-unit">
																			<div class="j-input"> 
																				<label>Description Of Material</label>
																				<input type="text" name="description"    value="<?php echo $result_description;?>" > 
																			</div>
																		</div>
																	
																		 <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                <label>Quantity Received</label>
                                                                                <input type="text" name="received" placeholder="Enter Quantity Received" required  value="<?php echo $result_received;?>">
                                                                                <span class="j-tooltip j-tooltip-right-top">Enter Quantity Received</span>
                                                                            </div>
                                                                        </div>
																		<div class="j-row"> 													  
																		
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                 <label>Amount</label>
                                                                                <input type="text" name="amount" placeholder="Enter amount" required  value="<?php echo $result_amount;?>">
																				<span class="j-tooltip j-tooltip-right-top">Enter Amount</span>
																			</div>
                                                                        </div>
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                 <label>Total Amount</label>
                                                                                <input type="text" name="total" placeholder="Enter Total Amount" required  value="<?php echo $result_total;?>">
                                                                                <span class="j-tooltip j-tooltip-right-top">Enter Total Amount</span>
                                                                            </div>
                                                                        </div>
																		 
                                                                    </div>
																		
																		<div class="j-unit">
																			<div class="j-input">
																				<label>Select Department</label>
																				 <select name="department" value="<?php echo $result_department;?>"> 
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
																				<label>Staff Name</label>
																				<input type="text" name="staff_name" required placeholder="Enter Staff Name" required value="<?php echo $result_staff_name;?>">
																			</div>
																		</div>
																		 
                                                                    </div>

																	<div class="j-row">
																		 
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input"> 
																				<label>Lab No.</label>
                                                                                <input type="text" name="lab_no" required placeholder="Enter Lab No." required value="<?php echo $result_lab_no;?>" >
																				<span class="j-tooltip j-tooltip-right-top">Enter Lab No.</span>
																			</div>
                                                                        </div>
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input"> 
																				<label>Lab No.</label>
                                                                                <input type="text" name="date" required placeholder="Enter Date" required value="<?php echo $result_date;?>">
                                                                                <span class="j-tooltip j-tooltip-right-top">Enter Date</span>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
																	  
																	<div class="j-row"> 	 
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input"> 
																				<label>Quantity</label>
                                                                                <input type="text" name="given_quantity" id="given_quantity" required placeholder="Enter Quantity" required value="<?php echo $result_given_quantity;?>">
																				<span class="j-tooltip j-tooltip-right-top">Enter Quantity</span>
																			</div>
                                                                        </div>
                                                                        
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input"> 
																				<label>Remaining Quantity</label>
                                                                                <input type="text" name="remaining_quantity" required  placeholder="Remaining Quantity" id="remaining" value="<?php echo $result_remaining_quantity;?>">
																				<span class="j-tooltip j-tooltip-right-top">Remaining Quantity</span>
																			</div>
                                                                        </div>	
																		 
                                                                    </div>
																	 
																	<div class="j-response"></div>

                                                                </div>

                                                                <div class="j-footer"> 
																	 
																	<input type="submit" value="Update" name="update-entry" class="btn btn-primary" />		
																	<a href="view-software-details.php" class="btn btn-primary">Back</a>
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