<?php
/*
	MessageManager Class
	Description: Management class for manipulating messages.
	(C) 2017. ChitChat. All Rights Reserved. 
	A Louis Ronald Production. 
*/

require_once('DbReferences.php');
require_once('mysqladapter.php');

class MessageManager {
	
	private $dbRefObj;
	private $db;
	
	function __construct($dbRefObj) 
	{
		/* the class obj constructor */
		$this->dbRefObj = $dbRefObj;
		$this->db = new MySqliDbAdapter($this->dbRefObj->DB_HOST, 
										$this->dbRefObj->DB_NAME, 
										$this->dbRefObj->DB_USR, 
										$this->dbRefObj->DB_PWD);
	}
	
	function createMessage($senderObj, $recipientObj, $msg)
	{
		/* sends or creates a message */
		$senderId = $senderObj->getUserId(); 
		$recipientId = $recipientObj->getUserId(); 
		$message = $msg; 
		
		$insertSqlStr = "insert into ".$dbRefObj->TBL_MESSAGES.
			"(sender_id,receiver_id,message) values(".
			$senderId.",".$recipientId.",".$message.")";
			
		$insertid = $db->insert($insertSqlStr);
		
		if($insertid) 
		{
			return $insertid;
		}
		else 
		{
			return false;
		}
	}
	
	
	
	function deleteMessage($msgObj) 
	{
		/* removes and deletes a message (by id) */ 
		$msgId = $msgObj->getMessageId();
		$delSqlStr = "delete from ".$this->dbRefObj->TBL_MESSAGES.
			" where message_id=".$msgId;
		$resultBool = $this->db->remove($delSqlStr);
		return $resultBool;
	}
	
	
	
	function searchMessageById($msgId)
	{
		/* searches for a specific message */
		$searchSqlStr = "select * from ".$this->dbRefObj->TBL_MESSAGES.
			" where message_id=".$msgId;
		$result = $db->query($searchSqlStr);
		return $result[0];
	}
	
	
	
	function searchMessagesBySender($senderObj)
	{
		/* searches multiple messages sent by same sender */
		$searchSqlStr = "select * from ".$this->dbRefObj->TBL_MESSAGES.
			" where sender_id=".$senderObj->getUserId(); 
		$result = $db->query($searchSqlStr);
		return $result;	
	}
	
	
	
	function searchMessagesByRecipient($recipientObj)
	{
		/* searches multiple messages sent to a single recipient. */
		$searchSqlStr = "select * from ".$this->dbRefObj->TBL_MESSAGES.
			" where receiver_id=".$recipientObj->getUserId(); 
		$result = $db->query($searchSqlStr); 
		return $result; 
	}
	
	
	
	function searchMessageByTimestamp($timeStamp)
	{
		/* finds messages based on timestamp */
		$searchSqlStr = "select * from ".$this->dbRefObj->TBL_MESSAGES.
			" where timestamp=".$timeStamp;
		$result = $db->query($searchSqlStr); 
		return $result; 
	}
	
	
}

?>