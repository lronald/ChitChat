<?php
/*
	Message Class
	Description: Represents a single message sent or recieived by a user.
	(C) 2017. ChitChat. All Rights Reserved. 
	A Louis Ronald Production. 
*/

class Message {
	
	private $messageId;
	private $sender;
	private $recipient;
	private $message;
	private $timeStamp;
	
	function __construct($msgId, $senderObj, $recipientObj, $msg, $timeStamp)
	{
		$this->messageId = $msgId;
		$this->sender = $senderObj;
		$this->recipient = $recipientObj
		$this->message = $msg;
		$this->timeStamp = $timeStamp;
	}
	
	function getMessageId()
	{
		return $this->messageId;
	}
	
	function getSender()
	{
		return $this->sender;
	}
	
	function getRecipient()
	{
		return $this->recipient;
	}
	
	function getMessage()
	{
		return $this->message;
	}
	
	function getTimeStamp()
	{
		return $this->timeStamp;
	}
}

?>