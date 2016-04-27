<?php require_once("../../../../includes/db_connection.php"); 
		
		$menu_category_id = $_POST['id'];
		$menu_item = $_POST['item'];
		$menu_price = $_POST['price'];
		$menu_description = $_POST['description'];
		$menu_status = $_POST['status'];
		
		$connect = connect_to_database();
		$sql = "INSERT INTO menu_items (category_id, item, price, description, status)
		VALUES ('$menu_category_id', '$menu_item','$menu_price', '$menu_description' , '$menu_status');";

		$result = $connect->query($sql);
		mysqli_close($connnect);
		
		header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/menu/");
?>