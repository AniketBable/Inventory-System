<?php
	session_start();
	
		class functions
		{
			private $con;
			function __construct()
			{
				$this->con = new mysqli("localhost","root","","inventory_system");
			
			}	
			function new_user($u_fname,$u_lname,$u_about,$u_address,$u_bday,$u_occupation,$u_mobile,$actual_image_name,$u_email)
			{							
					 
					if($stmt_insert = $this->con->prepare("INSERT INTO `admin`(`first_name`, `last_name`, `about_me`, `address`, `birthday`, `occupation`, `mobile`, `image`, `user_id`) VALUES (?,?,?,?,?,?,?,?,?)"))
					{
						
						$stmt_insert->bind_param("sssssssss",$u_fname,$u_lname,$u_about,$u_address,$u_bday,$u_occupation,$u_mobile,$actual_image_name,$u_email);
	 
							if($stmt_insert->execute())
							{
							
								return true;
							}
								return false;
					} 	
			}	 
			
			function get_password_from_admin($name)
			{
				 
				if($stmt_select = $this->con->prepare("Select `password` from `admin` where `user_id` = ?"))
				{ 
					$stmt_select->bind_param("s",$name);
					
					$stmt_select->bind_result($result_password);
					
					if($stmt_select->execute())
					{
						if($stmt_select->fetch())
						{
							return $result_password;
						}
					}
					return false;
				}
			}	
			 
			
		function get_user_data_from_email($login_email)
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `first_name`, `last_name`, `about_me`, `address`, `birthday`, `occupation`, `mobile`, `image`, `user_id`, `password` FROM `admin` WHERE `user_id` = ?"))
			{
				$stmt_select->bind_param("s",$login_email);
				
				$stmt_select->bind_result($result_id,$result_fname,$result_lname,$result_about,$result_address,$result_bday,$result_occupation,$result_mobile,$result_image,$result_email,$result_password);
				
				if($stmt_select->execute())
				{
					$data_container	=	array();
					
					if($stmt_select->fetch())
					{
						$data_container[0]	=	$result_id;
						$data_container[1]	=	$result_fname;
						$data_container[2]	=	$result_lname;
						$data_container[3]	=	$result_about;
						$data_container[4]	=	$result_address;
						$data_container[5]	=	$result_bday;
						$data_container[6]	=	$result_occupation;
						$data_container[7]	=	$result_mobile;
						$data_container[8]	=	$result_image;
						$data_container[9]	=	$result_email;		 
						$data_container[10]	=	$result_password;		 
						
						return $data_container;
					}
				}
				return false;
			}
		}
		function get_user_password($email_id)
		{
			if($stmt_select = $this->con->prepare("Select `password` from `admin` where `user_id` = ?"))
			{
				$stmt_select->bind_param("s",$email_id);
				
				$stmt_select->bind_result($result_password);
				
				if($stmt_select->execute())
				{
					if($stmt_select->fetch())
					{
						return $result_password;
					}
				}
				return false;
			}		
		}
		function update_user($u_fname,$u_lname,$u_about,$u_address,$u_bday,$u_occupation,$u_mobile,$actual_image_name,$u_email)
		{
			
			if($stmt_update = $this->con->prepare("UPDATE `admin` SET `first_name`=?,`last_name`=?,`about_me`=?,`address`=? ,`birthday`=? ,`occupation`=? ,`mobile`=? ,`image`=?  WHERE `user_id` = ?"))
			{
				$stmt_update->bind_param("sssssssss",$u_fname,$u_lname,$u_about,$u_address,$u_bday,$u_occupation,$u_mobile,$actual_image_name,$u_email);
				
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function update_user_password($login_email,$new_pwd)
		{
			if($stmt_update = $this->con->prepare("UPDATE `admin` SET `password`=? WHERE `user_id` = ?"))
		
			$stmt_update->bind_param("ss",$new_pwd,$login_email);
			
			if($stmt_update->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		function set_equipments_details($g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total)
		{
			$date = date("Y-m-d");
			$time = date("H:i:sa");
	 
			if($stmt_insert = $this->con->prepare("INSERT INTO `equipments_details`(`G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("sssssssssssssss",$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
		function fetch_equipments_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`, `Bill image name` , `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `equipments_details` "))
			{
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;
						$data[$counter][1] = $g_no; 
						$data[$counter][2] = $challan; 
						$data[$counter][3] = $challan_image_name; 						
						$data[$counter][4] = $bill;
						$data[$counter][5] = $bill_image_name;						
						$data[$counter][6] = $supplier;						
						$data[$counter][7] = $description;
						$data[$counter][8] = $unit; 
						$data[$counter][9] = $received; 
						$data[$counter][10] = $rejected;
						$data[$counter][11] = $accepted;
						$data[$counter][12] = $amount;
						$data[$counter][13] = $total;
						$data[$counter][14] = $date;
						$data[$counter][15] = $time;
						
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function set_computerperipherals_details($g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total)
		{
			$date = date("Y-m-d");
			$time = date("H:i:sa");
	 
			if($stmt_insert = $this->con->prepare("INSERT INTO `computerperipherals_details`(`G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("sssssssssssssss",$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
		function fetch_computerperipherals_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`,`G.R.R No`, `Challan No`,`Challan image name`, `Bill No`, `Bill image name` , `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `computerperipherals_details`  "))
			{
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;
						$data[$counter][1] = $g_no; 
						$data[$counter][2] = $challan; 
						$data[$counter][3] = $challan_image_name; 						
						$data[$counter][4] = $bill;
						$data[$counter][5] = $bill_image_name;						
						$data[$counter][6] = $supplier;						
						$data[$counter][7] = $description;
						$data[$counter][8] = $unit; 
						$data[$counter][9] = $received; 
						$data[$counter][10] = $rejected;
						$data[$counter][11] = $accepted;
						$data[$counter][12] = $amount;
						$data[$counter][13] = $total;
						$data[$counter][14] = $date;
						$data[$counter][15] = $time;
						
						
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function set_software_details($g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total)
		{
			$date = date("Y-m-d");
			$time = date("H:i:sa");
	 
			if($stmt_insert = $this->con->prepare("INSERT INTO `software_details`(`G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("sssssssssssssss",$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
	    function fetch_software_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`,`G.R.R No`, `Challan No`,`Challan image name`, `Bill No`, `Bill image name` , `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `software_details` "))
			{
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						
						$data[$counter][0] = $id;
						$data[$counter][1] = $g_no; 
						$data[$counter][2] = $challan; 
						$data[$counter][3] = $challan_image_name; 						
						$data[$counter][4] = $bill;
						$data[$counter][5] = $bill_image_name;						
						$data[$counter][6] = $supplier;						
						$data[$counter][7] = $description;
						$data[$counter][8] = $unit; 
						$data[$counter][9] = $received; 
						$data[$counter][10] = $rejected;
						$data[$counter][11] = $accepted;
						$data[$counter][12] = $amount;
						$data[$counter][13] = $total;
						$data[$counter][14] = $date;
						$data[$counter][15] = $time;
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
						
				}
			}
		}
		function set_furniture_details($g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total)
		{
			$date = date("Y-m-d");
			$time = date("H:i:sa");
	 
			if($stmt_insert = $this->con->prepare("INSERT INTO `furniture_details`(`G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("sssssssssssssss",$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
	    function fetch_furniture_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`,`G.R.R No`, `Challan No`,`Challan image name`, `Bill No`, `Bill image name` , `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `furniture_details` "))
			{
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] 	= $id;
						$data[$counter][1]	= $g_no; 
						$data[$counter][2] 	= $challan; 
						$data[$counter][3] 	= $challan_image_name; 						
						$data[$counter][4]	= $bill;
						$data[$counter][5] 	= $bill_image_name;						
						$data[$counter][6] 	= $supplier;						
						$data[$counter][7] 	= $description;
						$data[$counter][8] 	= $unit; 
						$data[$counter][9] 	= $received; 
						$data[$counter][10] = $rejected;
						$data[$counter][11] = $accepted;
						$data[$counter][12] = $amount;
						$data[$counter][13] = $total;
						$data[$counter][14] = $date;
						$data[$counter][15] = $time;
						
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
						
				}
			}
		}
		function set_consumables_details($g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total)
		{
			$date = date("Y-m-d");
			$time = date("H:i:sa");
	 
			if($stmt_insert = $this->con->prepare("INSERT INTO `consumables_details`(`G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("sssssssssssssss",$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
	    function fetch_consumables_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`, `Bill image name` , `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `consumables_details` "))
			{
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] 	= $id;
						$data[$counter][1]	= $g_no; 
						$data[$counter][2] 	= $challan; 
						$data[$counter][3] 	= $challan_image_name; 						
						$data[$counter][4]	= $bill;
						$data[$counter][5] 	= $bill_image_name;						
						$data[$counter][6] 	= $supplier;						
						$data[$counter][7] 	= $description;
						$data[$counter][8] 	= $unit; 
						$data[$counter][9] 	= $received; 
						$data[$counter][10] = $rejected;
						$data[$counter][11] = $accepted;
						$data[$counter][12] = $amount;
						$data[$counter][13] = $total;
						$data[$counter][14] = $date;
						$data[$counter][15] = $time;
						
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
						
				}
			}
		}
		 function set_booksjournals_details($g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total)
		{
			$date = date("Y-m-d");
			$time = date("H:i:sa");
	 
			if($stmt_insert = $this->con->prepare("INSERT INTO `books&journals_details`(`G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("sssssssssssssss",$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
	    function fetch_booksjournals_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`, `Bill image name` , `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `books&journals_details` "))
			{
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] 	= $id;
						$data[$counter][1]	= $g_no; 
						$data[$counter][2] 	= $challan; 
						$data[$counter][3] 	= $challan_image_name; 						
						$data[$counter][4]	= $bill;
						$data[$counter][5] 	= $bill_image_name;						
						$data[$counter][6] 	= $supplier;						
						$data[$counter][7] 	= $description;
						$data[$counter][8] 	= $unit; 
						$data[$counter][9] 	= $received; 
						$data[$counter][10] = $rejected;
						$data[$counter][11] = $accepted;
						$data[$counter][12] = $amount;
						$data[$counter][13] = $total;
						$data[$counter][14] = $date;
						$data[$counter][15] = $time;
						
						
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
						
				}
			}
		}
		function set_studentsuniform_details($g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total)
		{
			$date = date("Y-m-d");
			$time = date("H:i:sa");
	 
			if($stmt_insert = $this->con->prepare("INSERT INTO `studentsuniform_details`(`G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("sssssssssssssss",$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
	    function fetch_studentsuniform_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`, `Bill image name` , `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `studentsuniform_details` "))
			{
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] 	= $id;
						$data[$counter][1]	= $g_no; 
						$data[$counter][2] 	= $challan; 
						$data[$counter][3] 	= $challan_image_name; 						
						$data[$counter][4]	= $bill;
						$data[$counter][5] 	= $bill_image_name;						
						$data[$counter][6] 	= $supplier;						
						$data[$counter][7] 	= $description;
						$data[$counter][8] 	= $unit; 
						$data[$counter][9] 	= $received; 
						$data[$counter][10] = $rejected;
						$data[$counter][11] = $accepted;
						$data[$counter][12] = $amount;
						$data[$counter][13] = $total;
						$data[$counter][14] = $date;
						$data[$counter][15] = $time;
						
						
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
						
				}
			}
		}
		function set_workshopmaterial_details($g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total)
		{
			$date = date("Y-m-d");
			$time = date("H:i:sa");
	 
			if($stmt_insert = $this->con->prepare("INSERT INTO `workshopmaterial_details`(`G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("sssssssssssssss",$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
	    function fetch_workshopmaterial_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`, `Bill image name` , `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `workshopmaterial_details` "))
			{
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] 	= $id;
						$data[$counter][1]	= $g_no; 
						$data[$counter][2] 	= $challan; 
						$data[$counter][3] 	= $challan_image_name; 						
						$data[$counter][4]	= $bill;
						$data[$counter][5] 	= $bill_image_name;						
						$data[$counter][6] 	= $supplier;						
						$data[$counter][7] 	= $description;
						$data[$counter][8] 	= $unit; 
						$data[$counter][9] 	= $received; 
						$data[$counter][10] = $rejected;
						$data[$counter][11] = $accepted;
						$data[$counter][12] = $amount;
						$data[$counter][13] = $total;
						$data[$counter][14] = $date;
						$data[$counter][15] = $time;
						
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
						
				}
			}
		} 
		function set_stationary_details($g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total)
		{
			$date = date("Y-m-d");
			$time = date("H:i:sa");
	 
			if($stmt_insert = $this->con->prepare("INSERT INTO `stationary_details`(`G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("sssssssssssssss",$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
		function fetch_stationary_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`, `Bill image name` , `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `stationary_details` "))
			{
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;
						$data[$counter][1] = $g_no; 
						$data[$counter][2] = $challan; 
						$data[$counter][3] = $challan_image_name; 						
						$data[$counter][4] = $bill;
						$data[$counter][5] = $bill_image_name;						
						$data[$counter][6] = $supplier;						
						$data[$counter][7] = $description;
						$data[$counter][8] = $unit; 
						$data[$counter][9] = $received; 
						$data[$counter][10] = $rejected;
						$data[$counter][11] = $accepted;
						$data[$counter][12] = $amount;
						$data[$counter][13] = $total;
						$data[$counter][14] = $date;
						$data[$counter][15] = $time;
						
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function set_printingstationary_details($g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total)
		{
			$date = date("Y-m-d");
			$time = date("H:i:sa");
	 
			if($stmt_insert = $this->con->prepare("INSERT INTO `printingstationary_details`(`G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("sssssssssssssss",$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
		function fetch_printingstationary_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`, `Bill image name` , `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `printingstationary_details` "))
			{
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;
						$data[$counter][1] = $g_no; 
						$data[$counter][2] = $challan; 
						$data[$counter][3] = $challan_image_name; 						
						$data[$counter][4] = $bill;
						$data[$counter][5] = $bill_image_name;						
						$data[$counter][6] = $supplier;						
						$data[$counter][7] = $description;
						$data[$counter][8] = $unit; 
						$data[$counter][9] = $received; 
						$data[$counter][10] = $rejected;
						$data[$counter][11] = $accepted;
						$data[$counter][12] = $amount;
						$data[$counter][13] = $total;
						$data[$counter][14] = $date;
						$data[$counter][15] = $time;
						
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function fetch_equipments_full_details_by_id($equipments_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`, `Challan image name`, `Bill No`, `Bill image name`, `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time` FROM `equipments_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$equipments_id);
				
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						
						$data[0] = $id;
						$data[1] = $g_no; 
						$data[2] = $challan; 
						$data[3] = $challan_image_name; 
						$data[4] = $bill;
						$data[5] = $bill_image_name;
						$data[6] = $supplier;						
						$data[7] = $description;
						$data[8] = $unit; 
						$data[9] = $received; 
						$data[10] = $rejected;
						$data[11] = $accepted;
						$data[12] = $amount;
						$data[13] = $total;
						$data[14] = $date;
						$data[15] = $time;
					 	   
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_equipments_full_details_by_id($g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$equipments_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `equipments_details` SET `G.R.R No`=  ?,`Challan No`=  ?,`Challan image name`=  ?,`Bill No`=  ?,`Bill image name`= ?,`Supplier`=  ?,`Description`= ?,`Unit`= ?,`Received`= ?,`Rejected`= ?,`Accepted`= ?,`Amount`= ?,`Total`= ?  WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("ssssssssssssss",$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$equipments_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function delete_equipments_full_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `equipments_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		} 
		function fetch_computerperipherals_full_details_by_id($computerperipherals_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`, `Challan image name`, `Bill No`, `Bill image name`, `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time` FROM `computerperipherals_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$computerperipherals_id);
				
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						
						$data[0] = $id;
						$data[1] = $g_no; 
						$data[2] = $challan; 
						$data[3] = $challan_image_name; 
						$data[4] = $bill;
						$data[5] = $bill_image_name;
						$data[6] = $supplier;						
						$data[7] = $description;
						$data[8] = $unit; 
						$data[9] = $received; 
						$data[10] = $rejected;
						$data[11] = $accepted;
						$data[12] = $amount;
						$data[13] = $total;
						$data[14] = $date;
						$data[15] = $time;
					 	   
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_computerperipherals_full_details_by_id($g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$computerperipherals_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `computerperipherals_details` SET `G.R.R No`=  ?,`Challan No`=  ?,`Challan image name`=  ?,`Bill No`=  ?,`Bill image name`= ?,`Supplier`=  ?,`Description`= ?,`Unit`= ?,`Received`= ?,`Rejected`= ?,`Accepted`= ?,`Amount`= ?,`Total`= ?  WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("ssssssssssssss",$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$computerperipherals_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function delete_computerperipherals_full_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `computerperipherals_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		} 
		function fetch_software_full_details_by_id($software_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `software_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$software_id);
				
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						$data[0] = $id;
						$data[1] = $g_no; 
						$data[2] = $challan; 
						$data[3] = $challan_image_name; 
						$data[4] = $bill;
						$data[5] = $bill_image_name;
						$data[6] = $supplier;						
						$data[7] = $description;
						$data[8] = $unit; 
						$data[9] = $received; 
						$data[10] = $rejected;
						$data[11] = $accepted;
						$data[12] = $amount;
						$data[13] = $total;
						$data[14] = $date;
						$data[15] = $time;
					 	   
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_software_full_details_by_id($g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$software_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `software_details` SET `G.R.R No`=  ?,`Challan No`=  ?,`Bill No`=  ?,`Supplier`=  ?,`Description`= ?,`Unit`= ?,`Received`= ?,`Rejected`= ?,`Accepted`= ?,`Amount`= ?,`Total`= ?  WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("ssssssssssss",$g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$software_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function delete_software_full_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `software_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		}
		function delete_furniture_full_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `furniture_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		}
		function fetch_furniture_full_details_by_id($furniture_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `furniture_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$furniture_id);
				
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						
						$data[0] = $id;
						$data[1] = $g_no; 
						$data[2] = $challan; 
						$data[3] = $challan_image_name; 
						$data[4] = $bill;
						$data[5] = $bill_image_name;
						$data[6] = $supplier;						
						$data[7] = $description;
						$data[8] = $unit; 
						$data[9] = $received; 
						$data[10] = $rejected;
						$data[11] = $accepted;
						$data[12] = $amount;
						$data[13] = $total;
						$data[14] = $date;
						$data[15] = $time;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_furniture_full_details_by_id($g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$furniture_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `furniture_details` SET `G.R.R No`=  ?,`Challan No`=  ?,`Bill No`=  ?,`Supplier`=  ?,`Description`= ?,`Unit`= ?,`Received`= ?,`Rejected`= ?,`Accepted`= ?,`Amount`= ?,`Total`= ?  WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("ssssssssssss",$g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$furniture_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function delete_consumable_full_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `consumables_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		}
		function fetch_consumable_full_details_by_id($consumable_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `consumables_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$consumable_id);
				
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						
						$data[0] = $id;
						$data[1] = $g_no; 
						$data[2] = $challan; 
						$data[3] = $challan_image_name; 
						$data[4] = $bill;
						$data[5] = $bill_image_name;
						$data[6] = $supplier;						
						$data[7] = $description;
						$data[8] = $unit; 
						$data[9] = $received; 
						$data[10] = $rejected;
						$data[11] = $accepted;
						$data[12] = $amount;
						$data[13] = $total;
						$data[14] = $date;
						$data[15] = $time;
					 	   
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_consumable_full_details_by_id($g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$consumable_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `consumables_details` SET `G.R.R No`=  ?,`Challan No`=  ?,`Bill No`=  ?,`Supplier`=  ?,`Description`= ?,`Unit`= ?,`Received`= ?,`Rejected`= ?,`Accepted`= ?,`Amount`= ?,`Total`= ?  WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("ssssssssssss",$g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$consumable_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function delete_booksjournals_full_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `books&journals_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		}
		function fetch_booksjournals_full_details_by_id($booksjournals_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `books&journals_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$booksjournals_id);
				
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						$data[0] = $id;
						$data[1] = $g_no; 
						$data[2] = $challan; 
						$data[3] = $challan_image_name; 
						$data[4] = $bill;
						$data[5] = $bill_image_name;
						$data[6] = $supplier;						
						$data[7] = $description;
						$data[8] = $unit; 
						$data[9] = $received; 
						$data[10] = $rejected;
						$data[11] = $accepted;
						$data[12] = $amount;
						$data[13] = $total;
						$data[14] = $date;
						$data[15] = $time;
					 	   
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_booksjournals_full_details_by_id($g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$booksjournals_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `books&journals_details` SET `G.R.R No`=  ?,`Challan No`=  ?,`Bill No`=  ?,`Supplier`=  ?,`Description`= ?,`Unit`= ?,`Received`= ?,`Rejected`= ?,`Accepted`= ?,`Amount`= ?,`Total`= ?  WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("ssssssssssss",$g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$booksjournals_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function delete_studentuniform_full_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `studentsuniform_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		}
		function fetch_studentuniform_full_details_by_id($studentuniform_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount` , `Total`, `Date`, `Time` FROM `studentsuniform_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$studentuniform_id);
				
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						
						$data[0] = $id;
						$data[1] = $g_no; 
						$data[2] = $challan; 
						$data[3] = $challan_image_name; 
						$data[4] = $bill;
						$data[5] = $bill_image_name;
						$data[6] = $supplier;						
						$data[7] = $description;
						$data[8] = $unit; 
						$data[9] = $received; 
						$data[10] = $rejected;
						$data[11] = $accepted;
						$data[12] = $amount;
						$data[13] = $total;
						$data[14] = $date;
						$data[15] = $time;
					 	   
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_studentuniform_full_details_by_id($g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$studentuniform_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `studentsuniform_details` SET `G.R.R No`=  ?,`Challan No`=  ?,`Bill No`=  ?,`Supplier`=  ?,`Description`= ?,`Unit`= ?,`Received`= ?,`Rejected`= ?,`Accepted`= ?,`Amount`= ?,`Total`= ?  WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("ssssssssssss",$g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$studentuniform_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function delete_workshopmaterial_full_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `workshopmaterial_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		}
		function fetch_workshopmaterial_full_details_by_id($workshopmaterial_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time` FROM `workshopmaterial_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$workshopmaterial_id);
				
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						
						$data[0] = $id;
						$data[1] = $g_no; 
						$data[2] = $challan; 
						$data[3] = $challan_image_name; 
						$data[4] = $bill;
						$data[5] = $bill_image_name;
						$data[6] = $supplier;						
						$data[7] = $description;
						$data[8] = $unit; 
						$data[9] = $received; 
						$data[10] = $rejected;
						$data[11] = $accepted;
						$data[12] = $amount;
						$data[13] = $total;
						$data[14] = $date;
						$data[15] = $time;
					 	   
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_workshopmaterial_full_details_by_id($g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$workshopmaterial_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `workshopmaterial_details` SET `G.R.R No`=  ?,`Challan No`=  ?,`Bill No`=  ?,`Supplier`=  ?,`Description`= ?,`Unit`= ?,`Received`= ?,`Rejected`= ?,`Accepted`= ?,`Amount`= ?,`Total`= ?  WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("ssssssssssss",$g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$workshopmaterial_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function delete_stationary_full_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `stationary_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		}
		function fetch_stationary_full_details_by_id($stationary_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time` FROM `stationary_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$stationary_id);
				
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						
						$data[0] = $id;
						$data[1] = $g_no; 
						$data[2] = $challan; 
						$data[3] = $challan_image_name; 
						$data[4] = $bill;
						$data[5] = $bill_image_name;
						$data[6] = $supplier;						
						$data[7] = $description;
						$data[8] = $unit; 
						$data[9] = $received; 
						$data[10] = $rejected;
						$data[11] = $accepted;
						$data[12] = $amount;
						$data[13] = $total;
						$data[14] = $date;
						$data[15] = $time;
					 	   
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_stationary_full_details_by_id($g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$stationary_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `stationary_details` SET `G.R.R No`=  ?,`Challan No`=  ?,`Bill No`=  ?,`Supplier`=  ?,`Description`= ?,`Unit`= ?,`Received`= ?,`Rejected`= ?,`Accepted`= ?,`Amount`= ?,`Total`= ?  WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("ssssssssssss",$g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$stationary_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function delete_printingstationary_full_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `printingstationary_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		}
		function fetch_printingstationary_full_details_by_id($printingstationary_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `G.R.R No`, `Challan No`,`Challan image name`, `Bill No`,`Bill image name`,`Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time` FROM `printingstationary_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$printingstationary_id);
				
				$stmt_select->bind_result($id,$g_no,$challan,$challan_image_name,$bill,$bill_image_name,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$date,$time);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						
						$data[0] = $id;
						$data[1] = $g_no; 
						$data[2] = $challan; 
						$data[3] = $challan_image_name; 
						$data[4] = $bill;
						$data[5] = $bill_image_name;
						$data[6] = $supplier;						
						$data[7] = $description;
						$data[8] = $unit; 
						$data[9] = $received; 
						$data[10] = $rejected;
						$data[11] = $accepted;
						$data[12] = $amount;
						$data[13] = $total;
						$data[14] = $date;
						$data[15] = $time;
					 	   
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_printingstationary_full_details_by_id($g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$printingstationary_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `printingstationary_details` SET `G.R.R No`=  ?,`Challan No`=  ?,`Bill No`=  ?,`Supplier`=  ?,`Description`= ?,`Unit`= ?,`Received`= ?,`Rejected`= ?,`Accepted`= ?,`Amount`= ?,`Total`= ?  WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("ssssssssssss",$g_no,$challan,$bill,$supplier,$description,$unit,$received,$rejected,$accepted,$amount,$total,$printingstationary_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function add_equipments_full_details($supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity)
		{  	 
			$temp = $received;
			$remaining_quantity = $temp - $given_quantity;
			$received = $remaining_quantity;
			
			if($stmt_insert = $this->con->prepare("INSERT INTO `equipments_full_details`( `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("ssssssssssssss",$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
		function fetch_full_equipments_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining` FROM `equipments_full_details` "))
			{
				$stmt_select->bind_result($id,$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;
						$data[$counter][1] = $supply_order; 
						$data[$counter][2] = $bill; 
						$data[$counter][3] = $D_C; 
						$data[$counter][4] = $supplier; 						
						$data[$counter][5] = $description;
						$data[$counter][6] = $received;						
						$data[$counter][7] = $amount;	 
						$data[$counter][8] = $total;						
						$data[$counter][9] = $department;
						$data[$counter][10] = $staff_name;
						$data[$counter][11] = $lab_no;
						$data[$counter][12] = $date;
						$data[$counter][13] = $given_quantity;
						$data[$counter][14] = $remaining_quantity;	
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		
		function fetch_equipments_stock_details_by_id($equipments_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining` FROM `equipments_full_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$equipments_id);
				
				$stmt_select->bind_result($id,$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						
						$data[0] = $id;
						$data[1] = $supply_order; 
						$data[2] = $bill; 
						$data[3] = $D_C; 
						$data[4] = $supplier;
						$data[5] = $description;
						$data[6] = $received;						
						$data[7] = $amount;
						$data[8] = $total; 
						$data[9] = $department; 
						$data[10] = $staff_name;
						$data[11] = $lab_no;
						$data[12] = $date;
						$data[13] = $given_quantity;
						$data[14] = $remaining_quantity;
						
					 	   
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_equipments_stock_details_by_id($supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity,$equipments_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `equipments_full_details` SET  `Supply Order no/date`= ? ,`Bill no.`= ? ,`D/C No.Date`= ? ,`Supplier`= ? ,`Description Of Material`= ? ,`Quantity Received`= ? ,`Rate`= ? ,`Amount`= ? ,`Department`= ? ,`Staff Name`= ? ,`Lab No.`=  ? ,`Date`= ? ,`Quantity`= ? ,`Remaining`= ? WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("sssssssssssssss",$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity,$equipments_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function delete_equipments_stock_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `equipments_full_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		}
		function add_computerperipherals_full_details($supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity)
		{
			 
			if($stmt_insert = $this->con->prepare("INSERT INTO `computerperipherals_full_details`( `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("ssssssssssssss",$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
		function fetch_full_computerperipherals_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining` FROM `computerperipherals_full_details` "))
			{
				$stmt_select->bind_result($id,$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;
						$data[$counter][1] = $supply_order; 
						$data[$counter][2] = $bill; 
						$data[$counter][3] = $D_C; 
						$data[$counter][4] = $supplier; 						
						$data[$counter][5] = $description;
						$data[$counter][6] = $received;						
						$data[$counter][7] = $amount;	 
						$data[$counter][8] = $total;						
						$data[$counter][9] = $department;
						$data[$counter][10] = $staff_name;
						$data[$counter][11] = $lab_no;
						$data[$counter][12] = $date;
						$data[$counter][13] = $given_quantity;
						$data[$counter][14] = $remaining_quantity;	
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		
		function fetch_computerperipherals_stock_details_by_id($computerperipherals_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining` FROM `computerperipherals_full_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$computerperipherals_id);
				
				$stmt_select->bind_result($id,$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						
						$data[0] = $id;
						$data[1] = $supply_order; 
						$data[2] = $bill; 
						$data[3] = $D_C; 
						$data[4] = $supplier;
						$data[5] = $description;
						$data[6] = $received;						
						$data[7] = $amount;
						$data[8] = $total; 
						$data[9] = $department; 
						$data[10] = $staff_name;
						$data[11] = $lab_no;
						$data[12] = $date;
						$data[13] = $given_quantity;
						$data[14] = $remaining_quantity;
						
					 	   
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_computerperipherals_stock_details_by_id($supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity,$computerperipherals_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `computerperipherals_full_details` SET  `Supply Order no/date`= ? ,`Bill no.`= ? ,`D/C No.Date`= ? ,`Supplier`= ? ,`Description Of Material`= ? ,`Quantity Received`= ? ,`Rate`= ? ,`Amount`= ? ,`Department`= ? ,`Staff Name`= ? ,`Lab No.`=  ? ,`Date`= ? ,`Quantity`= ? ,`Remaining`= ? WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("sssssssssssssss",$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity,$computerperipherals_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function delete_computerperipherals_stock_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `computerperipherals_full_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		}
		function add_software_full_details($supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity)
		{
			 
			if($stmt_insert = $this->con->prepare("INSERT INTO `software_full_details`( `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("ssssssssssssss",$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
		function fetch_full_software_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining` FROM `software_full_details` "))
			{
				$stmt_select->bind_result($id,$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;
						$data[$counter][1] = $supply_order; 
						$data[$counter][2] = $bill; 
						$data[$counter][3] = $D_C; 
						$data[$counter][4] = $supplier; 						
						$data[$counter][5] = $description;
						$data[$counter][6] = $received;						
						$data[$counter][7] = $amount;	 
						$data[$counter][8] = $total;						
						$data[$counter][9] = $department;
						$data[$counter][10] = $staff_name;
						$data[$counter][11] = $lab_no;
						$data[$counter][12] = $date;
						$data[$counter][13] = $given_quantity;
						$data[$counter][14] = $remaining_quantity;	
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		
		function fetch_software_stock_details_by_id($software_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining` FROM `software_full_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$software_id);
				
				$stmt_select->bind_result($id,$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						
						$data[0] = $id;
						$data[1] = $supply_order; 
						$data[2] = $bill; 
						$data[3] = $D_C; 
						$data[4] = $supplier;
						$data[5] = $description;
						$data[6] = $received;						
						$data[7] = $amount;
						$data[8] = $total; 
						$data[9] = $department; 
						$data[10] = $staff_name;
						$data[11] = $lab_no;
						$data[12] = $date;
						$data[13] = $given_quantity;
						$data[14] = $remaining_quantity;
						
					 	   
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_software_stock_details_by_id($supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity,$software_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `software_full_details` SET  `Supply Order no/date`= ? ,`Bill no.`= ? ,`D/C No.Date`= ? ,`Supplier`= ? ,`Description Of Material`= ? ,`Quantity Received`= ? ,`Rate`= ? ,`Amount`= ? ,`Department`= ? ,`Staff Name`= ? ,`Lab No.`=  ? ,`Date`= ? ,`Quantity`= ? ,`Remaining`= ? WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("sssssssssssssss",$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity,$software_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function delete_software_stock_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `software_full_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		}
		function add_furniture_full_details($supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity)
		{
			 
			if($stmt_insert = $this->con->prepare("INSERT INTO `furniture_full_details`( `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("ssssssssssssss",$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
		function fetch_full_furniture_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining` FROM `furniture_full_details` "))
			{
				$stmt_select->bind_result($id,$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;
						$data[$counter][1] = $supply_order; 
						$data[$counter][2] = $bill; 
						$data[$counter][3] = $D_C; 
						$data[$counter][4] = $supplier; 						
						$data[$counter][5] = $description;
						$data[$counter][6] = $received;						
						$data[$counter][7] = $amount;	 
						$data[$counter][8] = $total;						
						$data[$counter][9] = $department;
						$data[$counter][10] = $staff_name;
						$data[$counter][11] = $lab_no;
						$data[$counter][12] = $date;
						$data[$counter][13] = $given_quantity;
						$data[$counter][14] = $remaining_quantity;	
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		
		function fetch_furniture_stock_details_by_id($furniture_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining` FROM `furniture_full_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$furniture_id);
				
				$stmt_select->bind_result($id,$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						
						$data[0] = $id;
						$data[1] = $supply_order; 
						$data[2] = $bill; 
						$data[3] = $D_C; 
						$data[4] = $supplier;
						$data[5] = $description;
						$data[6] = $received;						
						$data[7] = $amount;
						$data[8] = $total; 
						$data[9] = $department; 
						$data[10] = $staff_name;
						$data[11] = $lab_no;
						$data[12] = $date;
						$data[13] = $given_quantity;
						$data[14] = $remaining_quantity;
						
					 	   
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_furniture_stock_details_by_id($supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity,$furniture_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `furniture_full_details` SET  `Supply Order no/date`= ? ,`Bill no.`= ? ,`D/C No.Date`= ? ,`Supplier`= ? ,`Description Of Material`= ? ,`Quantity Received`= ? ,`Rate`= ? ,`Amount`= ? ,`Department`= ? ,`Staff Name`= ? ,`Lab No.`=  ? ,`Date`= ? ,`Quantity`= ? ,`Remaining`= ? WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("sssssssssssssss",$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity,$furniture_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function delete_furniture_stock_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `furniture_full_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		}
		function add_consumables_full_details($supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity)
		{
			 
			if($stmt_insert = $this->con->prepare("INSERT INTO `consumables_full_details`( `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
			{	
				$stmt_insert->bind_param("ssssssssssssss",$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				 
				if($stmt_insert->execute())
				{
					return true;
				}
				return false;
			}
		}
		function fetch_full_consumables_details()
		{
			if($stmt_select = $this->con->prepare("SELECT `id`, `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining` FROM `consumables_full_details` "))
			{
				$stmt_select->bind_result($id,$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				
				if($stmt_select->execute())
				{	
					$data = array();
					$counter	=	0;
					
					while($stmt_select->fetch())
					{
						$data[$counter][0] = $id;
						$data[$counter][1] = $supply_order; 
						$data[$counter][2] = $bill; 
						$data[$counter][3] = $D_C; 
						$data[$counter][4] = $supplier; 						
						$data[$counter][5] = $description;
						$data[$counter][6] = $received;						
						$data[$counter][7] = $amount;	 
						$data[$counter][8] = $total;						
						$data[$counter][9] = $department;
						$data[$counter][10] = $staff_name;
						$data[$counter][11] = $lab_no;
						$data[$counter][12] = $date;
						$data[$counter][13] = $given_quantity;
						$data[$counter][14] = $remaining_quantity;	
						 	
						$counter++;
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		
		function fetch_consumables_stock_details_by_id($consumable_id)
		{ 
			if($stmt_select = $this->con->prepare("SELECT `id`, `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining` FROM `consumables_full_details` WHERE `id` = ? "))
			{ 
				$stmt_select->bind_param("i",$consumable_id);
				
				$stmt_select->bind_result($id,$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity);
				
				if($stmt_select->execute())
				{	
					$data = array();
					 
					while($stmt_select->fetch())
					{
						
						$data[0] = $id;
						$data[1] = $supply_order; 
						$data[2] = $bill; 
						$data[3] = $D_C; 
						$data[4] = $supplier;
						$data[5] = $description;
						$data[6] = $received;						
						$data[7] = $amount;
						$data[8] = $total; 
						$data[9] = $department; 
						$data[10] = $staff_name;
						$data[11] = $lab_no;
						$data[12] = $date;
						$data[13] = $given_quantity;
						$data[14] = $remaining_quantity;
						
					 	   
					}
					if(!empty($data))
					{
						return $data;
					}
					else
					{
						return false;
					}
				}
			}
		}
		function update_consumables_stock_details_by_id($supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity,$consumable_id)  
		{ 
			 
			if($stmt_update = $this->con->prepare("UPDATE `consumables_full_details` SET  `Supply Order no/date`= ? ,`Bill no.`= ? ,`D/C No.Date`= ? ,`Supplier`= ? ,`Description Of Material`= ? ,`Quantity Received`= ? ,`Rate`= ? ,`Amount`= ? ,`Department`= ? ,`Staff Name`= ? ,`Lab No.`=  ? ,`Date`= ? ,`Quantity`= ? ,`Remaining`= ? WHERE `id`=?"))
			{  	 
				$stmt_update->bind_param("sssssssssssssss",$supply_order,$bill,$D_C,$supplier,$description,$received,$amount,$total,$department,$staff_name,$lab_no,$date,$given_quantity,$remaining_quantity,$consumable_id);
				 
				if($stmt_update->execute())
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		function delete_consumables_stock_details_by_id($delete_id)
		{
			if($stmt_delete = $this->con->prepare("delete FROM `consumables_full_details` where `id` = ?"))
			{
				$stmt_delete->bind_param("i",$delete_id);
				
				if($stmt_delete->execute())
				{
					return false;
				}
			}
		}
		
		
	}	//class end
	
	?>