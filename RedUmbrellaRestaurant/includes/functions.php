<?php

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

	function find_all_mains() {
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM main ";
		$query .= "WHERE visible = 1 ";
		$query .= "ORDER BY position ASC";
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		return $result;
	}

	function navigation($main_id) {

		//navigation takes currently selected main id as argument
		$output = "<ul class=\"subjects\">";
		$result = find_all_mains();
		while($main = mysqli_fetch_assoc($result)) {
			$output .= "<li"; // put it on three lines to input conditional
			// this is to add style to selected to help navigate page
			if($main["id"] == $main_id) {
				$output .= " class=\"selected\"";
				}
				$output .= ">";
				$output .= "<a href=\"index.php?main=";
				$output .= urlencode($main["id"]); 
				$output .= "\">";
				$output .= $main["nav_name"]; 
				$output .= "</a>";		
		}
				
		mysqli_free_result($result); 
		$output .= 	"</ul>";

		return $output;
	}
?>
	
