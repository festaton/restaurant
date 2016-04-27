<?php 
require_once("../../../../includes/db_connection.php"); ?>

<?php
		$menu_id = $_POST['id'];
		
		$connect = connect_to_database();
		$sql = "DELETE FROM menu_items WHERE id='$menu_id';";

		$result = $connect->query($sql);
		echo $connect->error;
		mysqli_close($connnect);
		
		header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/menu/");
		
		
?>