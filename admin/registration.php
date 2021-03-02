<?php
require_once "dbconnect.php";
session_start();
if (isset($_POST['registration']))
{
	$name           =$_POST['name'];
	$email          =$_POST['email'];
	$username       =$_POST['username'];
	$password       =$_POST['password'];
	$confirmpassword=$_POST['confirmpassword'];

	$photo=explode('.', $_FILES['photo']['name']);
	$photo=end($photo);
	$photo_name=$username.'.'.$photo;
     
	$input_error=array();

	if (empty($name)) 
	{
		$input_error['name']="The name is required";
	}
	if (empty($email)) 
	{
		$input_error['email']="The email is required";
	}
	
	if (empty($username)) 
	{
		$input_error['username']="The Username is required";
	}
	
	if (empty($password)) 
	{
		$input_error['password']="The password is required";
	}
	if (empty($confirmpassword)) 
	{
		$input_error['confirmpassword']="The confirm password is required";
	}
	

	if (count($input_error)==0) 

	{
		$email_check=mysqli_query($link,"SELECT * FROM `users` WHERE `email`='$email';");
		if(mysqli_num_rows($email_check)==0)
		{
			$username_check=mysqli_query($link,"SELECT * FROM `users` WHERE `username`='$username';");
			if(mysqli_num_rows($username_check)==0)
			{
				if (strlen($username)>4) 
				{
					if(strlen($password)>5)
					{
						if ($password==$confirmpassword)
						{
							 $password=md5($password);
							$query="INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";
							$result=mysqli_query($link,$query);
							if($result)
							{
								$_SESSION['success']="data insert successfully";

								move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
								header("location:registration.php");
							}
							else
							{
								$_SESSION['error']="data not insert";
							}
							
							
							
						}
						else
						{
							echo "<script> alert('password and confirm password must be same')</script>";
						}
					}
					else
					{
						echo "<script> alert('password is more than 7 characters')</script>";
					}	
				}
				else
				{
					echo "<script> alert('username is more than 4 characters')</script>"; 

				}
			}
			else
			{

				echo "<script> alert('The username is already exits')</script>"; 
			}
		}
		else
		{
			$email_error="The email is already exits";
		}	
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
	<link rel="stylesheet" href="../css/style.css">

</head>
<body>
	<div class="container"> <br><br>
		<h2 class="text-center">User Registration Form</h2><hr>
		
			<?php
			if (isset($_SESSION['success'])) 
			{
			 echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';
			 unset($_SESSION['success']);	
			} 
			?>
			<?php
			if (isset($_SESSION['error'])) 
			{
			 echo '<div class="alert alert-warning">'.$_SESSION['error'].'</div>';
			  unset($_SESSION['error']);		
			} 
			?>

		<div class="row justify-content-sm-center">
			<div class="col-sm-4">
				<form action="" method="post" enctype="multipart/form-data">
					<div>
						<label for="name">Name :</label>						
						<input class="form-control" type="text" id="name" name="name" value="<?php if(isset($name)){echo $name;}?>" placeholder="Enter Your name">
					</div>
					<span class="error">
						<?php if(isset($input_error['name']))
						{
							echo 	$input_error['name'];
						}
						?>
					</span>
					<div>
						<label for="email">Email :</label>						
						<input class="form-control" type="text" id="email" name="email" value="<?php if(isset($email)){echo $email;}?>" placeholder="Enter Your email">						
					</div>
					<span class="error">
						<?php if(isset($input_error['email'])){ echo $input_error['email'];}?>
					</span>
					<span class="error">
						<?php if(isset($email_error)){ echo $email_error;}?>
					</span>
					<div >
						<label for="Username">Username :</label>						
						<input class="form-control" type="text" id="Username" name="username" value="<?php if(isset($username)){echo $username;}?>" placeholder="Enter Your Username">	
					</div>
					<span class="error">
						<?php if(isset($input_error['username'])){echo $input_error['username'];}?>
					</span>
					
					<div >
						<label for="password" >Password :</label>						
						<input class="form-control" type="text" id="password" name="password" value="<?php if(isset($password)){echo $password;}?>" placeholder="Enter Your password">		
					</div>
					<span class="error">
						<?php if(isset($input_error['password']))
						{
							echo 	$input_error['password'];
						}
						?>
					</span>
					<div>
						<label for="confirmpassword" >Confirm Password :</label>		<input class="form-control" type="text" id="confirmpassword" name="confirmpassword" value="<?php if(isset($confirmpassword)){echo $confirmpassword;}?>" placeholder="Enter Your confirm password">						
					</div>
					<span class="error">
						<?php if(isset($input_error['confirmpassword']))
						{
							echo 	$input_error['confirmpassword'];
						}
						?>
					</span>
					<div>
						<label for="photo">Photo :</label><br>
						<input  type="file" id="photo" name="photo" value="">			
					</div>					
					<div>
						<input  type="submit" value="Registration" name="registration" class="btn btn-primary float-right">
					</div>

				</form>
			</div>
		</div>
		<br>
		<p class="text-center">If You have an account? Then Please <a href="login.php">Login</a></p><hr>
		<footer>			
			<p>Copyright &copy 2020-<?php echo date("Y");?> || All Rights Reserved.</p>
		</footer>
	</div>

</body>
</html>