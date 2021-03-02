<h2 class="text-primary"><i class="fa fa-dashboard"> Update student <small>update student</small></i></h2>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active"><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="breadcrumb-item active"><a href="index.php?page=all_students"><i class="fa fa-user"></i>All students</a></li>
		<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"> update student</i></li>
	</ol>
</nav>
<?php
$id=base64_decode( $_GET['id']);
$data=mysqli_query($link,"SELECT * FROM `student_info` WHERE `id`='$id'");
$data_row=mysqli_fetch_assoc($data);

if (isset($_POST['update'])) 
{

	$name=$_POST['name'];
	$roll=$_POST['roll'];
	$city=$_POST['city'];
	$pcontact=$_POST['pcontact'];
	$class=$_POST['class'];

	$query="UPDATE `student_info` SET 
	`name`='$name',
	`roll`='$roll',
	`class`='$class',
	`city`='$city',
	`pcontact`='$pcontact'
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
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Student Name :</label>
					<input class="form-control" type="text" name="name" placeholder="Enter Your Name" id="name" value="<?php echo $data_row['name']?>">
				</div>
				<div class="form-group">
					<label for="roll">Student Roll :</label>
					<input class="form-control" type="text" name="roll" placeholder="Enter Your Roll" id="roll" pattern="[0-9]{6}" value="<?= $data_row['roll']?>">
				</div>
				<div class="form-group">
					<label for="city">City :</label>
					<input class="form-control" type="text" name="city" value="<?= $data_row['city']?>" placeholder="Enter Your City" id="city">
				</div>
				<div class="form-group">
					<label for="pcontact">Pcontact :</label>
					<input class="form-control" type="text" name="pcontact" value="<?= $data_row['pcontact']?>" placeholder="01*********" id="pcontact" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}">
				</div>
				<div class="form-group">
					<label for="class">Class :</label>
					<select class="form-control" name="class" id="class">
						<option value="">Select</option>
						<option <?php echo $data_row['class']=='1st' ? 'selected=""':'';?>value="1st">1st</option>
						<option <?php echo $data_row['class']=='2nd' ? 'selected=""':'';?> value="2nd">2nd</option>
						<option <?php echo $data_row['class']=='3rd' ? 'selected=""':'';?> value="3rd">3rd</option>
						<option <?php echo $data_row['class']=='4th' ? 'selected=""':'';?> value="4th">4th</option>
						<option <?php echo $data_row['class']=='5th' ? 'selected=""':'';?> value="5th">5th</option>
					</select>

				</div>

				<div class="form-group">
					<input type="submit" name="update" value="update-student" class="btn btn-primary pull-right">
				</div>
			</form>
		</div>
	</div>