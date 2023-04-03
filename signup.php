<?php
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
    $first_name = $_POST['first'];
    $last_name = $_POST['last'];
		$email = $_POST['email'];
		$password = $_POST['password'];


		if(!empty($email) && !empty($password))
		{

			//save to database
			//$user_id = random_num(20);
      $queryy = "select * from users";
      $resullt = mysqli_query($con, $queryy);
      $user_id=mysqli_num_rows($resullt)+1;

			$query = "insert into users (id,first_name,last_name,email,password) values ('$user_id','$first_name','$last_name','$email','$password')";
			mysqli_query($con, $query);
			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Signup</title>
</head>
<body bgcolor="lightblue">

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

		background-color: rgb(188,229,232);
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">

		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: black;">Signup</div>
      <input id="text" type="text" name="first"><br><br>
      <input id="text" type="text" name="last"><br><br>
			<input id="text" type="text" name="email"><br><br>
			<input id="text" type="password" name="password"><br><br>
			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>
