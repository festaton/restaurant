<?php 
require_once("../../../../includes/db_connection.php"); ?>

<?php
		$event_id = $_POST['id'];
		
		$connect = connect_to_database();
		$sql = "DELETE FROM event WHERE id='$event_id';";

		$result = $connect->query($sql);
		echo $connect->error;
		mysqli_close($connnect);
		
		header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/event/");
		
		
?>