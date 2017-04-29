<?php
/*
	GroupMessageManager Class
	Description: Management class for manipulating GroupMessage in ChitChat convo groups. 
	(C) 2017. ChitChat. All Rights Reserved. 
	A Louis Ronald Production. 
*/

require_once("mysqladapter.php"); 
require_once("DbReferences.php"); 

class GroupMessageManager {
	
	private $dbRefObj;
	private $db; 
	private $groupMessageTbl; 
	
	function __construct($dbReferenceObj) 
	{
		$this->dbRefObj = $dbReferenceObj; 
		$this->db = new MySqliDbAdapter(
			$this->dbRefObj->DB_HOST, $this->dbRefObj->DB_NAME, 
			$this->dbRefObj->DB_USR, $this->dbRefObj->DB_PWD);
		$this->groupMessageTbl = "group_messages"; 
	}
	
	
	
	function createGroupMessage($grpObj, $senderObj, $msg)
	{
		/* send a message to a convo group */ 
		$grpId = $grpObj->getGroupId(); 
		$senderId = $senderObj->getUserId(); 
		$message = $msg; 
		$insertSqlStr = "insert into ".$this->groupMessageTbl.
			"(group_id,sender_id,message) values (".
			$grpId.",".$senderId.",".$message.")"; 
		$result = $this->db->insert($insertSqlStr); 
		return $result; 
	}
	
	
	
	function deleteGroupMessage($grpMsgObj)
	{
		/* delete a message from a group convo */ 
		$grpMsgId = $grpMsgObj->getGroupMessageId(); 
		$deleteSql = "delete from ".$this->groupMessageTbl.
			" where group_message_id=".$grpMsgId; 
		$result = $this->db->remove($deleteSql); 
		return $result; 
	}
	
	
	
	function searchGroupMessageById($grpMsgId)
	{
		/* search a specific group message by its id */
		$searchSql = "select * from ".$this->groupMesssageTbl.
			" where group_message_id=".$grpMsgId; 
		$result = $this->db->query($searchSql); 
		return $result[0]; 
	}
	
	
	
	function searchGroupMessagesBySender($senderObj)
	{
		/* search group messages sent by a specific sender */ 
		$senderId = $senderObj->getUserId(); 
		$searchSql = "select * from ".$this->groupMessageTbl.
			" where sender_id=".$senderId; 
		$result = $this->db->query($searchSql); 
		return $result; 
	}
	
	
	
	function searchGroupMessagesByTimestamp($timeStamp)
	{
		/* search group messages by a specific timestamp */ 
		$searchSql = "select * from ".$this->groupMessageTbl.
			" where timestamp=".$timeStamp; 
		$result = $this->db->query($searchSql); 
		return $result; 
	}
	
	
}

?>