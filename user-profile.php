<?php
	require_once("lib/class/functions.php");
	$db = new functions();
	if(!isset($_SESSION['current_admin']))
	{	
		header("Location:index.php");
	}
	 
	
	 
	$u_fname			=	 "";
	$u_lname			=	 "";
	$u_about			=	 "";
	$u_address			=	 "";
	$u_bday				=	 "";
	$u_occupation		=	 "";
	$u_mobile			=	 "";
	$u_email			=	 "";

	$actual_image_name	=	"";
	$image_error		=	"";
	 
	$flag					=	0;
	$flag1					=	0;
	$flag2					=	0;
	$flag3					=	0;
	
	$login_email	=	$_SESSION['current_admin'];
							
	$user_data		=	array();
	$user_data		=	$db->get_user_data_from_email($login_email);
	
	$result_id			=	"";
	$result_fname		=	"";
	$result_lname		=	"";
	$result_about		=	"";
	$result_address		=	"";
	$result_bday		=	"";
	$result_occupation	=	"";
	$result_mobile		=	"";
	$result_image		=	"";
	$result_email		=	"";
	$result_password	=	"";
	
	if(!empty($user_data))
	{	
		$result_id		=	$user_data[0];
		$result_fname	=	$user_data[1];
		$result_lname	=	$user_data[2];
		$result_about	=	$user_data[3];
		$result_address	=	$user_data[4];
		$result_bday	=	$user_data[5];
		$result_occupation=	$user_data[6];
		$result_mobile	=	$user_data[7];
		$result_image	=	$user_data[8];
		$result_email	=	$user_data[9];
		$result_password=	$user_data[10];
	}
	
	$common_msg	=	"";
	$common_msg1	=	"";
	$conf_pwd_error	=	"";
	$cur_pwd_error		=	"";
	$new_pwd_error		=	"";
	$flag				=	0;
	
	if(isset($_POST['submit_btn']))	
	{
		$cur_pwd	=	$_POST['current_password'];
		$new_pwd	=	$_POST['new_password'];
		$conf_pwd	=	$_POST['confirm_password'];
		
		if(strlen($cur_pwd)<6)
		{
			$cur_pwd_error		=	"Please enter at least 6 characters";
			$flag				=	1;
		}
		
		if(strlen($new_pwd)<6)
		{
			$new_pwd_error		=	"Please enter at least 6 characters";
			$flag				=	1;
		}
		else if($new_pwd!=$conf_pwd)
		{
			$conf_pwd_error	=	"Please match the password";
			$flag				=	1;
		}
		
		if($flag==0)
		{
			$db_password = $db->get_user_password($login_email);
			
			if($db_password==$cur_pwd)
			{
				//update
				if($db->update_user_password($login_email,$new_pwd))
				{
					$common_msg	=	"Your password has been changed.";
				}
				else{
					$common_msg	=	"Failed";
				}
			}
			else
			{
				$common_msg	=	"Incorrect password";
			}
		}
		
	}
	if(isset($_POST['sub_btn']))
	{
		$u_fname			=	$_POST['u-fname'];
		$u_lname			=	$_POST['u-lname'];
		$u_about			=	$_POST['u-about'];
		$u_address			=	$_POST['u-address'];
		$u_bday				=	$_POST['u-b-day'];
		$u_occupation		=	$_POST['u-occupation'];
		$u_mobile			=	$_POST['u-mobile'];
		$u_email			=	$_POST['u-email'];
		 
		 
		$valid_formats = array("jpg","png","gif","bmp","jpeg","JPEG","JPG","BMP","PNG","GIF");
	
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			 
			$name 				= 	$_FILES['photoimg']['name'];
			$size 				= 	$_FILES['photoimg']['size'];
			 
			if(strlen($name))
				{	  			
					list($txt, $ext) = explode(".", $name);
					
					if(in_array($ext,$valid_formats))
					{
						$files	=	array();
						
						$actual_image_name = $name;
		
						$tmp = $_FILES['photoimg']['tmp_name'];
						
						$img_Dir = "images/profile/";
						
						if(!file_exists($img_Dir))
						{
							mkdir($img_Dir);
						}
						
						if(move_uploaded_file($tmp,$img_Dir.$actual_image_name))
						{
							
						}
						else
						{
							$image_error	=	"failed" ;
							$flag				=	1;
						}	
					}
					else
					{
						$image_error	= "Invalid file format";
						$flag				=	1;	
					}	
				}	
		}
		if($flag==0)
		{
			if($actual_image_name=="")
			{
				$actual_image_name	=	"";
			}
			$db->update_user($u_fname,$u_lname,$u_about,$u_address,$u_bday,$u_occupation,$u_mobile,$actual_image_name,$u_email);	
			$common_msg1	=	"Your Profile Information has been updated successfully...!!!";
			
			 
		}
		
	} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Profile Page</title>


    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#" />
    <meta name="keywords" content="#" />
    <meta name="author" content="#" />

    <link rel="icon" href="http://html.codedthemes.com/gradient-able/files/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="files/bower_components/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css">

    <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap-daterangepicker/css/daterangepicker.css" />

    <link rel="stylesheet" type="text/css" href="files/bower_components/datedropper/css/datedropper.min.css" />

    <link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">

    <link rel="stylesheet" type="text/css" href="files/assets/icon/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
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
                                            <h5 class="m-b-10">User Profile</h5>
                                            <p class="text-muted m-b-10"><?php echo $result_about; ?> </p>
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">User Profile</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">User Profile</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="page-body">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="cover-profile">
                                                    <div class="profile-bg-img">
                                                        <img class="profile-bg-img img-fluid"   src="files/assets/images/user-profile/bg-img1.jpg" alt="bg-img">
                                                        <div class="card-block user-info">
                                                            <div class="col-md-12">
                                                                <div class="media-left">
                                                                    <a href="#" class="profile-image">
<img class="user-img img-radius" src="/images/profile/<?php echo $result_image; ?>" height="150px" width="150px" alt="<?php echo $result_fname; ?>">
</a>
                                                                </div>
                                                                <div class="media-body row">
                                                                    <div class="col-lg-12">
                                                                        <div class="user-title">
                                                                            <h2><?php echo $result_fname; ?> <?php echo $result_lname; ?></h2>
                                                                            <span class="text-white"><?php echo $result_occupation; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
											
											<div class="form-group row">
												<div class="col-md-12"> 
													<div class="common_msg" style="color:green;font-size:13px;margin-left: 310px;">
														<?php
															echo $common_msg1;
														?>
													</div>
												</div>
											</div> 
											<div class="form-group row">
												<div class="col-md-12"> 
													<div class="common_msg" style="color:green;font-size:13px;margin-left: 75px;">
														<?php
															echo $common_msg;
														?>
													</div>
												</div>
											</div> 
                                            <div class="col-lg-12"> 
                                                <div class="tab-header card">
                                                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal Info</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#binfo" role="tab">Change Password</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">Edit Profile</a>
                                                            <div class="slide"></div>
                                                        </li> 
                                                    </ul>
                                                </div>


                                                <div class="tab-content">

                                                    <div class="tab-pane active" id="personal" role="tabpanel">

                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">About Me</h5> 
                                                            </div>
                                                            <div class="card-block">
                                                                <div class="view-info">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="general-info">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 col-xl-6">
                                                                                        <div class="table-responsive">
                                                                                            <table class="table m-0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <th scope="row">First Name</th>
                                                                                                        <td><?php echo $result_fname; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
																										<th scope="row">Email</th>
                                                                                                        <td><?php echo $result_email; ?></td>
																									</tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Birth Date</th>
                                                                                                        <td><?php echo $result_bday; ?></td>
                                                                                                    </tr> 
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-12 col-xl-6">
                                                                                        <div class="table-responsive">
                                                                                            <table class="table">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <th scope="row">Last Name</th>
                                                                                                        <td><?php echo $result_lname; ?> </td>
                                                                                                     </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Mobile Number</th>
                                                                                                        <td><?php echo $result_mobile; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Location</th>
                                                                                                        <td><?php echo $result_address; ?></td>
                                                                                                    </tr> 
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
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h5 class="card-header-text">Description About Me</h5>
                                                                      </div>
                                                                    <div class="card-block user-desc">
                                                                        <div class="view-desc"> 
																			<p><?php echo $result_about;?></p>
																			<p><?php echo $result_occupation; ?></p>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div> 
                                                    <div class="tab-pane" id="binfo" role="tabpanel">
														
														<div class="card">
															<div class="card-header">
																<h5>Update Password</h5>
																<span>You can<code>Update</code> Your <code>&lt;Password&gt;</code></span>
															</div>
															<div class="card-block">																 
																<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">Old Password</label>
																		<div class="col-sm-10">
																			<input type="password" class="form-control"  name="current_password"  placeholder="Enter current password">
																			<span class="messages"></span>
																			<span class="error_indicator" style="color:red;font-size:13px;"><?php echo $cur_pwd_error; ?></span>
																		</div>
																	</div>
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">Password</label>
																		<div class="col-sm-10">
																			<input type="password" class="form-control" name="new_password" placeholder="Enter new password">
																			<span class="messages"></span>
																				<span class="error_indicator" style="color:red;font-size:13px;"><?php echo $new_pwd_error; ?></span>
																		</div>
																	</div>
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">Repeat Password</label>
																		<div class="col-sm-10">
																			<input type="password" class="form-control"   name="confirm_password" placeholder="Repeat Password">
																			<span class="messages"></span>
																			<span class="error_indicator" style="color:red;font-size:13px;"><?php echo $conf_pwd_error; ?></span>
																		</div>
																	</div>  
																	<div class="form-group row">
																		<label class="col-sm-2"></label>
																		<div class="col-sm-10"> 
																			<input type="submit" name="submit_btn" class="btn btn-primary m-b-0" value="CHANGE MY PASSWORD" />
																		</div> 
																	</div>
																</form>
															</div>
														</div>
														
                                                    </div>
                                                    <div class="tab-pane" id="contacts" role="tabpanel">
                                                        	<div class="card">
															<div class="card-header">
																<h5>Update Profile Here</h5>
																<span>You can<code>Update</code> Your <code>&lt;Profile&gt;</code>Below</span>
															</div>
															<div class="card-block">
																
																<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">First Name</label>
																		<div class="col-sm-10">
																			<input type="text" class="form-control" name="u-fname"  placeholder="Enter First Name" value="<?php echo $result_fname;?>">
																			<span class="messages"></span>
																			<span class="error_indicator" style="color:red;font-size:13px;"><?php echo $cur_pwd_error; ?></span>
																		</div>
																	</div>
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">Last Name</label>
																		<div class="col-sm-10">
																			<input type="text" class="form-control" name="u-lname"  placeholder="Enter Last Name" value="<?php echo $result_lname;?>">
																			<span class="messages"></span>
																			<span class="error_indicator" style="color:red;font-size:13px;"><?php echo $cur_pwd_error; ?></span>
																		</div>
																	</div>
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">About Description</label>
																		<div class="col-sm-10">
																			<textarea class="form-control" name="u-about"  placeholder="About Description" ><?php echo $result_about;?></textarea><span class="messages"></span>
																			<span class="error_indicator" style="color:red;font-size:13px;"><?php echo $cur_pwd_error; ?></span>
																		</div>
																	</div>																	
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">Location</label>
																		<div class="col-sm-10">
																			<input type="text" class="form-control" name="u-address" placeholder="Enter Location" value="<?php echo $result_address;?>">
																			<span class="messages"></span>
																				<span class="error_indicator" style="color:red;font-size:13px;"><?php echo $new_pwd_error; ?></span>
																		</div>
																	</div>
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">Date of Birth</label>
																		<div class="col-sm-10">
																			<input type="text" class="form-control"  name="u-b-day"  placeholder="Enter your DOB" value="<?php echo $result_bday;?>">
																			<span class="messages"></span>
																			<span class="error_indicator" style="color:red;font-size:13px;"><?php echo $cur_pwd_error; ?></span>
																		</div>
																	</div>
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">Occupation</label>
																		<div class="col-sm-10">
																			<input type="text" class="form-control"   name="u-occupation" placeholder="Enter Occupation" value="<?php echo $result_occupation;?>">
																			<span class="messages"></span>
																			<span class="error_indicator" style="color:red;font-size:13px;"><?php echo $conf_pwd_error; ?></span>
																		</div>
																	</div>  
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">Email</label>
																		<div class="col-sm-10">
																			<input type="email" class="form-control"  name="u-email" required placeholder="Enter Email" value="<?php echo $result_email;?>">
																			<span class="messages"></span>
																			<span class="error_indicator" style="color:red;font-size:13px;"><?php echo $conf_pwd_error; ?></span>
																		</div>
																	</div> 
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">Mobile</label>
																		<div class="col-sm-10">
																			<input type="text" class="form-control"  name="u-mobile" placeholder="Enter Mobile" value="<?php echo $result_mobile;?>">
																			<span class="messages"></span>
																			<span class="error_indicator" style="color:red;font-size:13px;"><?php echo $conf_pwd_error; ?></span>
																		</div>
																	</div> 
																	<div class="form-group row">
																		<label class="col-sm-2 col-form-label">Update Profile Image</label>
																		<div class="col-sm-10">
																			<input  type="file" name="photoimg"  required />
																			<span class="messages"></span>
																			<span class="error_msgs"><?php echo $image_error; ?></span>
																		</div>
																	</div>
																	<div class="form-group row">
																		<label class="col-sm-2"></label>
																		<div class="col-sm-10"> 
																			<input type="submit" name="sub_btn" class="btn btn-primary m-b-0" value="Update My Profile" />
																		</div> 
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


    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
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


   <!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/af2821b0/cloudflare-static/email-decode.min.js"></script>  -->
    <script src="files/bower_components/jquery/js/jquery.min.js"></script>
    <script src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script src="files/bower_components/popper.js/js/popper.min.js"></script>
    <script src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>

    <script src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

    <script src="files/bower_components/modernizr/js/modernizr.js"></script>
    <script src="files/bower_components/modernizr/js/css-scrollbars.js"></script>

    <script src="files/assets/pages/advance-elements/moment-with-locales.min.js"></script>
    <script src="files/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>

    <script src="files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>

    <script src="files/bower_components/datedropper/js/datedropper.min.js"></script>

    <script src="files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

   <script src="files/assets/pages/ckeditor/ckeditor.js"></script>

    <script src="files/assets/pages/chart/echarts/js/echarts-all.js"></script>
	 
    <script src="files/assets/pages/user-profile.js"></script>
	 
    <script src="files/assets/js/pcoded.min.js"></script>
    <script src="files/assets/js/navbar-image/vertical-layout.min.js"></script>
    <script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="files/assets/js/script.js"></script>
</body>

</html>