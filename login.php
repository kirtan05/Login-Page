<?php

session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{

			//read from database
			$query = "select * from users where email = '$email' limit 1";
			$result = mysqli_query($con, $query);
      //echo "Going to index";

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);

					if($user_data['password'] === $password)
					{

						$_SESSION['email'] = $user_data['email'];
            //echo "Going to index";
						header("Location: index.php");
						die;
					}
				}
			}

			echo "wrong email or password!";
		}else
		{
			echo "wrong email or password!";
		}
	}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
</head>
<body bgcolor="#aef7fc">
<h1 id="header"> WELCOME TO USER LOGIN </h1>
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
			<div style="font-size: 20px;margin: 10px;color: black;">Login</div>

			<input id="text" type="text" name="email" placeholder="Email"><br><br>
			<input id="text" type="password" name="password" placeholder="Password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>

</html>
