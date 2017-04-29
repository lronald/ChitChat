<?php
/*
	GroupManager Class
	Description: Management class for manipulating convo groups in ChitChat.
	(C) 2017. ChitChat. All Rights Reserved. 
	A Louis Ronald Production. 
*/

class GroupManager {

	private $dbRefObj;
	private $groupsTbl;
	private $db; 
	
	function __construct($dbRefObj) 
	{
		/* class object constructor */ 
		$this->dbRefObj = $dbRefObj;
		$this->db = new MySqliDbAdapter(
			$this->dbRefObj->DB_HOST, $this->dbRefObj->DB_NAME, 
			$this->dbRefObj->DB_USR, $this->dbRefObj->DB_PWD);
		$this->groupsTbl = "groups";
	}
	
	
	
	function createGroup($grpName, $admin) 
	{
		/* create a new convo group */
		$adminUserId = $admin->getUserId(); 
		$insertSql = "insert into groups(name,admin_id) ".
			"values(".$grpName.",".adminUserId.")"; 
		$result = $this->db->insert($insertSql); 
		return $result;
	}
	
	
	
	function deleteGroup($grpObj)
	{
		/* delete an existing convo group */
		$grpId = $grpObj->getGroupId(); 
		$deleteSql = "delete from ".$this->groupsTbl.
			" where group_id=".$grpId; 
		$result = $this->db->remove($deleteSql); 
		return $result; 
	}
	
	
	
	function updateGroupName($grpObj, $name)
	{
		/* change name of a convo group */
		$grpId = $grpObj->getGroupId(); 
		$updateSql = "update ".$this->groupsTbl." set name=".$name.
			" where group_id=".$grpId;
		$result = $this->db->update($updateSql); 
		return $result; 
			
	}
	
	
	
	function searchGroupById($gid) 
	{
		/* search a specific group by its id */ 
		$searchSql = "select * from ".$this->groupsTbl.
			" where group_id=".$gid; 
		$result = $this->db->query($searchSql); 
		return $result; 
	}
	
	
	
	function searchGroupByName($name)
	{
		/* search a group(s) by its name */
		$searchSql = "select * from ".$this->groupsTbl.
			" where name=".$name; 
		$result = $this->db->query($searchSql); 
		return $result; 
	}
	
	
	
	function searchGroupByAdmin($usrObj)
	{
		/* search group(s) administered by a specific user */
		$adminUserId = $usrObj->getUserId(); 
		$searchSql = "select * from ".$this->groupsTbl.
			" where admin_id=".$adminUserId; 
		$result = $this->db->query($searchSql); 
		return $result; 
	}


}

?>