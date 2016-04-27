<?php require_once("../../../../includes/db_connection.php"); 

		$event_id = $_POST['id'];
		$event_title = $_POST['title'];
		$event_date = $_POST['date'];
		$event_location = $_POST['location'];
		$event_description = $_POST['description'];
		$event_status = $_POST['status'];
		
		$connect = connect_to_database();
		$sql = "UPDATE event SET title='$event_title', date='$event_date', location='$event_location'
		,description='$event_description', status='$event_status' WHERE id='$event_id';";

		$result = $connect->query($sql);
		mysqli_close($connnect);
		
		
		header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/event/");
?>