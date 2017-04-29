<?php
/*
	UserManager Class
	Description: Management class to manipulate users in ChitChat
	(C) 2017. ChitChat. All Rights Reserved. 
	A Louis Ronald Production. 
*/

class UserManager {
	
	private $dbrefObj;
	private $db;
	private $usersTbl;
	
	function __construct($dbreferencesObj)
	{
		/* class object constructor */ 
		$this->dbref = $dbreferencesObj;
		$this->db = new MySqliDbAdapter(
			$this->dbRefObj->DB_HOST, $this->dbRefObj->DB_NAME, 
			$this->dbRefObj->DB_USR, $this->dbRefObj->DB_PWD);
		$this->$usersTbl = "users";
	}
	
	
	
	function deleteUser($usrObj) 
	{
		/* delete a user */
		$userId = $usrObj->getUserId(); 
		$deleteSql = "delete from ".$this->usersTbl.
			" where user_id=".$userId; 
		$result = $this->db->query($deleteSql); 
		return $result; 
	}
	
	
	
	function updateUsername($usrObj, $usernameStr) 
	{
		/* update a user's username */
		$userId = $usrObj->getUserId(); 
		$updateSql = "update ".$this->usersTbl." set ".
			"username=".$usernameStr." where user_id=".$userId; 
		$result = $this->db->query($updateSql); 
		return $result;
	}
	
	
	
	function updatePassword($usrObj, $passwordStr)
	{
		/* update a user's password */
		$userId = $usrObj->getUserId(); 
		$updateSql = "update ".$this->usersTbl." set ".
			"password=".$passwordStr." where user_id=".$userId; 
		$result = $this->db->query($updateSql); 
		return $result;
	}
	
	function searchUserById($uidInt)
	{
		/* search a specific user by its ID */
		$searchSql = "select * from ".$this->usersTbl." where ".
			"user_id=".$uidInt; 
		$result = $this->db->query($searchSql); 
		return $result[0]; 
	}
	
	
	
	function createUser($usrStr, $pwdStr)
	{
		/* create a new user */
		$insertSql = "insert into ".$this->usersTbl."(username,password) ".
			"values(".$usrStr.",".$pwdStr.")"; 
		$result = $this->db->insert($insertSql); 
		return $result; 
	}
	
	
	
	function getAllUsers() 
	{
		/* get all users ever created */
		$selectSql = "select * from ".$this->usersTbl; 
		$result = $this->db->query($selectSql); 
		return $result; 
	}
	
	
}

?>