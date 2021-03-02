<?php
session_start();
require_once "dbconnect.php";
if(!isset($_SESSION['login_user']))
{
	header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SMS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="jquery/dataTables.bootstrap.min.css" />

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"></link>
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- Datatables -->
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<!-- Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$('#data').DataTable();
		});
	</script>
</head>
<body>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">SMS</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome</a></li>				
				<li><a href="registration.php"><span class="glyphicon glyphicon-plus"></span> Add User</a></li>
				<li><a href="index.php?page=user_profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
				<li><a href="logout.php"><span class="	glyphicon glyphicon-off"></span> Logout</a></li>
			</ul>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<div class="list-group">
					<a href="index.php?page=dashboard" class="list-group-item list-group-item-action active"><i class="fa fa-dashboard"> DASHBOARD</i></a>
					<a href="index.php?page=add_students" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"> Add Student</i></a>
					<a href="index.php?page=all_students" class="list-group-item list-group-item-action"><i class="fa fa-user"> All Students</i></a>
					
					<a href="index.php?page=all_users" class="list-group-item list-group-item-action"><i class="fa fa-user"> All Users</i></a>
					
				</div>
			</div>
			<div class="col-sm-9">
				<div class="content">

			       <?php 
			      
			       if(isset($_GET['page'])) 
			       {
			       	 $page=$_GET['page'].'.php';
			       }
			       else
			       {
			       	$page="dashboard.php";
			       }

			      if(file_exists($page))
			      {
			      	 require $page;
			      }
			      else
			      {
			      	 require "404.php";
			      }

			       ?>
				</div>
			</div>

		</div>
	</div>
	<footer class="footer_area">
		<p>Copyright &copy 2020-2021 || All right reserved.</p>
	</footer>

</body>

</html>
