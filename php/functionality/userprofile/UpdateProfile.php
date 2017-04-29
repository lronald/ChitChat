<?php

if(isset($_POST['usr']) && isset($_POST['pwd'])
{
	/* includes */
	require_once('../../classes/UserManager.php'); 
	
	/* get post arguments passed */ 
	$username = $_POST['usr']; 
	$password = $_POST['pwd'];
	
	/* use UserManager class to update user */ 
	$usrManager = new UserManager(...
}


?>