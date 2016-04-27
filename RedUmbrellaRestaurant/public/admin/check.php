<?php require_once("../../includes/db_connection.php"); ?>

<?php
	session_start();
	//Place form inputs into variables
	$input_username = $_POST['username'];
	$input_password = $_POST['password'];
	$hashed_input_password = hash("md5",$input_password);
	

	//Getting the username and hased_password from database
	$connect = connect_to_database();
	$sql = "SELECT * FROM admin; ";

	$result = $connect->query($sql);
	mysqli_close($connect);

	if ($result) {
		while ($row = $result->fetch_assoc()) {
			$username = $row['username'];
			$hashed_password = $row['hashed_password'];
			
		}
	}
	
	if($input_username == $username && $hashed_input_password == $hashed_password) {
		$_SESSION['logged_in'] = TRUE; //creates session variable called logged_in within the session
		header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/options.php");
	} else header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/index2.html");
		
?>	
	


