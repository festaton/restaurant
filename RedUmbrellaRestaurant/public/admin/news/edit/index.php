<?php require_once("../../../../includes/db_connection.php"); 

		$news_id = $_POST['id'];
		$news_title = $_POST['title'];
		$news_date = $_POST['date'];
		$news_content = $_POST['content'];

		
		$connect = connect_to_database();
		$sql = "UPDATE news SET title='$news_title', date='$news_date',content
		='$news_content' WHERE id='$news_id';";
		
		$result = $connect->query($sql);
		mysqli_close($connnect);
		
		header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/news/");
?>