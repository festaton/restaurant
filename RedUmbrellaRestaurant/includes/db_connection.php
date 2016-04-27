<?php

	function connect_to_database(){
		// 1. Create a database connection
		define("DB_SERVER", "db.soic.indiana.edu");
		define("DB_USER", "i491u15_festaton");
		define("DB_PASS", "my+sql=i491u15_festaton");
		define("DB_NAME", "i491u15_festaton");

		$connection = mysqli_connect(DB_SERVER, DB_USER,DB_PASS,DB_NAME); 
		
		// Test if connection succeeded.
		if(mysqli_connect_errno()) { //checks if there is an error 
			die("Database connetion failed: " . //die means exit or break
				mysqli_connect_error() .
				" (" . mysqli_connect_errno() . ")"
			);
		}

		return $connection;
	}
?>