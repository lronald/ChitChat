<?php

require_once('..\Group.php');
require_once('..\User.php'); 

$mygroup = new Group(10,"mcsfam",new User(12,"lronald","pwd2017")); 
echo $mygroup->getGroupName()."<br>";
echo $mygroup->getGroupId()."<br>"; 
echo $mygroup->getAdmin()->getUsername()."<br>"; 


?>