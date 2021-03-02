
<h2 class="text-primary"><i class="fa fa-dashboard"> Add student <small>add new student</small></i></h2>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active"><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"> Add student</i></li>
	</ol>
</nav>

<?php
if (isset($_POST['submit'])) 
{

	$name=$_POST['name'];
	$roll=$_POST['roll'];
	$city=$_POST['city'];
	$pcontact=$_POST['pcontact'];
	$class=$_POST['class'];

	$picture=explode('.', $_FILES['picture']['name']);
	$picture_end=end($picture);
	$picture_name=$roll.'.'.$picture_end;

	$query="INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$pcontact','$picture_name')";
	$result=mysqli_query($link,$query);

	if ($result )
	{  
		$success="data insert successfully";
		move_uploaded_file($_FILES['picture']['tmp_name'], 'students_images/'.$picture_name);
	}
	else
	{
		$error="wrong";
	}
}


?>



<div class="row">
	<?php
	if (isset($success)) 
	{
		echo '<p class="alert alert-success">'.$success.'.</p>';
	}
	?>
	<?php
	if (isset($error)) 
	{
		echo '<p class="alert alert-danger">'.$error.'.</p>';
	}
	?>
	
	
</div>
<div class="row">
	<div class="col-sm-8">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Student Name :</label>
				<input class="form-control" type="text" name="name" value="" placeholder="Enter Your Name" id="name">
			</div>
			<div class="form-group">
				<label for="roll">Student Roll :</label>
				<input class="form-control" type="text" name="roll" value="" placeholder="Enter Your Roll" id="roll" pattern="[0-9]{6}">
			</div>
			<div class="form-group">
				<label for="city">City :</label>
				<input class="form-control" type="text" name="city" value="" placeholder="Enter Your City" id="city">
			</div>
			<div class="form-group">
				<label for="pcontact">Pcontact :</label>
				<input class="form-control" type="text" name="pcontact" value="" placeholder="01*********" id="pcontact" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}">
			</div>
			<div class="form-group">
				<label for="class">Class :</label>
				<select class="form-control" name="class" id="class">
					<option value="">Select</option>
					<option value="1st">1st</option>
					<option value="2nd">2nd</option>
					<option value="3rd">3rd</option>
					<option value="4th">4th</option>
					<option value="5th">5th</option>
				</select>

			</div>
			<div class="form-group">
				<label for="picture">Picture:</label>
				<input type="file" name="picture" id="picture">
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="Add-student" class="btn btn-primary pull-right">
			</div>
		</form>
	</div>
</div>