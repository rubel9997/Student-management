<<?php require "admin/dbconnect.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>student management</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">

		<br>
		<a  class="btn btn-primary float-right" href="#">LOGIN</a>
		<br>
		<br>
		<h1 class="text-center">WELCOME TO STUDENT MANAGEMNET SYSTEM</h1>
		<div class="row justify-content-sm-center">
			<div class="col-sm-4">
				<form action="index.php" method="post">
					<table class="table table-bordered">
						<tr>
							<td colspan="2" class="text-center"><label for="info" >Student information</label></td>
						</tr>
						<tr>
							<td><label for="choose">Choose Class</label></td>
							<td>
								<select name="choose" id="choose" class="form-control">
									<option value="">Select</option>
									<option value="1st">1st</option>
									<option value="2nd">2nd</option>
									<option value="3rd">3rd</option>
									<option value="4th">4th</option>
									<option value="5th">5th</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="roll">Roll Number</label></td>
							<td><input id="roll" type="text" name="roll" value="" class="form-control" pattern="[0-9]{6}"></td>
						</tr>
						<tr>
							<td class="text-center" colspan="2"><input class="btn btn-info" type="submit" value="Show info" name="show-info"></td>
						</tr>
					</table>
				</form>				
			</div>
		</div>
		<?php
		

		if (isset($_POST['show-info'])) 
		{

			
			$choose=$_POST['choose'];
			$roll=$_POST['roll'];

			$query=mysqli_query($link,"SELECT * FROM `student_info` WHERE `class`='$choose' AND `roll`='$roll' ");
			if (mysqli_num_rows($query)==1)
			 {
				$row=mysqli_fetch_assoc($query);
				?>
				<div class="row justify-content-sm-center">
			<div class="col-sm-6 col-sm-offset-3">
				<table class="table table-bordered">
					<tr>
						<td rowspan="5">
							<img src="admin/students_images/<?=$row['photo'];?>" class="img-thumbnail" style="height: 200px;" alt="">
						</td>
						<td>Name</td>
						<td><?=ucwords($row['name']);?></td>
					</tr>
					<tr>
						
						<td>Roll</td>
						<td><?=$row['roll'];?></td>
					</tr>
					<tr>
						
						<td>Class</td>
						<td><?=$row['class'];?></td>
					</tr>
					<tr>
						
						<td>City</td>
						<td><?=ucwords($row['city']);?></td>
					</tr>
					
				</table>
			</div>
		</div>

				<?php
			}
			else
			{
				echo "data not found";
			}
			
	
		}
		?>
	</div>	
</body>
</html>