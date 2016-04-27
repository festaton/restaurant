<?php require_once("../../includes/db_connection.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>


<div class="mainContent">
	<center><h1> Events </h1></center>
	<?php 	
		$connect = connect_to_database();
		$sql = "SELECT * FROM event ORDER BY date DESC;";

		$result = $connect->query($sql);
		mysqli_close($connect);

		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$event_title = $row['title'];
				$event_date = $row['date'];
				$event_location = $row['location'];
				$event_description = $row['description'];
				$event_status = $row['status'];
				echo "
				<div class='event'>
					<h2>Title: $event_title</h2>
					<h4>Date: $event_date</h4>
					<h4>Location: $event_location</h4>
					<p>Description: $event_description</p>

				</div>";
			}
		}
	?>
</div>








<?php include("../../includes/layouts/footer.php"); ?> 