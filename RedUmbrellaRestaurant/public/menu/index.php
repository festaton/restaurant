<?php require_once("../../includes/db_connection.php"); ?>
<?php include("../../includes/layouts/header.php"); ?>


<div class="mainContent">
	<center> <h1> Menu </h1> </center> 

	<?php 	
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
				";
				
				$connect = connect_to_database();
				$sql = "SELECT * FROM menu_items WHERE category_id = '$id'; ";

				$sub_result = $connect->query($sql);
				echo $connect->error;
				mysqli_close($connnect);

				if ($sub_result) {
					while ($row = $sub_result->fetch_assoc()) {
						$menu_category_id = $row['category_id'];
						$menu_item = $row['item'];
						$menu_price = $row['price'];
						$menu_description = $row['description'];
						$menu_status = $row['status'];
						echo "
						<div class='menusub'>
							<h2><div>$menu_item</div></h2>
							<h3><div>$menu_price</div></h3>
							<h4><div>$menu_description</div></h4>
							<br>
						</div>";			
					}
				}
						echo "</div>";
				
			}
		}
	?>
	</div>


<?php include("../../includes/layouts/footer.php"); ?> 