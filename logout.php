<?php
	require_once('lib/class/functions.php');
	$db = new functions();
	
	if(isset($_GET['admin']))
	{
		unset($_SESSION['current_admin']);
		header("Location:index.php");
	}
?>
