<?php require_once("../../../../includes/db_connection.php"); ?>

<?php
		$news_id = $_POST['id'];
		
		$connect = connect_to_database();
		$sql = "DELETE FROM news WHERE id='$news_id';";

		$result = $connect->query($sql);
		echo $connect->error;
		mysqli_close($connnect);
		
		header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/news/");
			
?>