<?php
/*
	GroupMemberManager Class
	Description: Management class for manipulating group members in a convo group.
	(C) 2017. ChitChat. All Rights Reserved. 
	A Louis Ronald Production. 
*/

require_once('DbReferences.php');
require_once('mysqladapter.php');

class GroupMemberManager {
	
	private $dbRefObj;
	private $groupMemberTbl;
	private $db;  
	
	function __construct($dbRefObj) 
	{
		/* class obj constructor */
		$this->dbRefObj = $dbRefObj;
		$this->groupMemberTbl = $dbRefObj->TBL_GROUPMEMBERS;
		$this->db = new MySqliDbAdapter(
			$this->dbRefObj->DB_HOST, $this->dbRefObj->DB_NAME, 
			$this->dbRefObj->DB_USR, $this->dbRefObj->DB_PWD);
	}
	
	
	
	function addMember($grpObj, $newMemberObj) 
	{
		/* adds a new member to the group */
		$grpId = $grpObj->getGroupId(); 
		$usrId = $newMemberObj->getUserId();
		$insertSqlStr = "insert into ".$this->groupMemberTbl.
			"(group_id, user_id) values(".grpId.",".usrId.")"; 
		$insertid = $db->insert(insertSqlStr); 
		if($insertid)
		{
			return $insertid;
		}
		else
		{
			return false; 
		}
	}
	
	
	
	function deleteMember($memberObj, $grpObj)
	{
		/* deletes an existing member of the group */
		$memberId = $memberObj->getUserId(); 
		$groupId = $grpObj->getGroupId(); 
		$deleteSqlStr = "delete from ".$groupMemberTbl.
			" where user_id=".$memberId;
		$status = $this->db->remove($deleteSqlStr);
		if($status) 
		{
			return true; 
		}
		else
		{
			return false; 
		}
	}
	
	
	
	function searchMembersByGroup($grpObj)
	{
		/* searches all members who are in a specific group */
		$grpId = $grpObj->getGroupId(); 
		$searchSqlStr = "select * from ".$groupMemberTbl.
			" where group_id=".$grpId;
		$result = $this->db->query(searchSqlStr); 
		return $result;  
	}
}

?>