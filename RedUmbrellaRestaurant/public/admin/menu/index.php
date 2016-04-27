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
	<h1> Menu </h1>
	';
	
		$connect = connect_to_database();
		$sql = "SELECT * FROM menu_category; ";

		$result = $connect->query($sql);
		mysqli_close($connnect);

		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$menu_category = $row['category'];
				$id = $row['id'];
				echo "
				<div class='menu'>
					<h1>$menu_category</h1> 

					<form action='add/' method='post'>
						<input type='hidden' value=$id name='id'>
						<input type='hidden' value=$menu_category name='cat'>
						<input type='submit' value='Add item to this category'> <br>
					</form>
				";
				
				$connect = connect_to_database();
				$sql = "SELECT * FROM menu_items WHERE category_id = '$id'; ";

				$sub_result = $connect->query($sql);
				echo $connect->error;
				mysqli_close($connnect);

				if ($sub_result) {
					while ($row = $sub_result->fetch_assoc()) {
						$menu_id = $row['id'];
						$menu_item = $row['item'];
						$menu_price = $row['price'];
						$menu_description = $row['description'];
						$menu_status = $row['status'];
						echo "
						<div class='menusub'>
							<h2><div>$menu_item</div></h2>
							<h4><div>$menu_price</div></h3>
							<h5><div>$menu_description</div></h5>

							<form action='edit/' style='' method='post'>
								<input type='hidden' value=$menu_id name='id'> <br>
								Item: <input type='text' value='$menu_item' name='item'> <br>
								Price: <input type='text' value=$menu_price name='price'> <br>
								Description: <input type='text' value='$menu_description' name='description'> <br>
								<input type='hidden' value=$menu_status name='status'> 

								<input type='submit' value='Edit Item'>
							</form>

							<form action='delete/' style='' method='post'>
								<input type='hidden' value=$menu_id name='id'>
								<input type='submit' value='Delete Item'> <br>
							</form>
						</div>";
							
					}
				}
					echo "</div>";
			}
		}
	echo "

	<div class=options>
		<a href='http://cgi.soic.indiana.edu/~festaton/public/admin/options.php'>
			<input type='button' value='Options'>
		</a>
	</div>

<a href='http://cgi.soic.indiana.edu/~festaton/public/admin/logout.php'>
      	<div class=logout> Logout </div> </a> 
      	
</body> 
</html>
"; 

}
	else {
		header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/");
	}

?>




