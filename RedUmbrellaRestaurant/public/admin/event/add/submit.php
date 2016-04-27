<?php require_once("../../../../includes/db_connection.php"); 
		
		$event_title = $_POST['title'];
		$event_date = $_POST['date'];
		$event_location = $_POST['location'];
		$event_description = $_POST['description'];
		$event_status = $_POST['status'];
		
		$connect = connect_to_database();
		$sql = "INSERT INTO event (title, date, location, description, status)
		VALUES ('$event_title','$event_date', '$event_location' , '$event_description', '$event_status');";

		$result = $connect->query($sql);
		mysqli_close($connnect);
		
		header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/event/");
?>