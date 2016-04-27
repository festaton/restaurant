<?php require_once("../../../../includes/db_connection.php"); 
		
		$news_title = $_POST['title'];
		$news_date = $_POST['date'];
		$news_content = $_POST['content'];
		
		$connect = connect_to_database();
		$sql = "INSERT INTO news (title, date, content)
		VALUES ('$news_title','$news_date', '$news_content');";

		$result = $connect->query($sql);
		mysqli_close($connnect);
		
		header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/news/");
?>