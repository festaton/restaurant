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
	<h1> News </h1>

	';
	
		$connect = connect_to_database();
		$sql = "SELECT * FROM news; ";

		$result = $connect->query($sql);
		mysqli_close($connect);

		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$story_id = $row['id'];
				$story_title = $row['title'];
				$story_date = $row['date'];
				$story_content = $row['content'];
				echo "
				<div class='news'>
					
					<h2>Title: $story_title</h2>
					<h4>Date: $story_date</h4>
					<p>Content: $story_content</p>

					<form action='edit/' style='' method='post'>
						<input type='hidden' value=$story_id name='id'> <br>
						Title: <input type='text' value='$story_title' name='title'> <br>
						Date: <input type='text' value=$story_date name='date'> <br>
						Content: <input type='text' value='$story_content' name='content'> <br>

						<input type='submit' value='Edit Item'>
					</form>

					<br>

					<form action='delete/' style='' method='post'>
						<input type='hidden' value=$story_id name='id'>
						<input type='submit' value='Delete Item'> <br>
					</form>

				</div>";
			}
		}
	
echo "

	<div class=add>
		<a href='http://cgi.soic.indiana.edu/~festaton/public/admin/news/add/'>
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


