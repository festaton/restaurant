<?php require_once("../includes/db_connection.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>Red Umbrella</title>
		<link href="stylesheets/public.css" media="all" rel="stylesheet" type = "text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	</head>
	<body class="body">
		<header class="mainHeader">
			<center><img src="title.png"></center>
			
			<nav><ul>
				<li class="active"><a href="http://cgi.soic.indiana.edu/~festaton/public/">Home</a></li>
				<li><a href="about/">About Us</a></li>
				<li><a href="news/">News</a></li>
				<li><a href="event/">Events</a></li>
				<li><a href="menu/">Menu</a></li>
				<li><a href="contact/">Contact Us</a></li>
				<li><a href="admin/">Login</a></li>
			</ul></nav>
			</header>

		<div class="mainContent">
				<center> <h1> Home </h1> </center>
					<p> Welcome to The Red Umbrella's restaurant site. On this website
					you can learn about us, check our recent news, upcoming and past 
					events, check out our menu, and find our contact information. We
					are happy to serve locals and visitors alike. Welcome to Bloomington,
					a small town with delicious food options. Come join us! </p>
				
				<div class="image-wrapper">	 
					<img src="redUmbrella.jpg">
				</div>

				<center> <h2> Recent News </h2> </center>

				<?php 	
					$connect = connect_to_database();
					$sql = "SELECT * FROM news ORDER BY date DESC LIMIT 3;";

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



<?php include("../includes/layouts/footer.php"); ?> 