<?php
	require_once("lib/class/functions.php");
	$db = new functions();
	
	if(isset($_SESSION['current_admin']))
	{
		$login_name	=	$_SESSION['current_admin'];
	}
	
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
	
	
	
?>


  <nav class="navbar header-navbar pcoded-header">
               <div class="navbar-wrapper">
                  <div class="navbar-logo">
                     <a class="mobile-menu" id="mobile-collapse" href="#!">
                     <i class="ti-menu"></i>
                     </a>
                     <div class="mobile-search">
                        <div class="header-search">
                           <div class="main-search morphsearch-search">
                              <div class="input-group">
                                 <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                 <input type="text" class="form-control" placeholder="Enter Keyword">
                                 <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a href="dashboard.php">
                     <img class="img-fluid" src="/images/college logo.png" alt="Theme-Logo" />  
					<!-- <span>Inventory System</span> -->
                     </a>
                     <a class="mobile-options">
                     <i class="ti-more"></i>
                     </a>
                  </div>
                  <div class="navbar-container container-fluid">
                     <ul class="nav-left">
                        <li>
                           <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                        </li> 
                        <li>
                           <a href="#!" onclick="javascript:toggleFullScreen()">
                           <i class="ti-fullscreen"></i>
                           </a>
                        </li>
                     </ul>
                     <ul class="nav-right"> 
                        <li class="user-profile header-notification">
                           <a href="#!">
                           <img src="/images/profile/<?php echo $result_image; ?>" class="img-radius" alt="User-Profile-Image">
                           <span><?php echo $result_fname; ?> <?php echo $result_lname; ?></span>
                           <i class="ti-angle-down"></i>
                           </a>
                           <ul class="show-notification profile-notification">
                               
                              <li>
                                 <a href="user-profile.php">
                                 <i class="ti-user"></i> Profile
                                 </a>
                              </li>  
                              <li>
                                 <a href="logout.php?admin">
                                 <i class="ti-layout-sidebar-left"></i> Logout
                                 </a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>