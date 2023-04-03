<?php
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>My Website</title>
 	<style>
 		body {
 			background-color: lightblue;
 		}
 	</style>
 </head>
 <body>
 	<h1>Hello,  <?php echo $user_data['first_name']; ?>
</h1>
 	<a href="logout.php"><button>Logout</button></a>
 	<a href="update.php"><button>Update Password</button></a>
 </body>
 </html>
