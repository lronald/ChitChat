<?php

	/*
		ChitChat Db Adapter
		PHP MySQLi Database Adapter (MySqliDbAdapter.php)
		Developed by Louis Ronald on April 2015. 
		
		This adapter forms the basis for all database connections performed by
		any php scripts that implement it. It is developed specifically for 
		MySQL although other database technologies may work (not tested). 
		This PHP MySQL adapter is applicable to any PHP script that requires
		database access. For the purposes of a particular project this adapter
		is used in, this script may be manipulated to suit the needs of a 
		specific application. 
		
		(c) Copyright 2015. Louis Ronald. All Rights Reserved.
	*/
	
	
	// begin dbadapter class. 
	class MySqliDbAdapter {
		
		private $dbhost = "";										// database host address or domain name.
		private $dbname = "";										// database name.
		private $dbusr = "";										// database username
		private $dbpwd = "";										// database password
		
		// constructor function
		function MySqliDbAdapter($dbHost,$dbName,$dbUsername,$dbPassword) {
			// initialize class variables. 
			$this->dbhost = $dbHost;								// init class var dbhost to passed dbHost. 
			$this->dbname = $dbName;								// init class var dbname to passed dbName. 
			$this->dbusr =  $dbUsername;							// init class var dbusr to passed dbUsername. 
			$this->dbpwd =  $dbPassword;							// init class var dbpwd to passed dbPassword. 
		}
		
	
		
		function query($querySqlStr) {
			/*
				function name: 		- query. 
				parameters: 		- querySqlStr. 
				description: 		- performs SQL select query on db. 
									  query is passed via 'querySqlStr'.
				Return Values:		- FALSE or
									- ARRAY of result records.			
			*/
			$returnValue = false;									// initialize a return value variable.
			try {													// enter the TRY clause. 
				$conn = new mysqli($this->dbhost,$this->dbusr,		// create a database connection. 
								   $this->dbpwd,$this->dbname);
				$result = $conn->query($querySqlStr);				// perform the query and retrieve the result into a variable.
				if($result == false) { 								// if no result is returned after performing query. 
					$returnValue = false;  							// set return value variable to false. 
				}
				else { 												// if results are returned after performing query.
					$tempArray = array();
					while($row = $result->fetch_row()) { 			// fetch each row of result. 
						array_push($tempArray,$row);     			// append each row to temp array. 
					}
					$returnValue = $tempArray; 			 			// set return value equal to temp array. 
				}
				mysqli_close($conn); 								// close the mysqli connection.
			}
			catch(Exception $e) {										// catch 'exception'
				$returnValue = false;								// set valeu of return value variable to boolean false. 
			}
			/*finally {												// enter finally clause.
				return $returnValue; 								// return the value of variable returnValue. 
			}
			*/
			return $returnValue;
		}
		
		
		
		function insert($insertSqlStr) {
			/*
				function name: 		- insert.
				parameters: 		- insertSqlStr.
				description: 		- performs SQL insert query on db. 
									  query is passed via 'insertSqlStr'.
				Return Values:		- FALSE for unsuccessful insertion or;
									- Insert ID value for successful
									  insertion into table with AUTO-
									  INCREMENTAL field. 
									- TRUE for successful insertion 
									  into table with NO auto-incr. 
									  fields. 
			*/
			
			$returnValue = false;									// initialize return value variable to bool false. 
			try {													// enter try clause. 
				$conn = new mysqli($this->dbhost,$this->dbusr,		// create a database connection. 
								   $this->dbpwd,$this->dbname);
				$result = $conn->query($insertSqlStr);				// perform query. store results in result variable.
				
				if($result == false) {								// if no results returned. 
					$returnValue = false;  							// set return value variable to false. 
				}
				else {												// if results were returned. 
					if($conn->insert_id == "") {					// if no insert id returned...
						$returnValue = false; 						// set return value variable equal to bool false. 
					} else {										// if insert id returned
						$returnValue = $conn->insert_id;			// set return value variable equal to insert id. 
					}
				}
				mysqli_close($conn);
			}
			catch(Exception $e) {										// catch any possible exception
				$returnValue = false; 								// set return value variable to false. 
			}
			
			return $returnValue;								// return the current value of returnValue variable. 
		}
		
		
		
		function update($updateSqlStr) {
			/*
				function name: 		- update
				parameters: 		- updateSqlStr.
				description: 		- performs SQL update query on db. 
									  query is passed via 'updateSqlStr'.
				Return Values:		- FALSE for unsuccessful update. 
									- TRUE for successful update. 
			*/
			
			try {
				$returnValue = false;								// initialize the return value variable to bool false. 
				$conn = new mysqli($this->dbhost,$this->dbusr,		// create database connection. 
								   $this->dbpwd,$this->dbname);
				$result = $conn->query($updateSqlStr);				// perform the update query. 

				if($result == false) {								// if update failed...
					$returnValue = false;  							// set returnValue variable to bool false. 
				}
				else {												// if update successful. 
																	// set return value variable to bool true. 
					$returnValue = true; 
				}
				mysqli_close($conn);								// close the mysqli db connection. 
			}
			catch(Exception $e) {									// if there are any exceptions caught... 
				$returnValue = false; 								// set the returnValue variable to bool false. 
			}

			return $returnValue;									// return the value of returnValue variable. 		
		}
		
		function remove($deleteSqlStr) {
			/*
				function name: 		- remove.
				parameters: 		- deleteSqlStr.
				description: 		- performs SQL delete query on db. 
									  query is passed via 'deleteSqlStr'.
				Return Values:		- FALSE for unsuccessful deletion. 
									- TRUE for successful deletion. 
			*/
			
			$returnValue = false;									// initialize the returnValue variable to bool false. 
			try {													// enter th try clause. 
			$conn = new mysqli($this->dbhost,$this->dbusr,			// create the database connection. 
							   $this->dbpwd,$this->dbname);			
			$result = $conn->query($deleteSqlStr);					// perform the delete query
			
			if($result == false) {									// if the deletion is successful...
				$returnValue = false;  								// set the returnValue variable to bool false. 
			}
			else {													// if the deletion is unsuccessful...
				$returnValue = true; 								// set the returnValue variable to bool true. 
			}
			mysqli_close($conn);									// close the mysqli db connection. 
			}
			catch(Exception $e) {										// if any possible exceptions are caught...
				$returnValue = false; 								// set the returnValue variable to bool false. 
			}
            
			return $returnValue;									// return the value of returnValue variable. 
		}
	}
?>