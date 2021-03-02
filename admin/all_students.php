<h2 class="text-primary"><i class="fa fa-dashboard"> All student <small>all student</small></i></h2>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active"><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">All student</li>
	</ol>
</nav>

<div class="table-responsive">
	<table id="data" class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Roll</td>
				<td>Class</td>
				<td>City</td>
				<td>Contact</td>
				<td>Photo</td>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			error_reporting(0);
			$result=mysqli_query($link,"SELECT * FROM `student_info`");

			while ($row=mysqli_fetch_assoc($result)) {?>

				<tr>
					<td><?php echo $row['id'];?></td>
					<td><?php echo ucwords($row['name']);?></td>
					<td><?php echo $row['roll'];?></td>
					<td><?php echo $row['class'];?></td>
					<td><?php echo ucwords($row['city']);?></td>
					<td><?php echo $row['pcontact']?></td>
					<td><img style="width: 50%;" src="students_images/<?php echo $row['photo']?>"  alt=""></td>
					<td>
						<a style="font-size: 20px;" class="btn-xs btn-warning" href="index.php?page=edit&id=<?php echo base64_encode($row['id']);?>">
							<i class="fa fa-pencil">Edit</i></a>

							<a style="font-size: 20px;" class="btn-xs btn-danger" href="delete.php?id=<?php echo base64_encode($row['id']);?>"><i class="fa fa-trash">Delete</i></a>
						</td>
					</tr>				

					<?php
				}
				?>
			</tbody>
		</table>
	</div>