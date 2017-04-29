<?php
/*
	GroupMessage Class
	Description: Represents a single message sent to a convo group.
	(C) 2017. ChitChat. All Rights Reserved. 
	A Louis Ronald Production. 
*/

class GroupMessage {
	
	private $groupMessageId; 
	private $group;
	private $sender;
	private $message;
	private $timestamp;
	
	function __GroupMessage($grpMsgId, $grpObj, $senderObj, $message, $timeStamp)
	{
		$this->groupMessageId = $grpMsgId; 
		$this->group = $grpObj; 
		$this->sender = $senderObj; 
		$this->message = $message; 
		$this->timestamp = $timeStamp; 
	}
	
	function getGroupMessageId()
	{
		return $this->groupMessageId;
	}
	
	function getSender()
	{
		return $this->sender;
	}
	
	function getGroup() 
	{
		return $this->group; 
	}
	
	function getMessage()
	{
		return $this->message; 
	}
	
	function getTimeStamp()
	{
		return $this->timestamp;
	} 
}

?>