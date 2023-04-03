<?php

session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		//something was posted
		$current = $_POST['curr'];
		$password = $_POST['password'];
    $tpassword = $_POST['tpassword'];
    $user_data = check_login($con);
    $id = $user_data['id'];
		$email = $user_data['email'];
		if($password == $tpassword && $current == $user_data['password'])
		{

		$query = "update users set password='$tpassword' where email='$email'";
		$result = mysqli_query($con, $query);
		header("Location: index.php");
		die;
	}
	else{ echo "Both Must Be Same";}

	}




?>


<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
</head>
<body bgcolor="#aef7fc">
<h1 id="header"> UPDATE PASSWORD </h1>
	<style type="text/css">

	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: darkblue;
		border: none;
	}

	#box{

		background-color: #aef7fc;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
  #header{
    color: darkblue;
    text-align  : center;
  }

	</style>

	<div id="box">

		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: black;">Enter Details</div>

			<input id="text" type="text" name="curr" placeholder="Current Password"><br><br>
			<input id="text" type="password" name="password" placeholder="New Password"><br><br>
      <input id="text" type="password" name="tpassword" placeholder="Confirm New Password"><br><br>

			<input id="button" type="submit" value="Update"><br><br>

			<a href="index.php">Back to index page</a><br><br>
		</form>
	</div>
</body>

</html>
