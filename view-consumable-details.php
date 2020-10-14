 
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
	
	if(isset($_GET['del_consumables_id']))
	 {
		$delete_id = $_GET['del_consumables_id'];		
		
		$db->delete_consumables_stock_details_by_id($delete_id);
		$common_msg	=	"Consumables record deleted successfully.";
	 }
	
	 if(isset($_GET['consumables-id']))
	 {
		$consumable_id = $_GET['consumables-id'];		
		$_SESSION['consumable_id'] = $consumable_id;
	 }
	 else if(isset($_SESSION['consumable_id']))
	 {
		 $consumable_id = $_SESSION['consumable_id'];
	 }
 
	$selected_name_error	=	"";	
	$image_error			=	"";
	$flag					=	0;
	$flag1					=	0;
	$flag2					=	0;
	$flag3					=	0;
	$supply_order			=	"";
	$D_C					=	"";
	
	 
	$consumables_data		=	array();
	$consumables_data		=	$db->fetch_consumable_full_details_by_id($consumable_id);
			
	
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
	 

	
	if(!empty($consumables_data))
	{	
		 
	$result_id					=	$consumables_data[0];
	$result_g_no				=	$consumables_data[1];
	$result_challan 			=	$consumables_data[2];
	$result_challan_image  		=	$consumables_data[3];
	$result_bill				=	$consumables_data[4];
	$result_bill_image			=	$consumables_data[5];
	$result_supplier			=	$consumables_data[6];
	$result_description			=	$consumables_data[7];
	$result_unit				=	$consumables_data[8];
	$result_received 			=	$consumables_data[9];
	$result_rejected	    	=	$consumables_data[10];
	$result_accepted			=	$consumables_data[11];
	$result_amount				=	$consumables_data[12];
	$result_total	 			=	$consumables_data[13];
	 
			
	}
	if(isset($_POST['add-entry']))
	{ 
		$supply_order	=	$_POST['supply_order'];
		$bill			=	$_POST['bill'];
		$D_C			=	$_POST['D_C'];
		$supplier		=	$_POST['supplier']; 
		$received		=	$_POST['received'];
		$description	=	$_POST['description'];
		$amount			=	$_POST['amount'];
		$total			=	$_POST['total'];		
		$department		=	$_POST['department'];	 
		$staff_name		=	$_POST['staff_name'];
		$lab_no			=	$_POST['lab_no']; 
		$date 			=	$_POST['date'];
		$given_quantity	=	$_POST['given_quantity'];
		$remaining_quantity	=	$_POST['remaining_quantity'];	 
		
			if($db->add_consumables_full_details($supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity))
			{
					 $common_msg	=	"Consumables Records added Successfully.";
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
    <title> Admin |   Consumables Details </title>

 

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
                                            <h5 class="m-b-10">  Consumables Stock Details</h5>
                                            <p class="text-muted m-b-10">You can edit your Consumables Details..</p>
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard.php"> <i class="fa fa-home"></i> </a>
                                                </li> 
                                                <li class="breadcrumb-item"><a href="consumable-reports.php">Consumables Stock Reports</a>
                                                </li>
												<li class="breadcrumb-item"><a href="view-consumable-details.php">Consumables Stock Details</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5> Consumables Details</h5>
                                                        <span>Please fill the Consumables Details..</span>
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
																				<label>Enter Supply Order No./Date</label>
																				<input type="text" name="supply_order" placeholder=" " required  value="<?php echo $supply_order;?>">
																			</div>
																		</div> 
																		<div class="j-unit">
																			<div class="j-input">
																				<label>Enter  Bill No./Date</label>
																				<input type="text" name="bill" placeholder=" " required  value="<?php echo $result_bill;?>">
																			</div>
																		</div>
																		<div class="j-unit">
																			<div class="j-input">
																				<label>Enter D/C No./Date</label>
																				<input type="text" name="D_C" placeholder=" " required  value="<?php echo $D_C;?>">
																			</div>
																		</div> 			
                                                                    </div>


                                                                    <div class="j-row">
																		
																		<div class="j-unit">
																			<div class="j-input">
																				<label>Enter Name Of Supplier & Address</label>
																				<textarea spellcheck="false" name="supplier"  placeholder=" " required ><?php echo $result_supplier;?></textarea>
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
                                                                                <label>Enter Quantity Received</label>
                                                                                <input type="text" name="received" placeholder=" " required  value="<?php echo $result_received;?>">
                                                                                <span class="j-tooltip j-tooltip-right-top">Enter Quantity Received</span>
                                                                            </div>
                                                                        </div>
																		<div class="j-row"> 													  
																		
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                 <label>Enter Amount</label>
                                                                                <input type="text" name="amount" placeholder=" " required  value="<?php echo $result_amount;?>">
																				<span class="j-tooltip j-tooltip-right-top">Enter Amount</span>
																			</div>
                                                                        </div>
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                 <label>Enter Total Amount</label>
                                                                                <input type="text" name="total" placeholder=" " required  value="<?php echo $result_total;?>">
                                                                                <span class="j-tooltip j-tooltip-right-top">Enter Total Amount</span>
                                                                            </div>
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
																				<label>Enter Staff Name</label>
																				<input type="text" name="staff_name" required placeholder="Enter Staff Name" required >
																			</div>
																		</div>
																		 
                                                                    </div>

																	<div class="j-row">
																		 
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input"> 
																				<label>Enter Lab No.</label>
                                                                                <input type="text" name="lab_no" required placeholder="Enter Lab No." required >
																				<span class="j-tooltip j-tooltip-right-top">Enter Lab No.</span>
																			</div>
                                                                        </div>
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
																				<label>Enter Date</label>
                                                                                <input type="text" name="date" required placeholder="dd.mm.yyyy" required >
                                                                                <span class="j-tooltip j-tooltip-right-top">Enter Date</span>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
																	  
																	<div class="j-row"> 	 
																		<div class="j-span6 j-unit">
                                                                            <div class="j-input"> 
																				<label>Enter Quantity</label>
                                                                                <input type="text" name="given_quantity" id="given_quantity" required placeholder="Enter Quantity" required >
																				<span class="j-tooltip j-tooltip-right-top">Enter Quantity</span>
																			</div>
                                                                        </div>
                                                                        
																		<div class="j-span6 j-unit">
                                                                            <!-- <div class="j-input"> 
																				<label>Remaining Quantity</label>
                                                                                <input type="text" name="remaining_quantity" required  placeholder="Remaining Quantity" id="remaining">
																				<span class="j-tooltip j-tooltip-right-top">Remaining Quantity</span>
																			</div> -->
                                                                        </div>	
																		 
                                                                    </div>
																	 
																	<div class="j-response"></div>

                                                                </div>

                                                                <div class="j-footer"> 
																	 
																	<input type="submit" value="Submit" name="add-entry" class="btn btn-primary" />		
																	<a href="consumables-reports.php" class="btn btn-primary">Back</a>
                                                                </div>

                                                            </form>
                                                        </div> 
                                                    </div>
													
													 <div class="card-block">
													 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
															<script type="text/javascript">
																  $(document).ready(function() {
																  $("#btnExport").click(function(e) {
																	e.preventDefault();

																	//getting data from our table
																	var data_type = 'data:application/vnd.ms-excel';
																	var table_div = document.getElementById('table_wrapper');
																	var table_html = table_div.outerHTML.replace(/ /g, '%20');

																	var a = document.createElement('a');
																	a.href = data_type + ', ' + table_html;
																	a.download = 'Consumables Report.xls';
																	a.click();
																  });
																});
															</script>
													
														<center><button id="btnExport" class="btn btn-primary"  >Export to xls</button></center>
													  
                                                        <div class="dt-responsive table-responsive" id="table_wrapper">
                                                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        
																				<th style="width=30;text-align:center;" >Sr. No</th> 
																				<th style="width=30;text-align:center;" >Supply Order No./Date</th>
																				<th style="width=30;text-align:center;" >Bill No.</th>
																				<th style="width=30;text-align:center;" >D/C No./Date</th>
																				<th style="width=30;text-align:center;" >Name of Supplier & Address</th>
																				<th style="width=30;text-align:center;" >Description Of Material</th> 
																				<th style="width=30;text-align:center;" >Quantity Received</th>
																				<th style="width=30;text-align:center;" >Rate</th>
																				<th style="width=30;text-align:center;" >Amount</th>
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
																	$got_details	=	$db->fetch_full_consumables_details();
																			if(!empty($got_details))
																			{
																				$counter	=	0;
																				
																				foreach($got_details as $record)
																				{
																					$got_id					=	$got_details[$counter][0];
																					$got_supply_order		=	$got_details[$counter][1];
																					$got_bill				=	$got_details[$counter][2];
																					$got_D_C				=	$got_details[$counter][3];
																					$got_supplier			=	$got_details[$counter][4];
																					$got_description	    =	$got_details[$counter][5];
																					$got_received	    	=	$got_details[$counter][6]; 
																					$got_amount	    		=	$got_details[$counter][7];
																					$got_total	    		=	$got_details[$counter][8];																						
																					$got_department 		=	$got_details[$counter][9];
																					$got_staff_name	    	=	$got_details[$counter][10]; 
																					$got_lab_no		    	=	$got_details[$counter][11];
																					$got_date   			=	$got_details[$counter][12]; 
																					$got_given_quantity	    =	$got_details[$counter][13];
																					$got_remaining_quantity	=	$got_details[$counter][14];
																				 
																					  
																				?>
                                                                    <tr>
                                                                    	<td><?php echo $counter + 1 ;?></td>
																		<td><?php echo $got_supply_order;?></td>
																		<td><?php echo $got_bill;?></td>
																		<td><?php echo $got_D_C;?></td> 
																		<td><?php echo $got_supplier ;?></td> 
																		<td><?php echo $got_description ;?></td> 
																		<td><?php echo $got_received ;?></td>
																		<td><?php echo $got_amount ;?></td>
																		<td><?php echo $got_total ;?></td>
																		<td><?php echo $got_department ;?></td>																		
																		<td><?php echo $got_staff_name ;?></td> 
																		<td><?php echo $got_lab_no ;?></td> 	 	
																		<td><?php echo $got_date ;?></td> 
																		<td><?php echo $got_given_quantity ;?></td> 
																		<td><?php echo $got_remaining_quantity ;?></td> 	 	
																		 
																		<td><a href="/edit-consumable-stock-details.php?consumables-id=<?php echo $got_id; ?>" target="_blank" class="Edit_option">Edit</a></td>
																			
																		<td><a href="/view-consumable-details.php?del_consumables_id=<?php echo $got_id; ?>" class="delete_option">Delete</a></td>
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