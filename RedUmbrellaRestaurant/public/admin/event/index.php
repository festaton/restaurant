<?php 
	require_once("../../../includes/db_connection.php"); 
	session_start();
	if ($_SESSION['logged_in'] == TRUE) {
		echo '

<html lang="en">
	<head>
		<title>Red Umbrella</title>
		<link href="../../stylesheets/public.css" media="all" rel="stylesheet" type = "text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	</head>
	<body class="body">
		<header class="mainHeader">
			<center><img src="../../title.png"></center>
			<center><h1> Admin Add, Edit, and Delete </h1></center>
		</header>

	<div class="mainContent">
		<h1> Events </h1>
		';
		
		$connect = connect_to_database();
		$sql = "SELECT * FROM event ORDER BY date DESC; ";

		$result = $connect->query($sql);
		mysqli_close($connect);

		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$event_id = $row['id'];
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


					<form action='edit/' style='' method='post'>
						<input type='hidden' value=$event_id name='id'> <br>
						Title: <input type='text' value='$event_title' name='title'> <br>
						Date: <input type='text' value=$event_date name='date'> <br>
						Location: <input type='text' value='$event_location' name='location'> <br>
						Description: <input type='text' value='$event_description' name='description'> <br>
						<input type='hidden' value=$event_status name='status'> 

						<input type='submit' value='Edit Item'>
					</form>

					<br>

					<form action='delete/' style='' method='post'>
						<input type='hidden' value=$event_id name='id'>
						<input type='submit' value='Delete Item'> <br>
					</form>
					

				</div>";
			}
		}
echo " 
	
	<div class=add>
		<a href='http://cgi.soic.indiana.edu/~festaton/public/admin/event/add/'>
			<input type='button' value='Add Item'>
		</a>
	</div>

	<div class=options>
		<a href='http://cgi.soic.indiana.edu/~festaton/public/admin/options.php'>
			<input type='button' value='Options'>
		</a>
	</div>

		<a href='http://cgi.soic.indiana.edu/~festaton/public/admin/logout.php'> <div class=logout> Logout </div> </a> 
      	
</body> 
</html>
";
	}
	else {
		header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/");
	}

?>

