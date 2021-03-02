<h2 class="text-primary"><i class="fa fa-dashboard"> All Users <small>all users</small></i></h2>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active"><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">All users</li>
	</ol>
</nav>

<div class="table-responsive">
	<table id="data" class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
			
				<td>Name</td>				
				<td>Email</td>
				<td>Username</td>
				<td>Photo</td>
				
			</tr>
		</thead>
		<tbody>
			<?php
			error_reporting(0);
			$result=mysqli_query($link,"SELECT * FROM `users`");

			while ($row=mysqli_fetch_assoc($result)) {?>

				<tr>
					<td><?php echo ucwords($row['name']);?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['username'];?></td>
					<td><img style="width: 100%;" src="images/<?php echo $row['photo']?>"  alt=""></td>
									

					<?php
				}
				?>
			</tbody>
		</table>
	</div>