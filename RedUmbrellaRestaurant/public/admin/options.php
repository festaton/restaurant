<?php 
	include("../includes/layouts/header.php"); 
	session_start();
	if ($_SESSION['logged_in'] == TRUE) {
		echo '
<html lang="en">
	<head>
		<title>Red Umbrella</title>
		<link href="../stylesheets/public.css" media="all" rel="stylesheet" type = "text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	</head>
	<body class="body">
		<header class="mainHeader">
			<center><img src="../title.png"></center>
			<center><h1> Login Successful. Welcome Admin! </h1></center>
			<center><h3> Select what you want to edit </h3></center>
		</header>
		
		<center>
		<form method="post" action="http://cgi.soic.indiana.edu/~festaton/public/admin/news/">
        	<p class="submit"><input type="submit" name="commit" value="News"></p>
      	</form>
      	
      	<form method="post" action="http://cgi.soic.indiana.edu/~festaton/public/admin/event/">
        	<p class="submit"><input type="submit" name="commit" value="Events"></p>
      	</form>
      	
      	<form method="post" action="http://cgi.soic.indiana.edu/~festaton/public/admin/menu/">
        	<p class="submit"><input type="submit" name="commit" value="Menu"></p>
      	</form>
      	</center>

      	<a href="http://cgi.soic.indiana.edu/~festaton/public/admin/logout.php">
      	<div class=logout> Logout </div> </a> 
      	
</body>

</html>';
	}
	else {
		header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/");
	}
?>




