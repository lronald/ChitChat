<?php
/*
	User Class
	Description: Represents a single user in the ChitChat system.
	(C) 2017. ChitChat. All Rights Reserved. 
	A Louis Ronald Production. 
*/

class User {
	private $userId;
	private $username;
	private $password;
	
	function __construct($userid, $usr, $pwd)
	{
		$this->userId = $userid; 
		$this->username = $usr;
		$this->password = $pwd;
	}
	
	function getUserId() 
	{
		return $this->userId;
	}
	
	function getUsername() 
	{
		return $this->username;
	}
	
	function getPassword()
	{
		return $this->password;
	}
}

?>