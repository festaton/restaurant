<?php 
session_start();
session_unset();
session_destroy();
header("Location:http://cgi.soic.indiana.edu/~festaton/public/admin/");
?> 