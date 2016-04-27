<?php require_once("../../includes/db_connection.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>


<div class="mainContent">
	<center> <h1> News </h1> </center>

	<?php 	
		$connect = connect_to_database();
		$sql = "SELECT * FROM news ORDER BY date DESC LIMIT 10; ";

		$result = $connect->query($sql);
		mysqli_close($connect);

		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$story_title = $row['title'];
				$story_date = $row['date'];
				$story_content = $row['content'];
				echo "
				<div class='news'>
					<h2>Title: $story_title</h1>
					<h4>Date: $story_date</h4>
					<p>Content: $story_content</p>
				</div>";
			}
		}
	?>
</div>





<?php include("../../includes/layouts/footer.php"); ?> 