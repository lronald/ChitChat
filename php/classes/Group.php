<?php
/*
	Group Class
	Description: Represents a single convo group in the ChitChat system.
	(C) 2017. ChitChat. All Rights Reserved. 
	A Louis Ronald Production. 
*/


class Group {
	
	private $groupId;
	private $name;
	private $admin;
	
	function __construct($groupid, $name, $admin)
	{
		$this->groupId = $groupid;
		$this->name = $name; 
		$this->admin = $admin;
	}
	
	function getGroupId()
	{
		return $this->groupId;
	}
	
	function getGroupName()
	{
		return $this->name;
	}
	
	function getAdmin() 
	{
		return $this->admin;
	}
}

?>