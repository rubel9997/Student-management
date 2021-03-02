<h2 class="text-primary"><i class="fa fa-user"> Profile <small>My profile</small></i></h2>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page"><a href="index.php?page=dashboard"><i class="fa fa-dashboard"> DASHBOARD</i></a></li>
		<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user"> Profile</i></li>
	</ol>
</nav>
<?php
$user_login=$_SESSION['login_user'];
$data_row=mysqli_query($link,"SELECT * FROM `users` WHERE `username`='$user_login'");
$user_row=mysqli_fetch_assoc($data_row);
?>

<div class="row">
	<div class="col-sm-6">
		<table class="table table-bordered">
			<tr>
				<td>User ID</td>
				<td><?php echo $user_row['id'];?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php echo ucwords($user_row['name']);?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $user_row['username'];?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $user_row['email'];?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><?php echo ucwords($user_row['status']);?></td>
			</tr>
			<tr>
				<td>SignUp Date</td>
				<td><?php echo $user_row['datetime'];?></td>
			</tr>
			
		</table>
		<a class="btn btn-primary pull-right" href="update_user.php?id=<?php echo $user_row['id'];?>">Edit Profile</a>
	</div>
	<div class="col-sm-3">
		<a href="">
			<img src="images/<?php echo $user_row['photo'];?>" class="img-thumbnail" alt="">
		</a>
		<br><br>
		<?php
		if (isset($_POST['upload']))
		{
			$photo=explode('.', $_FILES['photo']['name']);
			$photo=end($photo);
			$photo_name=$user_login.'.'.$photo;

			$result=mysqli_query($link,"UPDATE `users` SET `photo`='$photo_name' WHERE `username`='$user_login';");
			if (isset($result)) 
			{
				move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
				
			}
		}
		?>
		<form action="" method="post" enctype="multipart/form-data">
			<label for="photo">Profile Picture</label>
			<input type="file" name="photo" id="photo"><br>
			<input type="submit" name="upload" value="upload" class="btn btn-primary">
		</form>
	</div>
</div>