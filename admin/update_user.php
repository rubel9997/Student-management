<?php
session_start();
require_once "dbconnect.php";
error_reporting(0);
$id=$_GET['id'];
$data=mysqli_query($link,"SELECT * FROM `users` WHERE `id`='$id'");
$data_row=mysqli_fetch_assoc($data);

if (isset($_POST['update_user'])) 
{
	$name           =$_POST['name'];
	$email          =$_POST['email'];
	$username       =$_POST['username'];
	
	$query="UPDATE `users` SET 
	`name`='$name',
	`email`='$email',
	`username`='$username'
	WHERE  `id`='$id'";
	$result=mysqli_query($link,$query);
	if ($result) 
	{
		header("location:index.php?page=all_students");
	}
	
}
?>
<div class="row">
	<div class="col-sm-6">
		<form action="" method="post">
			<div>
				<label for="name">Name :</label>						
				<input class="form-control" type="text" id="name" name="name" value="<?php echo $data_row['name']?>">
			</div>

			<div>
				<label for="email">Email :</label>						
				<input class="form-control" type="text" id="email" name="email" value="<?php echo $data_row['email']?>" >						
			</div>


			<div >
				<label for="Username">Username :</label>						
				<input class="form-control" type="text" id="Username" name="username" value="<?php echo $data_row['username']?>">	
			</div>


			<div>
				<input  type="submit" name="update_user" class="btn btn-primary float-right">
			</div>

		</form>
	</div>
</div>