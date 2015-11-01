<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home Page</title>
	<?php $this->load->view('partials/head.php'); ?>
</head>
<body>
<div class="container-fluid">
	<?php $this->load->view('partials/nav.php'); ?>
	<div class="jumbotron">
		<h2>Welcome to the Test App</h2>
		<p>We're going to build a cool application using a MVC framework (PHP CodeIgniter) with Twitter Bootstrap! This application was built in Coding Dojo.</p>
		<p>
			<a class="btn btn-lg btn-primary" href="/register" role="button">Start</a>
		</p>
	</div>
	<div class="col-xs-6 col-md-4">
		<h4>Manage Users</h4>
		<p>Using this application, you'll learn how to add, remove, and edit users for the application</p>
	</div>
	<div class="col-xs-6 col-md-4">
		<h4>Leave messages</h4>
		<p>Users will be able to leave a message to another user using this application</p>
	</div>
	<div class="col-xs-6 col-md-4">
		<h4>Edit User Information</h4>
		<p>Admins will be able to edit another user's information (email address, first name, last name, etc).</p>
	</div>
</div>
</body>
</html>