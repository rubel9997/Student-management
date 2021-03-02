<h2 class="text-primary"><i class="fa fa-dashboard"> DASHBOARD <small>statistics overview</small></i></h2>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"> DASHBOARD</i></li>
	</ol>
</nav>

<?php
$count_students=mysqli_query($link,"SELECT * FROM `student_info`");
$total_students=mysqli_num_rows($count_students);

$count_users=mysqli_query($link,"SELECT * FROM `users`");
$total_users=mysqli_num_rows($count_users);

?>
<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-users fa-5x"></i>
					</div>
					<div class="col-xs-9">
						<div class="pull-right" style="font-size: 45px;"><?php echo $total_students;?></div>
						<div class="clearfix"></div>
						<div class="pull-right">All students</div>

					</div>
				</div>
			</div>
			<a href="index.php?page=all_students">
				<div class="panel-footer">
					<span class="pull-left">All students</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-o-right" style="font-size: 20px;"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-users fa-5x"></i>
					</div>
					<div class="col-xs-9">
						<div class="pull-right" style="font-size: 45px;"><?php echo $total_users;?></div>
						<div class="clearfix"></div>
						<div class="pull-right">All students</div>
					</div>
				</div>
			</div>
			<a href="index.php?page=all_users">
				<div class="panel-footer">
					<span class="pull-left">All Users</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-o-right" style="font-size: 20px;"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>
<hr>
<h3>New Students</h3>
<div class="table-responsive">
	<table id="data" class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Roll</th>
				<th>City</th>
				<th>Contact</th>
				<th>Photo</th>

			</tr>
		</thead>
		<tbody>
			<?php
			$result=mysqli_query($link,"SELECT * FROM `student_info`");

			while ($row=mysqli_fetch_assoc($result)) {?>

				<tr>
					<td><?php echo $row['id'];?></td>
					<td><?php echo ucwords($row['name']);?></td>
					<td><?php echo $row['roll'];?></td>
					<td><?php echo ucwords($row['city']);?></td>
					<td><?php echo $row['pcontact']?></td>
					<td><img style="width: 50%;" src="students_images/<?php echo $row['photo']?>"  alt=""></td>
				</tr>				

				<?php
			}
			?>
		</tbody>
	</table>
</div>