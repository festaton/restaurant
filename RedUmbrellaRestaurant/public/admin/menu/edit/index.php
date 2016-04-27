<?php require_once("../../../../includes/db_connection.php"); 

		$item_id = $_POST['id'];
		$item_name = $_POST['item'];
		$item_price = $_POST['price'];
		$item_description = $_POST['description'];
		$item_status = $_POST['status'];
		
		$connect = connect_to_database();
		$sql = "UPDATE menu_items SET item='$item_name', price='$item_price', 
		description='$item_description', status='$item_status' WHERE id='$item_id';";

		$result = $connect->query($sql);
		mysqli_close($connnect);
		
		
		header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/menu/");
?>