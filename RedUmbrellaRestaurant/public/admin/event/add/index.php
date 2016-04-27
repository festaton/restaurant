<?php 
  //require_once("../../../includes/db_connection.php"); 
  session_start();
  if ($_SESSION['logged_in'] == TRUE) {
    echo '

<html lang="en">
  <head>
    <title>Red Umbrella</title>
    <link href="../../../stylesheets/public.css" media="all" rel="stylesheet" type = "text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  </head>
  <body class="body">
    <header class="mainHeader">
      <center><img src="../../../title.png"></center>
      <center><h1> Add Event </h1></center>
    </header>


    <div class="mainContent">

      <form method="post" action="submit.php">
        <p><input type="text" name="title" value="" placeholder="Title"></p>
        <p><input type="text" name="date" value="" placeholder="Date (YYYY-DD-MM)"></p>
		    <p><input type="text" name="location" value="" placeholder="Location"></p>
		    <p><input type="text" name="description" value="" placeholder="Description"></p>
		    <p><input type="text" name="status" value="" placeholder="0 or 1"></p>
        
        <p class="submit"><input type="submit" name="commit" value="Add"></p>
      </form>

      <a href="http://cgi.soic.indiana.edu/~festaton/public/admin/event/">
        <input type="button" value="Cancel">
      </a>

    </div>
    </body>
</html>    
';

}
  else {
    header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/");
  }

?>  