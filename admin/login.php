<?php
require_once "dbconnect.php";
session_start();

if(isset($_SESSION['login_user']))
{
	header("location:index.php");
}
if (isset($_POST['submit'])) {
	$username       =$_POST['username'];
	$password       =$_POST['password'];

	$username_check=mysqli_query($link,"SELECT * FROM users WHERE username='$username'");
	if(mysqli_num_rows($username_check)>0)
	{
		$row=mysqli_fetch_assoc($username_check);
		if ($row['password']==md5($password))
		{
		  if ($row['status']=='active') 
		  {
		  	$_SESSION['login_user']=$username;
		  	header("location:index.php");	
		  }	
		  else
		  {
		  	echo "<script>alert('Your status is inactive.please active your status')</script>";
		  }
		}
		else
		{
			echo "<script>alert('this password is not found')</script>";
		}
	}
	else
	{
		
		echo "<script>alert('this username is not found')</script>";

	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container">
		<br>
		<h1 class="text-center">Student Management System</h1>
		<br><br>
		<h2 class="text-center">Admin Login</h2>
		<br>
		<div class="row justify-content-sm-center">
			<div class="col-sm-4">
				<form action="login.php" method="post">
					<div>
						<label for="">Username :</label>
						<input class="form-control" type="text" name="username" value="<?php if(isset($username)){echo $username;}?>" required="" placeholder="Username">
					</div>
					<div>
						<label for="">Password :</label>
						<input class="form-control" type="text" name="password" value="<?php if(isset($username)){echo $password;}?>" required="" placeholder="Password">
					</div>
					<br>
					<div>
						<a class="btn btn-info" href="registration.php">back</a>
						<input type="submit" name="submit" value="submit" class="btn btn-info float-right">
					</div>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>