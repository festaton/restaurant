<?php

  session_start();
  if ($_SESSION['logged_in'] == TRUE) {

  $c_id = $_POST['id']; //Getting category id from form button on previous page
  $category = $_POST['cat']; // Getting category name from form button on previous page

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
      <center><h1> Add Item to ' . $category . '</h1></center>
    </header>


    <div class="mainContent">

      <form method="post" action="submit.php">
        <p><input type="hidden" name="id" value=' . $c_id . ' placeholder="Category ID"></p>
        <p><input type="text" name="item" value="" placeholder="Item"></p>
        <p><input type="text" name="price" value="" placeholder="Price (x.xx)"></p>
        <p><input type="text" name="description" value="" placeholder="Description"></p>
        <p><input type="text" name="status" value="" placeholder="0 or 1"></p>
        
        <p class="submit"><input type="submit" name="commit" value="Add"></p>
      </form>

      <a href="http://cgi.soic.indiana.edu/~festaton/public/admin/menu/">
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
    